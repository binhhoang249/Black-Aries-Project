<?php
class Home extends Controller {
    static function SayHi()
    {
        $kit = self::model("ProductModel");
        echo $kit->GetProducts();
    }
    static function Show($a, $b)
    {
//        model
        $kit = self::model("ProductModel");
        $tong = $kit->Tong($a,$b);
//        view
        self::view("NewProducts",["Number"=>$tong]);
    }
}
?>
<!-- Mỗi thằng action sẽ thực hiện 1 hàm tương ứng right. -->