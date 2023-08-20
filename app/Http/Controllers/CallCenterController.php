<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DOMDocument;
use DOMXPath;
use Illuminate\Http\JsonResponse;
use GuzzleHttp\Client;

class CallCenterController extends ScrapController
{


    public function getHomeOffersData($page = null)
    {


        $jobData = [];
        $jobDataTop = [];
        $jobDataCities = [];
        $jobDataTypes = [];

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
                        'jobUrl' => 'https://www.moncallcenter.ma/' . $title->getAttribute('href'),
                        'ImgLink' => 'https://www.moncallcenter.ma/' . $ImgLink->getAttribute('src'),
                    ];
                }
            }
        }


        $url = 'https://www.moncallcenter.ma/offres-emploi/' . $page . '/';

        $client = new Client();
        $response = $client->get($url);
        $html = $response->getBody()->getContents();

        $dom = new DOMDocument();

        @$dom->loadHTML($html);
        $xpath = new DOMXPath($dom);

        $jobTitleLink = $xpath->query("//h2/a[@class=\"offreUrl\"]");
        $jobDate = $xpath->query("//div/div/span/b[position()=1]");
        $jobCity = $xpath->query("//div/div/span/b[position()=2]");
        $jobDescription = $xpath->query("//div/div/p");
        $jobImgLink = $xpath->query("//div/div/a[@class=\"offreUrl\"]/img");
        $jobMetaData = $xpath->query("//*[@id=\"statuts\"]/div/div[1]/div[2]/div[1]/span");

        for ($i = 0; $i < 3; $i++) {
            $date = $jobDate[$i];
            $title = $jobTitleLink[$i];
            $secDescription = $jobDescription[$i];
            $City = $jobCity[$i];
            $ImgLink = $jobImgLink[$i];
            $metaData = $jobMetaData[$i];
            if ($date && $title && $secDescription) {
                $jobDataTop[] = [
                    'jobDate' => $date->nodeValue,
                    'jobTitle' => $title->nodeValue,
                    'jobUrl' => 'https://www.moncallcenter.ma/' . $title->getAttribute('href'),
                    'jobDescription' => $secDescription->nodeValue,
                    'jobCity' => $City->nodeValue,
                    'ImgLink' => 'https://www.moncallcenter.ma/' . $ImgLink->getAttribute('src'),
                    'jobMetaData' => $metaData->nodeValue,
                ];
            }
        }



        $jobCity = $xpath->query("//*[@id=\"Ville\"]/option");

        for ($i = 0; $i < $jobCity->length; $i++) {
            $City = $jobCity[$i];
            $jobDataCities[] = [
                'jobCity' => $City->nodeValue,
            ];
        }

        $jobType = $xpath->query("//*[@id=\"Type\"]/option");

        for ($i = 0; $i < $jobType->length; $i++) {
            $Type = $jobType[$i];
            $jobDataTypes[] = [
                'jobType' => $Type->nodeValue,
            ];
        }
        
        $jobDataJson = json_encode($jobData);
        $jobDataJsonTop = json_encode($jobDataTop);
        $jobDataJsonCity = json_encode($jobDataCities);
        $jobDataJsonType = json_encode($jobDataTypes);
        return view('callCenter\home', ['jobDataJson' => $jobDataJson, 
                        'jobDataJsonTop' => $jobDataJsonTop,
                        'jobDataJsonCity' => $jobDataJsonCity,
                        'jobDataJsonType' => $jobDataJsonType]);

        // return $jobDataBlog;
    }
    public function callCenter(){
        
        $jobDataCities = [];
        $jobDataTypes = [];

        $client = new Client();
        $dom = new DOMDocument();
        @$dom->loadHTML($client->get('https://www.moncallcenter.ma/centres-appels.php')->getBody()->getContents());
        $xpath = new DOMXPath($dom);
        
        $jobCity = $xpath->query("//*[@id='ville']/option");

        for ($i = 0; $i < $jobCity->length; $i++) {
            $City = $jobCity[$i];
            $jobDataCities[] = [
                'jobCity' => $City->nodeValue,
            ];
        }

        $jobType = $xpath->query("//*[@id=\"Type\"]/option");

        for ($i = 0; $i < $jobType->length; $i++) {
            $Type = $jobType[$i];
            $jobDataTypes[] = [
                'jobType' => $Type->nodeValue,
            ];
        }
        
        $jobDataJsonCity = json_encode($jobDataCities);
        $jobDataJsonType = json_encode($jobDataTypes);
        return view('callCenter.callcenters', ['jobDataJsonCity' => $jobDataJsonCity, 'jobDataJsonType' => $jobDataJsonType]);
        // return $jobDataTypes;

    }
    public function getCallcenterData(){
        $callcenterData = [];

        $client = new Client();
        $dom = new DOMDocument();
        @$dom->loadHTML($client->get('https://www.moncallcenter.ma/centres-appels.php')->getBody()->getContents());
        $xpath = new DOMXPath($dom);
        
        $jobType = $xpath->query("//*[@id=\"Type\"]/option");
    }
}