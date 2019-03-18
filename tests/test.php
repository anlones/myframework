<?php

use framework\db\Db;

/*$sql = "sql:insert into `user` (`code`,`username`,`email`,`mobile`,`status`,`password`,`create_time`,`update_time`,`listorder`) values (:code,:username,:email,:mobile,:status,:password,:create_time,:update_time,:listorder)" ;
$sth = Db::pdo()->prepare($sql);*/
$nowtime = date("Y-m-d H:i:s");
echo $nowtime."<br>";
$nowtime = date("Y-m-d h:i:s");
echo $nowtime."<br>";
$nowdatah = date("Y-m-d H");