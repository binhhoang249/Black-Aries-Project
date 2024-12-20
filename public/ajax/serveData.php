<?php
session_start();
include_once '../../MVC/core/DModel.php';
include_once '../../MVC/core/Database.php';
include_once '../../MVC/Model/HomepageModel.php';
include_once '../../MVC/Model/userModel.php';
//Tạo một đối tượng mới
$condi=json_decode(file_get_contents('php://input'),true);
if ($condi =="getCategory"){
    //tìm danh sách category
    $model =new HomePageModel();
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
    $model =new HomePageModel();
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
        $allowed_type=['jpg','jpef','png','gif','pdf'];
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