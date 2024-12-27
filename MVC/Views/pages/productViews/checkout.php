<?php extract($data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="http://localhost/Black-Aries-Project/public/css/checkout.css?ver=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
    <div class="main_containerel">
        <div>
            <?php include_once __DIR__.'/../../components/header.php'; ?>
            <form action="http://localhost/Black-Aries-Project/productController/checkout" method="POST" name="myForm" class="content-container" onsubmit="return checkvaliddata();">
                <div class="box-infoUser">
                    <p class="title">Infomation</p>
                    <div class="content">
                        <div class="big-field">
                            <div class="field-user">
                                <p>Name</p>
                                <input type="text" name="name_user" value="<?php echo $user[0]['fullname'] ;?>" readonly class="in">
                            </div>
                            <div class="field-user">
                                <p>Phone</p>
                                <input type="text" name="phone_user" value="<?php echo $user[0]['phone']; ?>" class="in" id="f_phone" required>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="field-user">
                            <p>Adress</p>
                            <input type="text" name="address_user" value="<?php echo $user[0]['address'] ;?>"  class="field_address" required>
                        </div>
                        <br>
                        <br>
                        <p>Payment method</p>
                        <div class="box_pay">
                            <?php foreach($payment as $value){
                            ?>
                            <label  class="label-pay">
                                <?php echo $value['payment_name'] ;?>
                                <input type="radio" name="pay" value="<?php echo $value['payment_id'] ;?>">
                            </label>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="box-products">
                    <p class="title">Older</p>
                    <div class="conten-product">
                        <?php $listCa="";
                            $total=0;
                         ?>
                        <?php foreach($carts as $value){ 
                            $product_col=[];
                            foreach($product_color as $prod){
                                if($prod['product_color_id']==$value['product_color_id']){
                                    $product_col=$prod;
                                    break;
                                }
                            }
                            $pro_de=null;
                            if(!empty($product_col)){
                                foreach($products as $prod){
                                    if($prod['product_id']==$product_col['product_id']){
                                        $pro_de=$prod;
                                        break;
                                    }
                                }
                            }
                            if (!empty($pro_de)):
                            $olPrice=(int)$product_col['price'];
                            $price=($olPrice - ($olPrice*($pro_de['discount'])/100))*$value['quantity'];
                            $total += $price;
                            if(strlen($listCa)>0){
                                $listCa .= ",".$value['older_id'];
                            }else{
                                $listCa .=$value['older_id'];
                            }
                            ?>
                                <div class="fild-info-product">
                                    <p class="name-product">(<?php echo $value['quantity'] ;?>)<?php echo $pro_de['product_name'] ;?></p>
                                    <p class="price-product"><?php echo $price ;?></p>
                                </div>
                            <?php
                            endif;
                        }
                        ?>
                    </div>
                    <div class="fild-info-product">
                        <input type="text" name="valueCart" value="<?php echo  $listCa ; ?>" style="display:none;">
                        <p class="name-product">Total</p>
                        <p class="price-product"><?php echo  $total ; ?></p>
                    </div>
                    <div class="box-botton">
                        <button type="submit" id="butOlder"name="ve_older">Older</button>
                    </div>
                </div>
            </form>
        </div>
        <?php include_once __DIR__.'/../../components/footer.php'; ?>
    </div>
    <script>
        var pay=document.querySelectorAll('.label-pay');
        pay.forEach(p => {
            let input = p.querySelector('input');
            input.addEventListener('change',function(){
                pay.forEach(p1 => {
                    p1.classList.remove('hove');
                })
                if(input.checked){
                    p.classList.add('hove');
                }else{
                    p.classList.remove('hove');
                }
            })
        })
        var but = document.getElementById('butOlder');
        but.addEventListener('click', function(event) {
            let payment = document.querySelectorAll('.label-pay');
            let num = 0;
            
            payment.forEach(p => {
                let inp = p.querySelector('input');
                if (inp.checked == true) {
                    num += 1;
                }
            });

            if (num < 1) {
                alert("Chose payment method");
                event.preventDefault(); 
            }
            let pho = document.querySelector('f_phone');
            if(pho.value.length<8){
                alert("Length of phone should be more 8 character");
                event.preventDefault(); 
            }
        });
    </script>
</body>
</html>