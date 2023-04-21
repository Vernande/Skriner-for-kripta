<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Auth;
use App\Lib\AuthChecker;

//ДЛЯ ТЕСТА
use App\Models\CostNotice;
use App\Lib\costNoticeUpdater;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('authPage');
    }

    public function exit(Request $request)
    {
        if(!AuthChecker::checkAuth($request->cookie('login'), $request->cookie('key'))) return 'NOT AUTH';

        $response = new Response('Set Cookie');
        $response->withCookie(cookie('key', '', -1));
        $response->withCookie(cookie('login', '', -1));
        return $response;
    }

    public function registration(Request $request)
    {
        $auth = new Auth();

        $auth->fill(array('login' => $request->input('login'), 'password'=>md5($request->input('password')), 'email' => $request->input('email')));

        $auth->save();
    }

    public function login(Request $request)
    {
        $auth = Auth::where([['login', $request->input('login')], ['password', md5($request->input('password'))]])->first();
        
        if($auth)
        {
            $response = new Response('Set Cookie');
            $response->withCookie(cookie('login', $auth['login'], 86400));
            $response->withCookie(cookie('key', md5($auth['login'].$auth['password'].AuthChecker::getSalt()), 86400));
            return $response;
        }
        else
        {
            return "ERROR";
        }
    }

    public function apitest()
    {
        $url = "https://api.binance.com";

        $ch = curl_init("https://api.binance.com/api/v3/ticker/price");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $resp = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($resp);
        
        $newData = array();
        for($i=0; $i<count($data); $i++)
        {
            if(preg_match("/.+USDT/", $data[$i]->symbol))
            array_push($newData, $data[$i]);
        }

        dd($newData);
    }

    public function costNoticeUpdaterTest()
    {
        $updater = new CostNoticeUpdater();
        $updater->ENVOK();
    }
}
