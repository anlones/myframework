<?php
/**
 * Created by PhpStorm.
 * User: 31337
 * Date: 2019/3/15
 * Time: 3:04
 */
$url_600w_ffssc = "https://www.6008891.com/ssc/index.html#/ssc/gcdt/ffssc.html";
$url_i8_yfc = "http://www.1lc11.com/gf/10231";
$url_tiantianzhong_cqssc = "https://tiantianzhong888.com/#/betindex/timeclass";
$lc = "http://www.328143.com/lotteryV3/lotDetail.do?lotCode=LCQSSC";
$dajiang = "https://www.jiangcp.com/szc/gdklsf/";
$url_arr = "http://www.328143.com/lotteryV3/lotLast.do?qiHao=20190315044&lotCode=CQSSC";
try{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url_tiantianzhong_cqssc);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl,CURLOPT_HTTPHEADER,array(
        'Content-Type: application/json; charset=utf-8',
        'Content-Length: '
    ));
    $content = curl_exec($curl);
}catch(Exception $e){
    echo "2321".$e->getMessage();
    exit;
}
echo "ds ".$content;


/*$lines_array = file($url_600w_ffssc);
$lines_str = implode('',$lines_array);
echo htmlspecialchars($lines_str);*/


/*$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $dajiang);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。
$html = curl_exec($ch);
curl_close($ch);
echo "<textarea style='width:800px;height:600px;'>".$html."</textarea>";*/