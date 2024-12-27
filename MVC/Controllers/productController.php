<?php
class productController extends Controller {
    public function detail($id) {
        // Lấy model của Details
        $idi=(int)$id;
        $model = self::model("productModel");
        $data['product'] = $model->getProduct($idi);
        $data['product_color'] = $model->getProduct_color($idi);
        $liProduct=$data['product_color'];
        for($j=0;$j<count($liProduct)-1;$j++){
            for( $i=0;$i<count($liProduct)-1-$j;$i++){
                if($liProduct[$i]['defaultal']<$liProduct[$i+1]['defaultal']){
                    $temp=$liProduct[$i];
                    $liProduct[$i]=$liProduct[$i+1];
                    $liProduct[$i+1]=$temp;
                }
            }
        }
        $data['color']=$model-> getColor();
        $data['product_color']=$liProduct;
        // Trả về View và truyền dữ liệu
        self::view("pages/productViews/detail", $data);
    }
    //Cart page /////////////////////////////////////////////////////////////////////////////
    public function cart(){
        self::view("pages/productViews/cart");
    }
    //checkout
    public function checkout(){
        $model = self::model("productModel");
        $model1 = self::model("userModel");
        $data=[];
        $data['products'] = $model->getProducts();
        $data['product_color'] = $model->getProductColorAll();
        $id=$_SESSION['userIDB']??0;
        $data['user']=$model1->getUser( $id);
        $data['payment']=$model->getPayment();
        if(isset($_POST['cart'])){
            $listP=explode(',',$_POST['valueCart']);
            $listCart=$model->getCarts($_SESSION['userIDB'] );
            $rel=[];
            foreach($listP as $va){
                foreach($listCart as $val){
                    if($val['older_id']==$va){
                        array_push($rel,$val);
                        break;
                    }
                }
            }
            $data['carts']=$rel;
            $_SESSION['li_cart']=$rel;
        }else if(isset($_POST['ve_older'])){
            $data['carts']=$_SESSION['li_cart'];
            $listP=explode(',',$_POST['valueCart']);
            $listCart=$model->getCarts($_SESSION['userIDB'] );
            $rel=[];
            foreach($listP as $va){
                foreach($listCart as $val){
                    if($val['older_id']==$va){
                        array_push($rel,$val);
                        break;
                    }
                }
            }
            foreach($rel as $value){
                $product_col=[];
                foreach($data['product_color'] as $prod){
                    if($prod['product_color_id']==$value['product_color_id']){
                        $product_col=$prod;
                        break;
                    }
                }
                $pro_de=null;
                if(!empty($product_col)){
                    foreach($data['products'] as $prod){
                        if($prod['product_id']==$product_col['product_id']){
                            $pro_de=$prod;
                            break;
                        }
                    }
                }
                if (!empty($pro_de)){
                    $day=date("Y-m-d");
                    $idpp=$_POST['pay']??1;
                    $olPrice=(int)$product_col['price'];
                    $price=($olPrice - ($olPrice*($pro_de['discount'])/100))*$value['quantity'];
                    $davi=['price'=>$price,'status'=>2,'order_date'=>$day,'payment_id'=>$idpp];
                    $condi="user_id = ".$_SESSION['userIDB']." and older_id = ".$value['older_id'];
                    $model->updateCart("Older",$davi,$condi);
                }else{
                    header("http://localhost/Black-Aries-Project/productController/checkout");
                }
                $adr=$_POST['address_user']??"";
                $pho=$_POST['phone_user']??"";
                $condi="user_id = ".$_SESSION['userIDB'];
                $model1->setUser("Users",['address'=>$adr,'phone'=>$pho],$condi);
                header("Location: http://localhost/Black-Aries-Project/home");
            }
        }else if(isset($_POST[''])){

        }else{
            $data['carts']=$_SESSION['li_cart'];
        }
        self::view("pages/productViews/checkout",$data);
    }
    public function searchProduct(){
        $model = self::model("productModel");
        $data['product'] = $model->searchProduct();
        self::view("pages/productViews/searchProduct", $data);
    }
}
?>