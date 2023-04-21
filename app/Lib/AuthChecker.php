<?php

namespace App\Lib;

use App\Models\Auth;
use Illuminate\Http\Request;

class AuthChecker
{
	private static $salt = 'hb5dpf81';

	static public function checkAuth($login, $key)
	{
		$auth = Auth::where('login', $login)->first();
		
		if(!$auth) return false;

		if(md5($auth['login'].$auth['password'].self::$salt)!=$key) return false;

		return true;
	}

	static public function getSalt()
	{
		return self::$salt;
	}
}