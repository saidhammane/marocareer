<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DOMDocument;
use DOMXPath;
use Illuminate\Http\JsonResponse;
use GuzzleHttp\Client;

class CallCenterController extends ScrapController
{
    public function getHomeSixOffersHome(){
        $jobData = [];
        $client = new Client();
        $dom = new DOMDocument();
        @$dom->loadHTML($client->get('https://www.moncallcenter.ma/')->getBody()->getContents());
        $xpath = new DOMXPath($dom);
        for ($i = 0; $i < 6; $i++) {    
            for ($j = 1; $j <= 6; $j++) {
                $jobTitleLink = $xpath->query("//*[@id=\"body_contenuCA\"]/div[2]/div[1]/div/div[$j]/div/div[1]/div[2]/h2/a");
                $jobDate = $xpath->query("//*[@id=\"body_contenuCA\"]/div[2]/div[1]/div/div[$j]/div/div[1]/div[2]/div/span"); 
                $jobImgLink = $xpath->query("//*[@id=\"body_contenuCA\"]/div[2]/div[1]/div/div[$j]/div/div[1]/div[1]/a/img");
                $date = $jobDate[$i];
                $title = $jobTitleLink[$i];
                $ImgLink = $jobImgLink[$i];
                if ($date && $title) {
                    $jobData[] = [
                        'jobDate' => $date->nodeValue,
                        'jobTitle' => $title->nodeValue,
                        'jobUrl' => 'https://www.moncallcenter.ma/'.$title->getAttribute('href'),
                        'ImgLink' => 'https://www.moncallcenter.ma/'.$ImgLink->getAttribute('src'),
                    ];
                }
            }
        }
        $jobDataJson = json_encode($jobData);
        return view('callCenter\home', ['jobDataJson' => $jobDataJson]);
        // return $jobData;
    }
}
