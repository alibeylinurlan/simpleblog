<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class GeoIp extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $ip = $this->geoip();

        if ($ip->status == "fail")
        {
            $country_name = "Azerbaijan";
            $country_code = 'az';
        }
        else
        {
            $country_name = $ip->country;
            $country_code = strtolower($ip->countryCode);
        }

        return view('components.geo-ip', [
            'country_name' => $country_name,
            'country_code' => $country_code,
        ]);
    }

    public function get_user_ip() //Localhostda islemir
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else
            $ip = $_SERVER['REMOTE_ADDR'];

        return $ip; //85.132.85.85   my ip // 24.48.0.1 canada

    }


    public function geoip(Request $r = null) //Localhostda islemir
    {
        //85.132.85.85   my ip
        $ips = explode(',', $this->get_user_ip());
        $response = Http::get('http://ip-api.com/json/'.$ips[0] ?? $this->get_user_ip());
        //$json_datas = file_get_contents("http://ip-api.com/json/".$this->get_user_ip());
        $datas = json_decode($response);
        //dd($datas, $this->get_user_ip());
        return $datas;
    }
}
