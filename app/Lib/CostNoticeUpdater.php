<?php

namespace App\Lib;

use App\Models\CostNotice;

class CostNoticeUpdater
{
	public function __invoke()
	{
		$url = "https://api.binance.com";

        $ch = curl_init("https://api.binance.com/api/v3/ticker/price");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $resp = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($resp);
        
        /*$newData = array();
        for($i=0; $i<count($data); $i++)
        {
            if(preg_match("/.+USDT/", $data[$i]->symbol))
            array_push($newData, $data[$i]);
        }*/
        
        $notices = CostNotice::where("notice_time", null)->get();
        //$notices = CostNotice::all();

        foreach($notices as $notice)
        {
        	foreach ($data as $coin)
        	{
        		if ($coin->symbol==$notice->coin_id)
        		{
        			dump($notice->user_id);
        			dump($notice->coin_id);
        			dump($notice->trigger);
        			dump($notice->cost);
        			dump((double)$coin->price);

        			if ($notice->trigger=="down" && (double)$coin->price < $notice->cost) 
        				{
        					$upd = CostNotice::where([["user_id", $notice->user_id], ["coin_id", $notice->coin_id]])->update(["notice_time" => date("d.m.Y - H:i:s")]);
        				}
        			else if($notice->trigger=="up" && (double)$coin->price > $notice->cost)
        				{
        			 		$upd = CostNotice::where([["user_id", $notice->user_id], ["coin_id", $notice->coin_id]])->update(["notice_time" => date("d.m.Y - H:i:s")]);
        				}
        		}
        	}
        }

		//$notice = CostNotice::where([["user_id", "MAMONT"], ["coin_id", "MMM"]])->update(["notice_time" => date("d.m.Y - H:i:s")]);
	}
}