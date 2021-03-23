<?php


namespace Hillel\GeoService2;


use Illuminate\Support\Facades\Http;
use Hillel\GeoInterface\GeoServiceInterface;

class IpApiService implements GeoServiceInterface
{
    protected $data;

    public function parse($ip)
    {
        $response = Http::get('http://ip-api.com/json/' . $ip . '?fields=continentCode,countryCode');
        //if ok
        $this->data = $response->json();
    }

    public function continentCode()
    {
        return $this->data['continentCode'];
    }


    public function countryCode()
    {
        return $this->data['countryCode'];
    }
}
