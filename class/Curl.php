<?php

class Curl
{
    public static function Request($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //fix SSL url

        curl_setopt($ch, CURLOPT_USERAGENT, self::getRandomUserAgent());

        if(!$output = curl_exec($ch)){
                die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
        }

        curl_close($ch);

        return $output;
    }

    public static function getRandomUserAgent()
    {
        $userAgents = array(
            "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6",
            "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)"
        );
        $random = rand(0, count($userAgents)-1);
        
        return $userAgents["$random"];
    }
}
