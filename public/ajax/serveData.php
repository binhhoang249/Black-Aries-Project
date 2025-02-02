<?php
session_start();
include_once '../../MVC/core/DModel.php';
include_once '../../MVC/core/Database.php';
include_once '../../MVC/Models/ProductModel.php';
include_once '../../MVC/Models/UserModel.php';
include_once '../../MVC/Models/OrderModel.php';
include_once '../../MVC/Models/HomeModel.php';
//Tạo một đối tượng mới
$condi=json_decode(file_get_contents('php://input'),true);
if ($condi =="getCategory"){
    //tìm danh sách category
    $model =new productModel();
    $res['category'] = $model->getCatagories();
    $res['product']= $model->getProducts();
    if(!empty($res)){
        echo(json_encode($res));
    }else{
        echo(json_encode([]));
    }

}else if(is_string($condi)&&preg_match("/^getProductFcategory/",$condi) ){
    //Phần tử thứ 2 là id của industry
    $list =explode('-',$condi);
    //
    $model =new productModel();
    $products=$model->getProducts();
    $pro_colors=$model->getProductColor();
    $res=[];
    $res1=[];
    foreach($products as $product){
        if($product['category_id']==$list[1]){
            array_push($res,$product);
            foreach($pro_colors as $value){
                if($value['product_id']==$product['product_id']){
                    array_push($res1,$value);
                    break;
                }
            }
        }
    }
    $resMain['products']=isset($res)?$res:[];
    $resMain['product_colors']=isset($res1)?$res1:[];
    echo(json_encode($resMain));
}else if(isset($condi['action'])&&$condi['action']=="getUser"){
    $model= new userModel();
    $idUseral = $_SESSION['userIDB']??0;
    if(!empty($idUseral)){
        $uss = $model-> getUsers();
        $ob = null;
        foreach($uss as $value){
            if($value['user_id']==$idUseral){
                $ob=$value;
                break;
            }
        }
        if(!empty($ob)){
            echo (json_encode($ob));
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="getUsers"){
    $model= new userModel();
    $users = $model-> getUsers();
    if(!empty($users)){
        echo (json_encode($users));
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="checkPassword"){
    $idUseral = $_SESSION['userIDB']??0;
    if(!empty($idUseral)){
        $hash=$condi['hash']??0;
        $def= $condi['op']??0;
        if(!empty($hash)&&!empty($def)){
            if(password_verify($def,$hash)){
                echo (json_encode(true));
            }else{
                echo (json_encode(""));
            }
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="updateInformUser"){
    $model= new userModel();
    $idUseral = $_SESSION['userIDB']??0;
    if(!empty($idUseral)){
        $uFname=$condi['fullname']??0;
        $uPassw = $condi['password']??0;
        $data=[]; 
        if(!empty($uFname)){
            $data['fullname']=$uFname;
        } 
        if(!empty($uPassw)){
            $data['password']=password_hash($uPassw,PASSWORD_DEFAULT);
        }
        $con = "user_id = {$idUseral}";
        if(count($data)>0){
            $res = $model->setUser('Users',$data,$con);
            if($res){
                echo (json_encode(true));
            }else{
                echo (json_encode(""));
            }
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode(""));
    }
} else if (isset($_FILES['avatarUser'])){
    $model= new userModel();
    $idUseral = $_SESSION['userIDB']??0;
    if(!empty($idUseral)){
        $dir=__DIR__.'/../images/avatars/';
        $name_file= basename($_FILES['avatarUser']['name']);
        $uniquedName=getNameImage();
        $name_file=$uniquedName.$name_file;
        $target_file= $dir . $name_file;
        $file_type=strtolower(pathinfo($name_file,PATHINFO_EXTENSION));
        $allowed_type=['jpg','jpef','png','gif','pdf','jfif'];
        if(!in_array($file_type,$allowed_type)){
            echo (json_encode(""));
        }else{
            if(move_uploaded_file($_FILES['avatarUser']['tmp_name'],$target_file)){
                $data['avatar']=$name_file;
                $con = "user_id = {$idUseral}";
                $res = $model->setUser('Users',$data,$con);
                echo (json_encode($res));
            }else{
                echo (json_encode($res));
            }
        }
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="getOrders"){
    $model= new OrderModel();
    $orders = $model-> getAllOrders();
    if(!empty($orders)){
        echo (json_encode($orders));
    }else{
        echo (json_encode(""));
    }
} else if(isset($condi['action'])&&$condi['action']=="getColor"){
    $model= new productModel();
    $color = $model-> getColor();
    if(!empty($color)){
        echo (json_encode($color));
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="getBussiness"){
    $model= new HomeModel();
    $bussiness = $model-> getInformationAboutUs();
    if(!empty($bussiness)){
        echo (json_encode($bussiness));
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="updateBussiness"){
    $model= new HomeModel();
    if(!empty($condi['description'])){
        $data['description']=$condi['description'];
    }
    if(!empty($data)){
        $result= $model->updateBussiness($data);
        if(!empty($result)){
            echo (json_encode($result));
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode(""));
    }
} else if(isset($condi['action'])&&$condi['action']=="addCategory"){
    $model= new productModel();
    $data=[];
    if(!empty($condi['category_name'])){
        $data['category_name']=$condi['category_name'];
    }
    if(!empty($data)){
        $result = $model->addCategory($data);
        if(!empty($result)){
            echo (json_encode($result));
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="getCategories"){
    $model= new productModel();
    $categories = $model->getCatagories();
    if(!empty($categories)){
        echo (json_encode($categories));
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="deleteCategory"){
    $model= new productModel();
    $category_id=$condi['category_id'];
    if(!empty($category_id)){
        $con="category_id = " . $category_id;
        $res=$model->deleteCategory($con);
        if(!empty($res)){
            echo (json_encode($res));
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="updateCategory"){
    $model= new productModel();
    if(!empty($condi['category_name'])){
        $data['category_name']=$condi['category_name'];
    }
    if(!empty($data)){
        $con= "category_id = " . $condi['category_id'];
        $result= $model->updateCategory($data, $con);
        if(!empty($result)){
            echo (json_encode($result));
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="getProducts"){
    $model= new productModel();
    $products = $model-> getProducts();
    if(!empty($products)){
        echo (json_encode($products));
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="addColor"){
    $model= new productModel();
    $data=[];
    if(!empty($condi['color_name'])){
        $data['color_name']=$condi['color_name'];
    }
    if(!empty($condi['color_link'])){
        $data['color_link']=$condi['color_link'];
    }
    if(!empty($data)){
        $result = $model->addColor($data);
        if(!empty($result)){
            echo (json_encode($result));
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="updateColor"){
    $model= new productModel();
    if(!empty($condi['color_name'])){
        $data['color_name']=$condi['color_name'];
    }
    if(!empty($condi['color_link'])){
        $data['color_link']=$condi['color_link'];
    }
    if(!empty($data)){
        $con= "color_id = " . $condi['color_id'];
        $result= $model->updateColor($data, $con);
        if(!empty($result)){
            echo (json_encode($result));
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="deleteColor"){
    $model= new productModel();
    $color_id=$condi['color_id'];
    if(!empty($color_id)){
        $con="color_id = " . $color_id;
        $res=$model->deleteColor($con);
        if(!empty($res)){
            echo (json_encode($res));
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="getProductColor"){
    $model= new productModel();
    $product_color = $model-> getProductColorAll();
    if(!empty($product_color)){
        echo (json_encode($product_color));
    }else{
        echo (json_encode(""));
    }
}else if(isset($condi['action'])&&$condi['action']=="addCart"){
    $model=new OrderModel();
    $idUseral = $_SESSION['userIDB']??0;
    if(!empty($idUseral)){
        $p_color=$condi['product_color_id']??0;
        $data=[]; 
        if(!empty($p_color)){
            $data['product_color_id']=$p_color;
        } 
        if(count($data)>0){
            $data['user_id']=$idUseral;
            $data['status']=1;
            $data['quantity']=1;
            $res = $model->addCart($data);
            if($res){
                echo (json_encode(true));
            }else{
                echo (json_encode(""));
            }
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode("userId"));
    }
}else if(isset($condi['action'])&&$condi['action']=="getCarts"){
    $idUseral = $_SESSION['userIDB']??0;
    if(!empty($idUseral)){
        $model =new ProductModel();
        $olderModel= new OrderModel();
        $res['product_color'] = $model->getProductColorAll();
        $res['product']= $model->getProducts();
        $res['cart']= $olderModel->getCarts($idUseral);
        $res['color']= $model->getColor();
        if(!empty($res)){
            echo(json_encode($res));
        }else{
            echo(json_encode([]));
        }
    }else{
        echo (json_encode("userId"));
    }
}else if(isset($condi['action'])&&$condi['action']=="updateCart"){
    $model=new OrderModel();
    $idUseral = $_SESSION['userIDB']??0;
    if(!empty($idUseral)){
        $p_color=$condi['product_color_id']??0;
        $p_num=$condi['quantity']??0;
        $p_price=$condi['price']??0;
        $data=[]; 
        if(!empty($p_num)){
            $data['quantity']=$p_num;
        } 
        if(!empty($p_price)){
            $data['price']=$p_price;
        } 
        $condi="user_id = ". $idUseral." and product_color_id = ". $p_color;
        if(count($data)>0){
            $res = $model->updateCart('Orders',$data,$condi);
            if($res){
                echo (json_encode(true));
            }else{
                echo (json_encode(""));
            }
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode("userId"));
    }
}else if(isset($condi['action'])&&$condi['action']=="updateCart1"){
    $model=new orderModel();
    $idUseral = $_SESSION['userIDB']??0;
    if(!empty($idUseral)){
        $p_color=$condi['product_color_id']??0;
        $p_num=$condi['quantity']??0;
        $p_cart=$condi['cart_id']??0;
        $data=[]; 
        if(!empty($p_num)){
            $data['quantity']=$p_num;
        } 
        if(!empty($p_color)){
            $data['product_color_id']=$p_color;
        } 
        $condi="user_id = ". $idUseral." and order_id = ". $p_cart;
        if(count($data)>0){
            $res = $model->updateCart('Orders',$data,$condi);
            if($res){
                echo (json_encode(true));
            }else{
                echo (json_encode(""));
            }
        }else{
            echo (json_encode(""));
        }
    }else{
        echo (json_encode("userId"));
    }
} else if(isset($condi['action'])&&$condi['action']=="deleteCart"){
    $model=new orderModel();
    $idUseral = $_SESSION['userIDB']??0;
    if(!empty($idUseral)){
        $p_cart=$condi['cart_id']??0;
        $condi="order_id = ". $p_cart;
            $res = $model->deleteCart('Orders',$condi);
            if($res){
                echo (json_encode(true));
            }else{
                echo (json_encode(""));
            }
    }else{
        echo (json_encode("userId"));
    }
}else if(isset($condi['action'])&&$condi['action']=="getOrderWithYear"){
    $model= new orderModel();
    if(!empty($condi['year'])){
        $orders = $model-> getOrderWithYear($condi['year']);
        if(!empty($orders)){
            echo (json_encode($orders));
        }else{
            echo (json_encode(""));
        }
    } else{
        echo (json_encode(""));
    }
}
//Hàm lấy tên ảnh theo ngày/mã băm(tên)
function getNameImage(){
    $model= new userModel();
    $uss = $model-> getUsers();
    $ob = null;
    $idUseral=$_SESSION['userIDB']??0;
    foreach($uss as $value){
        if($value['user_id']==$idUseral){
            $ob=$value;
            break;
        }
    }
    if(empty($ob)){
        $ob="name".mt_rand(1,100);
    }
    $encriptName=md5($ob['fullname']);
    $time= (new DateTime())->format('YmdHis');
    $ramdumNumber= "e".mt_rand(1,1000);
    return $time.$ramdumNumber.$encriptName;
}
?>