<?php
class Detail extends Controller {
    public function show($id) {
        // Lấy model của Details
        $idi=(int)$id;
        $model = self::model("DetailsModel");
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
        self::view("detail", $data);
    }
}
?>
