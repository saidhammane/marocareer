<?php

namespace App\Http\Controllers;

use DOMDocument;
use DOMXPath;
use Exception;
use GuzzleHttp\Client;

class CallCenterController extends ScrapController
{


    public function calCenterZoneJobs($callCenter){

        
        $jobData = [];
        $jobDataName = [];

        $client = new Client();
        $dom = new DOMDocument();
        @$dom->loadHTML($client->get("https://www.moncallcenter.ma/" . $callCenter."/offres-emploi")->getBody()->getContents());
        $xpath = new DOMXPath($dom);

        $imageCallCenterJob = $xpath->query("//*[@id='logoC']");
        $jobTitleLink = $xpath->query("/html/body/div[2]/div[1]/div[1]/div/div/div[1]/div[2]/h2/a");
        $jobImgLink = $xpath->query("//div/div/a[@class=\"offreUrl\"]/img");
        $jobMetaData = $xpath->query("/html/body/div[2]/div[1]/div[1]/div/div/div[1]/div[2]/div[1]/span");
        $jobCallCenterName = $xpath->query("/html/body/div[1]/div[2]/div/div/h2/text()");
        

        for ($i = 0; $i < $jobMetaData->length; $i++) {
            $jobData[] = [
                'imageCallCenter' => "https://www.moncallcenter.ma/" . $imageCallCenterJob[0]->getAttribute('src'),
                'jobImgLink' => "https://www.moncallcenter.ma/" . $jobImgLink[$i]->getAttribute('src'),
                'jobTitle' => $jobTitleLink[$i]->nodeValue,
                'jobUrl' => "https://www.moncallcenter.ma/".$jobTitleLink[$i]->getAttribute('href'),
                'metaData' => $jobMetaData[$i]->nodeValue,
            ];
        }
        for ($i = 0; $i < $jobCallCenterName->length; $i++) {
            $jobDataName[] = [
                'jobCallCenterName' => $jobCallCenterName[$i]->nodeValue,
            ];
        }
        
        $jobDataJson = json_encode($jobData);
        $jobDataNameJson = json_encode($jobDataName);
        return view('callcenterZone.jobs', ['jobDataJson' => $jobDataJson, "callCenter" => $callCenter, 'jobDataNameJson' => $jobDataNameJson]);
    }
    public function jobApply($url = null)
    {

        $jobData = [];
        $jobDataCities = [];
        $jobDataTypes = [];

        $currentURL = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $lastSegment = basename(parse_url($currentURL, PHP_URL_PATH));


        $client = new Client();
        $dom = new DOMDocument();
        @$dom->loadHTML($client->get("https://www.moncallcenter.ma//offre-emploi/" . $url)->getBody()->getContents());
        $xpath = new DOMXPath($dom);

        $titleJob = $xpath->query("//*[@id='statuts']/div/div/div[2]/h1");
        $descriptifPosteJob = $xpath->query("/html/body/div[2]/div/div[2]/div[3]/div/div/p");
        $profilRechercheJob = $xpath->query("/html/body/div[2]/div/div[2]/div[4]/div/div/p");
        $callcenterNameJob = $xpath->query("/html/body/div[2]/div/div[2]/div[1]/div/div/div/div[2]/h2/a");
        $callcenterImgJob = $xpath->query("/html/body/div[2]/div/div[2]/div[1]/div/div/div/div[1]/a/img");
        $metaDataJob = $xpath->query("/html/body/div[2]/div/div[2]/div[1]/div/div/div/div[2]/span[1]");
        $languageJob = $xpath->query("/html/body/div[2]/div/div[2]/div[1]/div/div/div/div[2]/span[2]");

        for ($i = 0; $i < $descriptifPosteJob->length; $i++) {

            $title = $titleJob[$i];
            $descriptifPoste = $descriptifPosteJob[$i];
            $profilRecherche = $profilRechercheJob[$i];
            $callcenterName = $callcenterNameJob[$i];
            $callcenterImg = $callcenterImgJob[$i];
            $metaData = $metaDataJob[$i];
            $language = $languageJob[$i];

            if ($descriptifPoste) {
                $jobData[] = [
                    'titleJob' => $title->nodeValue,
                    'descriptifPosteJob' => $descriptifPoste->nodeValue,
                    'profilRechercheJob' => $profilRecherche->nodeValue,
                    'callcenterNameJob' => $callcenterName->nodeValue,
                    'callcenterNameJobUrl' => 'https://www.moncallcenter.ma/' . $callcenterName->getAttribute('href'),
                    'callcenterImgJob' => 'https://www.moncallcenter.ma/' . $callcenterImg->getAttribute('src'),
                    'metaDataJob' => $metaData->nodeValue,
                    'languageJob' => $language->nodeValue,
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
        $jobDataJsonCity = json_encode($jobDataCities);
        $jobDataJsonType = json_encode($jobDataTypes);

        // return $lastSegment;

        return view('callCenter.jobsApply', [
            'lastSegment' => $lastSegment,
            'jobDataJson' => $jobDataJson,
            'type' => 'jobApply',
            'jobDataJsonCity' => $jobDataJsonCity,
            'jobDataJsonType' => $jobDataJsonType
        ]);

    }
    public function getOffersDataType($type = null)
    {
        $jobData = [];
        $jobDataCities = [];
        $jobDataTypes = [];

        $client = new Client();
        $dom = new DOMDocument();
        @$dom->loadHTML($client->get('https://www.moncallcenter.ma/q-offres/?Type=' . $type)->getBody()->getContents());
        $xpath = new DOMXPath($dom);

        $jobTitleLink = $xpath->query("//h2/a[@class=\"offreUrl\"]");
        $jobDescription = $xpath->query("//div/div/p");
        $jobImgLink = $xpath->query("//div/div/a[@class=\"offreUrl\"]/img");
        $jobMetaData = $xpath->query("//*[@id=\"statuts\"]/div/div[1]/div[2]/div[1]/span");

        try{
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
    
            for ($i = 0; $i < $jobTitleLink->length; $i++) {
    
                $title = $jobTitleLink[$i];
                $description = $jobDescription[$i];
                $img = $jobImgLink[$i];
                $metaData = $jobMetaData[$i];
    
                if ($title && $description) {
                    $jobData[] = [
                        'jobTitle' => $title->nodeValue,
                        'jobUrl' => $title->getAttribute('href'),
                        'jobImgLink' => 'https://www.moncallcenter.ma/' . $img->getAttribute('src'),
                        'jobDescription' => $description->nodeValue,
                        'jobMetaData' => $metaData->nodeValue,
                    ];
                }
            }

        }catch(Exception $ex){
            
        }

        $jobDataJson = json_encode($jobData);
        $jobDataJsonCity = json_encode($jobDataCities);
        $jobDataJsonType = json_encode($jobDataTypes);

        // return $jobDataJson;
        return view('callCenter.filtredType', [
            'jobDataJson' => $jobDataJson,
            'type' => $type,
            "city" => 'typeCity',
            'jobDataJsonCity' => $jobDataJsonCity,
            'jobDataJsonType' => $jobDataJsonType
        ]);
    }
    public function getOffersData($city = null, $type = null)
    {
        $jobData = [];
        $jobDataCities = [];
        $jobDataTypes = [];

        $client = new Client();
        $dom = new DOMDocument();
        @$dom->loadHTML($client->get('https://www.moncallcenter.ma/q-offres/?Ville=' . $city . '&Type=' . $type)->getBody()->getContents());
        $xpath = new DOMXPath($dom);

        $jobTitleLink = $xpath->query("//h2/a[@class=\"offreUrl\"]");
        $jobDescription = $xpath->query("//div/div/p");
        $jobImgLink = $xpath->query("//div/div/a[@class=\"offreUrl\"]/img");
        $jobMetaData = $xpath->query("//*[@id=\"statuts\"]/div/div[1]/div[2]/div[1]/span");

        try {
            
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
            for ($i = 0; $i < $jobTitleLink->length; $i++) {

                $title = $jobTitleLink[$i];
                $description = $jobDescription[$i];
                $img = $jobImgLink[$i];
                $metaData = $jobMetaData[$i];
    
                if ($title && $description) {
                    $jobData[] = [
                        'jobTitle' => $title->nodeValue,
                        'jobUrl' => $title->getAttribute('href'),
                        'jobImgLink' => 'https://www.moncallcenter.ma/' . $img->getAttribute('src'),
                        'jobDescription' => $description->nodeValue,
                        'jobMetaData' => $metaData->nodeValue,
                    ];
                }
            }
    
        }
        
        catch(Exception $e) {
            //echo 'Message: ' .$e->getMessage();
        }

        $jobDataJson = json_encode($jobData);
        $jobDataJsonCity = json_encode($jobDataCities);
        $jobDataJsonType = json_encode($jobDataTypes);

        // return $jobDataJson;
        return view('callCenter.flitred', [
            'jobDataJson' => $jobDataJson,
            'city' => $city,
            'type' => $type,
            'jobDataJsonCity' => $jobDataJsonCity,
            'jobDataJsonType' => $jobDataJsonType
        ]);

    }
    public function getHomeOffersData($page = null)
    {


        $currentURL = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $lastSegment = basename(parse_url($currentURL, PHP_URL_PATH));

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
        return view('callCenter.home', [
            'lastSegment' => $lastSegment,
            'type' => 'home',
            'jobDataJson' => $jobDataJson,
            'jobDataJsonTop' => $jobDataJsonTop,
            'jobDataJsonCity' => $jobDataJsonCity,
            'jobDataJsonType' => $jobDataJsonType
        ]);

        // return $jobDataJson;
    }
    public function callCenterFilter($city = null)
    {

        $callCenterData = [];
        $jobDataCities = [];

        $client = new Client();
        $dom = new DOMDocument();
        @$dom->loadHTML($client->get('https://www.moncallcenter.ma/centres-appels.php?ville=' . $city)->getBody()->getContents());
        $xpath = new DOMXPath($dom);


        $jobCity = $xpath->query("//*[@id='ville']/option");
        $callCenterImgLink = $xpath->query("//*[@id='centreLeftN']/div[1]/div/div/div[1]/a/img");
        $callCenterName = $xpath->query("//*[@id='centreLeftN']/div[1]/div/div/center/label/b/h2/a");
        $callCenterDescription = $xpath->query("//*[@id='centreLeftN']/div[1]/div/div/p");
        $callCenterOffres = $xpath->query("//*//*[@id='centreLeftN']/div[1]/div/div/div[2]/a[1]");
        $callCenterUrl = $xpath->query("//*[@id='centreLeftN']/div[1]/div/div/div[1]/a");

        for ($i = 0; $i < $callCenterImgLink->length; $i++) {
            $imgLink = $callCenterImgLink[$i];
            $name = $callCenterName[$i];
            $description = $callCenterDescription[$i];
            $offres = $callCenterOffres[$i];
            $url = $callCenterUrl[$i];
            $callCenterData[] = [
                'name' => $name->nodeValue,
                'description' => $description->nodeValue,
                'offres' => $offres->nodeValue,
                'url' => $url->getAttribute('href'),
                'ImgLink' => 'https://www.moncallcenter.ma/' . $imgLink->getAttribute('src'),
            ];
        }

        for ($i = 0; $i < $jobCity->length; $i++) {
            $City = $jobCity[$i];
            $jobDataCities[] = [
                'jobCity' => $City->nodeValue,
            ];
        }

        $jobDataJsonCity = json_encode($jobDataCities);
        $callCenterDataJson = json_encode($callCenterData);
        // return $callCenterDataJson;

        return view('callCenter.callcentersFiltred', [
            'callCenterDataJson' => $callCenterDataJson,
            'jobDataJsonCity' => $jobDataJsonCity,
            'city' => $city,
        ]);

    }
    public function callCenter()
    {
        $callCenterData = [];
        $jobDataCities = [];
        $jobDataTypes = [];
        $client = new Client();
        $dom = new DOMDocument();
        @$dom->loadHTML($client->get('https://www.moncallcenter.ma/centres-appels.php')->getBody()->getContents());
        $xpath = new DOMXPath($dom);
        $jobCity = $xpath->query("//*[@id='ville']/option");
        $jobType = $xpath->query("//*[@id=\"Type\"]/option");
        $callCenterImgLink = $xpath->query("//*[@id='centreLeftN']/div[1]/div/div/div[1]/a/img");
        $callCenterName = $xpath->query("//*[@id='centreLeftN']/div[1]/div/div/center/label/b/h2/a");
        $callCenterDescription = $xpath->query("//*[@id='centreLeftN']/div[1]/div/div/p");
        $callCenterOffres = $xpath->query("//*//*[@id='centreLeftN']/div[1]/div/div/div[2]/a[1]");
        $callCenterUrl = $xpath->query("//*[@id='centreLeftN']/div[1]/div/div/div[1]/a");
        for ($i = 0; $i < $callCenterImgLink->length; $i++) {
            $imgLink = $callCenterImgLink[$i];
            $name = $callCenterName[$i];
            $description = $callCenterDescription[$i];
            $offres = $callCenterOffres[$i];
            $url = $callCenterUrl[$i];
            $callCenterData[] = [
                'name' => $name->nodeValue,
                'description' => $description->nodeValue,
                'offres' => $offres->nodeValue,
                'offresUrl' => 'https://www.moncallcenter.ma/' . $offres->getAttribute('href'),
                'url' => 'https://www.moncallcenter.ma/' . $url->getAttribute('href'),
                'ImgLink' => 'https://www.moncallcenter.ma/' . $imgLink->getAttribute('src'),
            ];
        }
        for ($i = 0; $i < $jobCity->length; $i++) {
            $City = $jobCity[$i];
            $jobDataCities[] = [
                'jobCity' => $City->nodeValue,
            ];
        }
        for ($i = 0; $i < $jobType->length; $i++) {
            $Type = $jobType[$i];
            $jobDataTypes[] = [
                'jobType' => $Type->nodeValue,
            ];
        }
        $jobDataJsonCity = json_encode($jobDataCities);
        $jobDataJsonType = json_encode($jobDataTypes);
        $callCenterDataJson = json_encode($callCenterData);
        // return $callCenterDataJson;
        return view('callCenter.callcenters', [
            'jobDataJsonCity' => $jobDataJsonCity,
            'jobDataJsonType' => $jobDataJsonType,
            'callCenterDataJson' => $callCenterDataJson
        ]);

    }
    public function quiz() {
        $quizData = [];
        $callCenterRecrut = [];
        $client = new Client();
        $dom = new DOMDocument();
        @$dom->loadHTML($client->get('https://www.moncallcenter.ma/tests/')->getBody()->getContents());
        $xpath = new DOMXPath($dom);
        $quizImgUrl = $xpath->query("//*[@id='statuts']/div/div/div/div/a[1]/img");
        $quizTitle = $xpath->query("//*[@id='statuts']/div/div/div/div/a[2]/h2");
        $quizQD = $xpath->query("//*[@id='statuts']/div/div/div/div/div[1]/span/text()[1]");
        $quizNombreParticipants = $xpath->query("//*[@id='statuts']/div/div/div/div/div[1]/span/b[1]");
        $quizNoteMoyenne = $xpath->query("//*[@id='statuts']/div/div/div/div/div[1]/span/b[2]");
        $quizUrl = $xpath->query("//*[@id='statuts']/div/div/div/div/div[2]/a");
        $callCenterRecrutImgUrl = $xpath->query("//*[@id='centreRight']/div[4]/div/div/div/a/img");
        $callCenterRecrutUrl = $xpath->query("//*[@id='centreRight']/div[4]/div/div/div/a");
        foreach ($callCenterRecrutImgUrl as $i => $imgUrl) {
            $imgUrl = $quizImgUrl[$i];
            $title = $quizTitle[$i];
            $qd = $quizQD[$i];
            $NombreParticipants = $quizNombreParticipants[$i];
            $NoteMoyenne = $quizNoteMoyenne[$i];
            $url = $quizUrl[$i];
            $quizData[] = [
                'title' => $title->nodeValue,
                'qd' => $qd->nodeValue,
                'NombreParticipants' => $NombreParticipants->nodeValue,
                'url' => 'https://www.moncallcenter.ma/' . $url->getAttribute('href'),
                'NoteMoyenne' => $NoteMoyenne->nodeValue,
                'imgUrl' => $imgUrl->getAttribute('src'),
            ];

        }
        for ($i = 0; $i < 6; $i++) {
            $imgUrl = $callCenterRecrutImgUrl[$i];
            $url = $callCenterRecrutUrl[$i];
            $callCenterRecrut[] = [
                'imgUrl' => 'https://www.moncallcenter.ma/' . $imgUrl->getAttribute('src'),
                'title' => $imgUrl->getAttribute('title'),
                'url' => 'https://www.moncallcenter.ma/' . $url->getAttribute('href'),
            ];
        }
        $quizDataJson = json_encode($quizData);
        $callCenterRecrutJson = json_encode($callCenterRecrut);
        return view('callCenter.quiz', ['quizDataJson' => $quizDataJson, 'callCenterRecrutJson' => $callCenterRecrutJson]);
    }

    public function quizZone($title){
        
        $quizData = [];
        
        $client = new Client();
        $dom = new DOMDocument();
        @$dom->loadHTML($client->get('https://www.moncallcenter.ma/test/'.$title)->getBody()->getContents());
        $xpath = new DOMXPath($dom);

        $quizFormattedTitle = substr(implode(" ", array_map('ucfirst', explode("-", $title))), 0, -1);

        
        $quizTitle = $xpath->query("//*[@id='centreLeftN']/h1")->item(0);;
        $quizImgUrl = $xpath->query("//*[@id='statuts']/div[1]/div[1]/img");
        $quizDuree  = $xpath->query("//*[@id='statuts']/div[1]/div[2]/span[1]/text()");
        $quizNombreQuestions  = $xpath->query("//*[@id='statuts']/div[1]/div[2]/span[2]/text()");
        $quizNombreParticipants  = $xpath->query("//*[@id='statuts']/div[1]/div[2]/span[3]/text()");
        $quizNoteMoyenne   = $xpath->query("//*[@id='statuts']/div[1]/div[2]/span[4]/text()");
        $quizDescription   = $xpath->query("//*[@id='statuts']/div[1]/p");

        foreach ($quizImgUrl as $i => $imgUrl) {
            $quizData[] = [
                'quizTitle' =>  $quizTitle ? $quizTitle->nodeValue : $quizFormattedTitle,
                'imgUrl' => $quizImgUrl[$i]->getAttribute('src'),
                'quizDuree' => $quizDuree[$i]->nodeValue,
                'quizNombreQuestions' => $quizNombreQuestions[$i]->nodeValue,
                'quizNombreParticipants' => $quizNombreParticipants[$i]->nodeValue,
                'quizNoteMoyenne' => $quizNoteMoyenne[$i]->nodeValue,
                'quizDescription' => $quizDescription[$i]->nodeValue,
            ];
        }

        $quizDataJson = json_encode($quizData);
        // return $quizDataJson;
        return view("quiz.home", ["quizDataJson" => $quizDataJson, "title"=> $quizFormattedTitle, "url" => $title]);

    }
}