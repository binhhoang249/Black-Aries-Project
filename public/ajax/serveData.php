<?php
include_once '../../MVC/core/DModel.php';
include_once '../../MVC/core/Database.php';
include_once '../../MVC/Model/HomepageModel.php';
//Tạo một đối tượng mới

$condi=json_decode(file_get_contents('php://input'));
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

}else if(preg_match("/^getProductFcategory/",$condi) ){
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
}
?>