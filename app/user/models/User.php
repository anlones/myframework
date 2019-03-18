<?php
/**
 * Created by PhpStorm.
 * User: 31337
 * Date: 2018/11/25
 * Time: 22:29
 */

namespace app\user\models;

use framework\base\Model;
use framework\db\Db;

class User extends Model
{
    protected $table = "user";

    public function search($keyword){
        //$sql = "select * from '$this->table' where 'username' like :$keyword ";
        $sql = "select * from $this->table where username like :keyword";
        $sth = Db::pdo()->prepare($sql);
        $sth = $this->formatParam($sth,[':keyword' => "%$keyword%"]);
        $sth->execute();

        return $sth->fetchAll();
    }
}