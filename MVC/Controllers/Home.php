<?php
class Home extends Controller {
    static function index()
    {
        $model = self::model("productModel");
        $data['product']= $model->getProducts();
        $data['categories']= $model->getCatagories();
        $data['product_color']= $model->getProductColor();
        $liProduct=$data['product'];
        for($j=0;$j<count($liProduct)-1;$j++){
            for( $i=0;$i<count($liProduct)-1-$j;$i++){
                if($liProduct[$i]['popular']<$liProduct[$i+1]['popular']){
                    $temp=$liProduct[$i];
                    $liProduct[$i]=$liProduct[$i+1];
                    $liProduct[$i+1]=$temp;
                }
            }
        }
        $dateProduct=$data['product'];
        for($j=0;$j<count($liProduct)-1;$j++){
            for( $i=0;$i<count($liProduct)-1-$j;$i++){
                $date1= new DateTime($dateProduct[$i]['time_stamp']);
                $date2= new DateTime ($dateProduct[$i+1]['time_stamp']);
                if($date1->getTimestamp() < $date2->getTimestamp()){
                    $temp=$dateProduct[$i];
                    $dateProduct[$i]=$dateProduct[$i+1];
                    $dateProduct[$i+1]=$temp;
                }
            }
        }
        $data['product_lates']=$dateProduct;
        $data['product_popular']=$liProduct;
        if (isset($_GET['logout']) && $_GET['logout'] == 'successt') {
            unset($_SESSION['userIDB']);
        }
        self::view('pages/webViews/Homepage',$data);
    }
}
?>
<!-- Mỗi thằng action sẽ thực hiện 1 hàm tương ứng right. -->

