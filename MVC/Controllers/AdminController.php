<?php
 class AdminController extends controller {
    public function index(){
        $data = [];
        $error=null;
        $model = self::model('UserModel');
        if(isset($_POST['signup'])){
            $users = $model->getUsers();
            $user=null;
            foreach($users as $value){
                if($value['username'] == $_POST['username']){
                    $user=$value;
                    break;
                }
            }
            //print_r($user);
            if(!empty($user) && $user['role']==1){
                if(password_verify($_POST['password'], $user['password'])){
                    //Di chuyển đến trang gi đó
                    echo("good");
                }else{
                    $error="password";
                }
            }else{
                $error="wrongAccount";
            }
        }
        self::view("Pages/AdminViews/index");
        if(!empty($error) && $error == "wrongAccount"){
            echo(" <script> document.addEventListener('DOMContentLoaded', function() { alert('Account is unexited'); }); </script>");
        }else if(!empty($error) && $error == "password"){
            echo(" <script> document.addEventListener('DOMContentLoaded', function() { alert('The password is wrong'); }); </script>");
        }
    }
    public function userManagement(){
        $model=self::model('UserModel');
        $users=$model->getUsers();
        $data['users']=[];
        foreach($users as $user){
            if($user['role']!=1){
                array_push($data['users'],$user);
            }
        }
        self::view("Pages/AdminViews/UserManagement",$data);
    }
 }
?>