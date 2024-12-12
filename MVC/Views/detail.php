<?php extract($data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link href="http://localhost/Black-Aries-Project/public/css/detail.css" rel="stylesheet">
</head>
<body>
    <div class="detail-container">
        <!-- khung ảnh -->
        <div class="slider-container">
            <div class="slider">
                <?php  
                    if(isset($product_color)&&count($product_color )>0) :
                        foreach($product_color as $value){
                            ?>
                                <div class="item" data-id="<?php echo($value['product_color_id']);?>"> <div class="item-image"><img src="<?php echo($value['image']);?>" alt="product_color"></div></div>
                            <?php
                        }
                    endif ;
                    ?>
            </div>
            <button type="button" class="but_lider">&#8593;</button>
            <button type="button" class="but_lider1">&#8595;</button>
        </div>
        <!--Anhr hiện lên -->
        <div class="cur_image">
            <img src="<?php echo isset($product_color)? $product_color[0]['image']:"" ;?>" alt="image">
        </div>
        <!-- Nội dung -->
         <div class="detail_content">
            <h2><?php echo isset($product)? $product[0]['product_name']:"" ;?></h2>
            <p><?php echo isset($product)? $product[0]['description']:"" ;?></p>
            <?php if(isset($product_color)&& count($product_color)>0): 
                    $dis=(float)$product[0]['discount'];
                    $priceprev=(float)$product_color[0]['price'];
                    $priceCur=$priceprev*$dis/100;
                    ?>
                        <div style="display:flex;align-items:center">
                            <div class="cur_price"><?php echo($priceCur); ?>$</div>
                            <div class="prev_price"><?php echo($priceprev); ?>$</div>
                        </div>
                            <form action="" method="POST" class="goCheckout">
                            <input id="product_color_id" name="product_color_id" type="text" placeholder="id của poduct_id" value="<?php echo($product_color[0]['product_color_id']); ?>">
                            <input id="product_pr" name="product_pr" type="number" placeholder="price" value="<?php echo($priceCur); ?>">
                            <label>$<input type="text" value="<?php echo($priceCur); ?>" name="product_price" id="product_price"></label> 
                            <input type="number" name="product_quantity" id="product_quantity" value="1">
                            <button type="submit" id="product_but" name="product_but">Buy</button>
                        </form>
                    <?php
                endif ;
                ?>
            <div class="d_field">
                <div>
                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_d_2183_475)">
                        <path d="M7.11078 12.4202H6.40719C5.63002 12.4202 5 11.6336 5 10.6632V2.75695C5 1.78661 5.63002 1 6.40719 1H12.7395C13.5167 1 14.1467 1.78661 14.1467 2.75695V10.6632C14.1467 11.6336 13.5167 12.4202 12.7395 12.4202H12.0359M15.2021 12.4202H14.8503C14.4617 12.4202 14.1467 12.0269 14.1467 11.5417V4.07466C14.1467 3.58949 14.4617 3.19619 14.8503 3.19619H16.6229C16.8367 3.19619 17.0388 3.3175 17.1723 3.52588L19.6213 7.34793C19.7211 7.5037 19.7754 7.69724 19.7754 7.89671V11.5417C19.7754 12.0269 19.4604 12.4202 19.0719 12.4202M11.3323 11.9809C11.3323 13.1939 10.5448 14.1771 9.57335 14.1771C8.60189 14.1771 7.81437 13.1939 7.81437 11.9809C7.81437 10.768 8.60189 9.78475 9.57335 9.78475C10.5448 9.78475 11.3323 10.768 11.3323 11.9809ZM18.7201 11.9809C18.7201 13.1939 17.9325 14.1771 16.9611 14.1771C15.9896 14.1771 15.2021 13.1939 15.2021 11.9809C15.2021 10.768 15.9896 9.78475 16.9611 9.78475C17.9325 9.78475 18.7201 10.768 18.7201 11.9809Z" stroke="black" stroke-width="2" stroke-linecap="round" shape-rendering="crispEdges"/>
                    </g>
                    <defs>
                        <filter id="filter0_d_2183_475" x="0" y="0" width="24.7754" height="23.1771" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="4"/>
                            <feGaussianBlur stdDeviation="2"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2183_475"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2183_475" result="shape"/>
                        </filter>
                    </defs>
                </svg>
                </div>
                <p>Ships via: Complimentary Inside Delivery & Package Removal</p>
            </div>
            <div class="d_field">
                <div>
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.2259 1.30603V4.76503C13.2259 5.40181 13.807 5.91802 14.5239 5.91802H18.4181M6.08656 5.91802H8.68267M6.08656 9.37702H13.8749M6.08656 12.836H13.8749M16.471 3.03553C15.8933 2.57639 15.2938 2.03182 14.9153 1.67814C14.6635 1.44279 14.3155 1.30603 13.95 1.30603H4.13918C2.70539 1.30603 1.54308 2.33845 1.54307 3.61201L1.54297 17.4479C1.54296 18.7215 2.70527 19.7539 4.13906 19.754L15.8216 19.754C17.2554 19.754 18.4177 18.7216 18.4177 17.4481L18.4181 5.22414C18.4181 4.92932 18.2914 4.64592 18.0611 4.43366C17.6351 4.04118 16.9238 3.39538 16.471 3.03553Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <p> Shipping Cost: Free Shipping
                </p>
            </div>
            <div class="d_field">
                <div>
                    <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.65367 0.790955V3.67345M15.3074 0.790955V3.67345M1.78597 7.60325H20.1751M14.9771 12.0327H14.9868M14.9771 14.9152H14.9868M10.9756 12.0327H10.9853M10.9756 14.9152H10.9853M6.97203 12.0327H6.98175M6.97203 14.9152H6.98175M20.7159 7.03636V15.2034C20.7159 18.0859 19.0933 20.0076 15.3074 20.0076H6.65367C2.86768 20.0076 1.24512 18.0859 1.24512 15.2034V7.03636C1.24512 4.15387 2.86768 2.2322 6.65367 2.2322H15.3074C19.0933 2.2322 20.7159 4.15387 20.7159 7.03636Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <p>Shipping Time:Ships in 6-8 weeks.</p>
            </div>
            <div class="d_field">
                <div>
                <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_d_2187_135)">
                        <path d="M18.7497 19.7363C17.5257 19.7363 16.3518 19.3044 15.4862 18.5356C14.6207 17.7668 14.1344 16.724 14.1344 15.6368V3.3381C14.1344 2.79447 14.3776 2.2731 14.8103 1.8887C15.2431 1.50429 15.8301 1.28833 16.4421 1.28833H21.0574C21.6694 1.28833 22.2564 1.50429 22.6891 1.8887C23.1219 2.2731 23.365 2.79447 23.365 3.3381V15.6368C23.365 16.724 22.8788 17.7668 22.0132 18.5356C21.1477 19.3044 19.9738 19.7363 18.7497 19.7363ZM18.7497 19.7363H4.90384C4.29181 19.7363 3.70485 19.5203 3.27209 19.1359C2.83932 18.7515 2.59619 18.2302 2.59619 17.6865V13.587C2.59619 13.0433 2.83932 12.522 3.27209 12.1376C3.70485 11.7532 4.29181 11.5372 4.90384 11.5372H7.55764M14.1344 5.74659L11.8268 3.69681C11.394 3.31254 10.8072 3.09667 10.1953 3.09667C9.58338 3.09667 8.99652 3.31254 8.56377 3.69681L5.30076 6.5952C4.86814 6.97959 4.62511 7.50086 4.62511 8.04439C4.62511 8.58791 4.86814 9.10919 5.30076 9.49358L15.6852 18.7176M18.7497 15.6368V15.647" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" shape-rendering="crispEdges"/>
                    </g>
                    <defs>
                        <filter id="filter0_d_2187_135" x="-2.40381" y="0.28833" width="30.769" height="28.448" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="4"/>
                            <feGaussianBlur stdDeviation="2"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2187_135"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2187_135" result="shape"/>
                        </filter>
                    </defs>
                </svg>
                </div>
                <p>100% Price Match</p>
            </div>
         </div>
    </div>
    <script type="text/javascript">
        var list_product_color=(<?php echo( isset($product_color)?json_encode($product_color):""); ?>);
        var product =(<?php echo( isset($product)?json_encode($product):""); ?>);
        var qualityProduct = document.getElementById('product_quantity');
        qualityProduct.addEventListener('input',function(){
            let per = qualityProduct.value;
            console.log(per);
            if(per>0){
                let cur =document.getElementById('product_pr').value;
                console.log(cur);
                let pric=Number(per)*parseFloat(cur);
                document.getElementById('product_price').value=pric;
            }else{
                document.getElementById('product_price').value=0;
            }
        })
        var itemal =document.querySelectorAll('.item');
        itemal.forEach( ite => {
            ite.addEventListener('click',function(){
                let de_pro_id=ite.dataset.id;
                console.log(de_pro_id)
                console.log(list_product_color)
                let de_product_color;
                for(let ab of list_product_color){
                    if(ab.product_color_id==de_pro_id){
                        de_product_color=ab;
                        console.log("sssssss")
                        console.log(de_product_color)
                        break;
                    }
                }
                console.log(de_product_color)
                document.querySelector('.cur_image').innerHTML=`
                    <img src="public/images/${de_product_color.image}" alt="image1">
                `
                let dis= parseFloat(product[0].discount);
                let de_price=parseFloat(de_product_color.price);
                let de_curPrice= (dis*de_price)/100; 
                document.querySelector('.cur_price').innerHTML=de_curPrice;
                document.querySelector('.prev_price').innerHTML=de_price;
                document.getElementById('product_color_id').value= de_pro_id;
                document.getElementById('product_pr').value= de_curPrice ;
                document.getElementById('product_price').value= de_curPrice ;
                document.getElementById('product_quantity').value=1 ;
                itemal.forEach(val =>{
                    val.querySelector('.item-image').classList.remove('borderal');
                })
                ite.querySelector('.item-image').classList.add('borderal');
            })
        })
    </script>
</body>
</html>