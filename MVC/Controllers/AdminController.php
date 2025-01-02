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
                    header ("Location: http://localhost/Black-Aries-Project/AdminController/productManagement?position=1");
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

    public function productManagement(){
        $model=self::model('ProductModel');
        $products=$model->getProducts();
        $data['products']=[];
        foreach($products as $product){
            array_push($data['products'],$product);
        }
        self::view("Pages/AdminViews/ProductsManagement",$data);
    }
    
    public function orderManagement() {
        $model = self::model("OrderModel");
        $orders = $model->admingetAllOrdersWithDetails();
    
        if (!empty($orders)) {
            $data = ['result' => $orders];
        } else {
            $data = ['result' => null, 'message' => 'No orders found.'];
        }
    
        self::view("Pages/AdminViews/orderManagement", $data);
    }
    public function searchOrder() {
        if (isset($_POST['searchorder']) && !empty(trim($_POST['searchorder']))) {
            $query = trim($_POST['searchorder']);  
    
            $model = self::model("OrderModel");
            $results = $model->searchOrders($query);  
        } else {
            echo "Từ khóa tìm kiếm không hợp lệ hoặc trống!";
            return;  
        }
        if ($results && !empty($results)) {
            $data['result'] = $results;  
            $data['searchTerm'] = $query; 
            $data['message'] = "No orders found matching your search."; 
    
        
        self::view("Pages/AdminViews/orderManagement", $data);  
    }

    }
 }
?>