<?php
/**
 * Created by PhpStorm.
 * User: 31337
 * Date: 2019/3/15
 * Time: 1:45
 */
function httpRequest($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if ($data != null) {
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl,CURLOPT_HTTPHEADER,array(
        'Content-Type: application/json; charset=utf-8',
        'Content-Length: ' . strlen($data)
    ));
    $content = curl_exec($curl);
    curl_close($curl);
    return json_decode($content,true);
}

function inputFile($content,$siteName = "web",$loterry){
    //$dir = "/opt/app/crontab/cj/".$siteName;
    $dir = $siteName;
    if(!file_exists($dir)){
        mkdir($dir);
    }
    $nowtime = date("Y-m-d H:i:s");
    $nowdatah = date("Y-m-d H");
    $filename = $dir."/".$nowdatah."_".$siteName."_".$loterry.".txt";
    $strPrefix = $nowtime." ";
    $strSuffix = "\r\n";
    $str = $strPrefix.$content.$strSuffix;
    file_put_contents($filename,$str,FILE_APPEND | LOCK_EX);
}

function catchCode($url,$webName,$loterry){
    $arr = httpRequest($url);
    $success = $arr["code"];
    $content = "";
    if($success == 1){
        $haoMa = $arr["last"]["haoMa"];
        $qiHao = $arr["last"]["qiHao"];
        $openTime = date("Y-m-d H:i:s",$arr["last"]["openTime"]);
        $endTime = date("Y-m-d H:i:s",$arr["last"]["endTime"]);
        $content = "qiHao:".$qiHao." opentime:".$openTime." endTime:".$endTime." haoma:".$haoMa;
    }else{
        $content = "error！data not found --------";;
    }
    inputFile($content,$webName,$loterry);
}
date_default_timezone_set("Asia/Shanghai");

$webName1 = "www.328143.com";
$url_arr1 = array(
    "cqssc"=> "http://www.328143.com/lotteryV3/lotLast.do?qiHao=20190315044&lotCode=CQSSC",
    "yfks"=> "http://www.328143.com/lotteryV3/lotLast.do?qiHao=201903151212&lotCode=FFK3",
    "lcqssc" => "http://www.328143.com/lotteryV3/lotLast.do?qiHao=201903151215&lotCode=FFC",
    "ffc" => "http://www.328143.com/lotteryV3/lotLast.do?qiHao=201903151215&lotCode=FFC",
    "fc3d" => "http://www.328143.com/lotteryV3/lotLast.do?qiHao=2019067&lotCode=FC3D",
    "pcdd" => "http://www.328143.com/lotteryV3/lotLast.do?qiHao=941345&lotCode=PCEGG",
    "bjsc" => "http://www.328143.com/lotteryV3/lotLast.do?qiHao=730860&lotCode=BJSC",
    "sflhc" => ""
);

$webName2 = "190812.com";
$url_arr2 = array(
    "dfssc"=> "http://190812.com/v1/lottery/openResult?lotteryCode=1008&dataNum=10&"
);

catchCode($url_arr2["dfssc"],$webName2,"dfssc");