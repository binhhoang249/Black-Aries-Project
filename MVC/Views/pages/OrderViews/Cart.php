<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="http://localhost/Black-Aries-Project/public/css/cart.css?ver=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
    <div class="main_containerel">
        <div>
            <?php include_once __DIR__.'/../../Components/Header.php'; ?>
            <main>
                <div class="main-field flex-rr" style="margin-bottom:0.66px;">
                    <div class="elem-filed flex-rr">
                        <div class="c_option flex-rr">
                            <input type="checkbox">
                        </div>
                        <div class="c_quantity">
                            <b>All(<input type="number" id="cp-1" value="0" readonly>/<input type="number" value="0" id="cp-2" readonly> )</b>
                        </div>
                        <div class="c_delete">
                            <b></b><!-- delete -->
                        </div>
                        <div class="ct-price">
                            <b> Total: <input type="number" id="cps-price" value="0" readonly></b>
                        </div>
                    </div>
                    <form action="http://localhost/Black-Aries-Project/OrderController/checkout" method="POST" name="myForm" onsubmit="return checkvaliddata();">
                    <input type="text" id="post_cart" name="valueCart" readonly>
                    <button type="submit" name="cart" class="button-older"> Order </button>
                    </form>
                </div>
                <div id="tb-cart" class="main-field flex-rr" style="margin-bottom:36px;">
                    <div class="c_option flex-rr">
                        
                    </div>
                    <div class="p-product">
                        Product
                    </div>
                    <div class="p-price">
                        Price
                    </div>
                    <div class="p-quantity">
                        Quanity
                    </div>
                    <div class="p-total_price">
                        Total price
                    </div>
                    <div class="p-action">
                        Action
                    </div>
                </div>
<!-- -->
                <div id="box-cart">

                </div>
            </main>
        </div>
        <?php  include_once __DIR__.'/../../Components/Footer.php'; ?>
    </div>
    <script src="http://localhost/Black-Aries-Project/public/js/cart.js?ver=<?php echo time(); ?>"></script>
</body>
</html>