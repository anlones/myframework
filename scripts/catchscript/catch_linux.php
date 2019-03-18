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
    if($content==null || empty($content)){
        $content = '{"success":false}';
    }
    return json_decode($content,true);
}

function inputFile($content,$siteName = "web",$loterry,$errorfilename=""){
    $dir = "/opt/app/crontab/cj/".$siteName;
    if(!file_exists($dir)){
        mkdir($dir);
    }
    $nowtime = date("Y-m-d H:i:s");
    $nowdata = date("Y-m-d H");
    if(!empty($errorfilename)){
        $filename = $dir."/".$errorfilename;
    }else {
        $filename = $dir."/".$nowdata."_".$siteName."_".$loterry.".txt";
    }
    $strPrefix = $nowtime." ";
    $strSuffix = "\r\n";
    $str = $strPrefix.$content.$strSuffix;
    file_put_contents($filename,$str,FILE_APPEND | LOCK_EX);
}

function catchCode($url,$webName,$loterry){
    $arr = httpRequest($url);
    $success = $arr["success"];
    $content = "";
    if($success == "true"){
        $haoMa = $arr["last"]["haoMa"];
        $qiHao = $arr["last"]["qiHao"];
        $openTime = date("Y-m-d H:i:s",$arr["last"]["openTime"]);
        $endTime = date("Y-m-d H:i:s",$arr["last"]["endTime"]);
        $content = "qiHao:".$qiHao." opentime:".$openTime." endTime:".$endTime." haoma:".$haoMa;
        inputFile($content,$webName,$loterry);
    }else{
        $content = "error！data not found --------";
        $errorfilename = date("Y-m-d")."_error";
        inputFile($content,$webName,$loterry,$errorfilename);
    }
    inputFile($content,$webName,$loterry);
}
date_default_timezone_set("Asia/Shanghai");

$webName = "www.328143.com";
$url_arr = array(
    "cqssc"=> "http://www.328143.com/lotteryV3/lotLast.do?qiHao=20190315044&lotCode=CQSSC",
    "yfks"=> "http://www.328143.com/lotteryV3/lotLast.do?qiHao=201903151212&lotCode=FFK3",
    "lcqssc" => "http://www.328143.com/lotteryV3/lotLast.do?qiHao=201903151215&lotCode=FFC",
    "ffc" => "http://www.328143.com/lotteryV3/lotLast.do?qiHao=201903151215&lotCode=FFC",
    "fc3d" => "http://www.328143.com/lotteryV3/lotLast.do?qiHao=2019067&lotCode=FC3D",
    "pcdd" => "http://www.328143.com/lotteryV3/lotLast.do?qiHao=941345&lotCode=PCEGG",
    "bjsc" => "http://www.328143.com/lotteryV3/lotLast.do?qiHao=730860&lotCode=BJSC"
);
catchCode($url_arr["cqssc"],$webName,"cqssc");







