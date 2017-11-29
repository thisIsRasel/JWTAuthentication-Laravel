<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Message;
use Hash;

use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class HeroController extends Controller
{

	public function __construct() {

		$this->middleware('jwt.auth', ['except'=>['addHero', 'loginHero']]);
	}

	public function index(Request $request) {

		$users = User::all();
		return json_encode($users);
	}

	public function addHero(Request $request) {

		$success = false;

		$params = json_decode($request->input('params'));

		$hero = new User;
		$hero->name = $params->name;
		$hero->email = $params->email;
		$hero->password = Hash::make($params->password);
		
		if($hero->save()) {
			
			$success = true;
		}
		
		return ['success' => $success, 'hero' => $hero ];
	}

	public function loginHero(Request $request) {

		//$credentials = [ 'email' => $request->input('email'), 'password'=> $request->input('password') ];

		$params = json_decode($request->input('params'));

		$credentials = [ 'email' => $params->email, 'password' => $params->password ];

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));

	}

	public function getAuthenticatedHero()
	{
	  try {

	    if (! $user = JWTAuth::parseToken()->authenticate()) {
	        return response()->json(['user_not_found'], 404);
	    }

	  } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

	    return response()->json(['token_expired'], $e->getStatusCode());

	  } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

	    return response()->json(['token_invalid'], $e->getStatusCode());

	  } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

	    return response()->json(['token_absent'], $e->getStatusCode());

	  }

	  // the token is valid and we have found the user via the sub claim
	  return response()->json(compact('user'));
	}

	public function sendMessage(Request $request) {

		$messageData = json_decode($request->input('params'));

		$message = new Message;
		$message->from = $messageData->from;
		$message->to = $messageData->to;
		$message->message = $messageData->message;
		$message_id = $message->save();

		return [ 'success'=> ($message_id ? true : false) ];
	}

	public function getAllMessages(Request $request, $heroName) {

		$messages = Message::where(['to' => $heroName])->get();

		return json_encode($messages);
	}
}
