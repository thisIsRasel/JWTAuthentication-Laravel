<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HeroController extends Controller
{

	public function index() {

		$users = User::all();
		return json_encode($users);
	}
}
