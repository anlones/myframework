<?php
/**
 * Created by PhpStorm.
 * User: 31337
 * Date: 2018/11/25
 * Time: 22:29
 */

namespace app\user\controllers;


use app\user\models\User;
use framework\base\Controller;

class UserController extends Controller
{
    public function index(){
        $keyword = isset($_GET["keyword"])? $_GET["keyword"]:"";

        if($keyword){
            $users = (new User())->search($keyword);
        }else{
            $users = (new User())->where()->order(["id"])->fetchAll();
        }
        $this->assign("title","查询全部");
        $this->assign("users",$users);
        $this->assign("keyword",$keyword);
        $this->render();
    }

    public function detail($id){
        $user = (new User())->where(["id = :id"],[":id"=>$id])->fetch();
        $this->assign("title","详情");
        $this->assign("user",$user);
        $this->render();
    }

    public function manage($id = 0){
        $user = array();
        if($id){
            $user = (new User())->where(["id = :id"],[":id"=>$id])->fetch();
        }
        $this->assign("title","管理条目");
        $this->assign("user",$user);
        $this->render();
    }

    public function add(){
        $data["code"] = $_POST["code"];
        $data["username"] = $_POST["username"];
        $data["email"] = $_POST["email"];
        $data["mobile"] = $_POST["mobile"];
        $data["status"] = "1";
        $data["password"] = "123456";
        $data["create_time"] = date("Ymdhis");
        $data["update_time"] = date("Ymdhis");
        $data["listorder"] = 1;

        $count = (new User())->add($data);
        $this->assign("title","添加成功");
        $this->assign("count",$count);
        $this->render();
    }

    public function delete($id = null){
        $count = (new User)->delete($id);
        $this->assign("title","删除成功");
        $this->assign("count",$count);
        $this->render();
    }

    public function update(){
        $data["code"] = $_POST["code"];
        $data["username"] = $_POST["username"];
        $data["email"] = $_POST["email"];
        $data["mobile"] = $_POST["mobile"];
        $data["id"] = $_POST["id"];
        $count = (new User)->where(['id = :id'], [':id' => $data['id']])->update($data);
        $this->assign('title', '修改成功');
        $this->assign('count', $count);
        $this->render();
    }

}