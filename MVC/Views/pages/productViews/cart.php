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
            <?php include_once __DIR__.'/../../components/header.php'; ?>
            <main>
                <div class="main-field flex-rr" style="margin-bottom:0.66px;">
                    <div class="elem-filed flex-rr">
                        <div class="c_option flex-rr">
                            <input type="checkbox">
                        </div>
                        <div class="c_quantity">
                            <b>All(<span id="cp-1">1</span>/<span id="cp2">2</span> )</b>
                        </div>
                        <div class="c_delete">
                            <b>Delete</b>
                        </div>
                        <div class="ct-price">
                            <b> Totol: <span id="cps-price">0</span> </b>
                        </div>
                    </div>
                    <button class="button-older"> older </button>
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
                <div class="field-product flex-rr">
                    <div class="c_option flex-rr">
                        <input type="checkbox" name="c_op">
                    </div>
                    <div class="p-product flex-rr" >
                        <a href="">
                            <div class="tag-image">
                                <img src="#" alt="">
                            </div>
                        </a>
                        <div class="tag-info flex-rr">
                            <a href="">
                                <span  class="product_namer">Ghế</span>
                            </a>
                            <span >
                                Màu: 
                                <select name="id_proco" class="product_clolor">
                                    <option class="product_clolor" value="Xám">Xám</option>
                                    <option class="product_clolor" value="Xám">Đen</option>
                                </select>
                            </span>
                        </div>
                    </div>
                    <div class="p-price">
                        <div class="tag-price flex-rr">
                            <span id="old-price">12000</span>
                            <span id="new-price">12000</span>
                        </div>
                    </div>
                    <div class="p-quantity">
                        <div class="tag-quntity">
                            <span class="flex-rr rm">-</span>
                            <input type="number" value="1">
                            <span class="flex-rr ad">+</span>
                        </div>
                    </div>
                    <div class="p-total_price">
                        <span class="total-price">12000</span>
                    </div>
                    <div class="p-action">
                        <button class="tag-delete">
                            <b>Delete</b>
                        </button>
                    </div>
                </div>
            </main>
        </div>
        <?php  include_once __DIR__.'/../../components/footer.php'; ?>
    </div>
</body>
</html>