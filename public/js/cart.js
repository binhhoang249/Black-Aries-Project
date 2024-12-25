var tableCart = document.getElementById('tb-cart');
var boxCart = document.getElementById('box-cart');
fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
    method: "POST",
    body: JSON.stringify({action:"getCarts"}),
})
.then((reponse)=>reponse.text())
.then((data)=>{
    console.log(data);
    data= JSON.parse(data);
    if(data=="userId"){
        boxCart.innerHTML = "<div> You don't sign up  </div>";
        tableCart.style.display="none";
    }else{
        if(!data||!data.cart){
            boxCart.innerHTML = "<div> You don't product in your cart  </div>";
        }else{
            //có các mặt hành trong giỏ hàng(older)
            if(!data.cart||!cart.product||!data.product_color||!data.product_color){
                boxCart.innerHTML = "<div> Error  </div>";
                tableCart.style.display="none";
            }else{
                boxCart.innerHTML ="";
                // in ra các thẻ cart
                for(let cart of data.cart){
                    let product_color_cart=null;
                    for(let value of data.product_color){
                        if(value.product_color_id==cart.product_color_id){
                            product_color_cart=value;
                            break;
                        }
                    }
                    //Tìm product
                    let product_cart = null;
                    for(let value of data.product){
                        if(value.product_id==product_color_cart.product_id){
                            product_cart=value;
                            break;
                        }
                    }
                    let ol_price=parseFloat(product_color_cart.price);
                    let ne_price=parseFloat(product_color_cart.price-ol_price*product_cart.discount/100);
                    if(product_color_cart){
                        boxCart.innerHTML =
                            `
                                <div class="field-product flex-rr">
                                    <div class="c_option flex-rr">
                                        <input type="checkbox" name="c_op" class="check_cart" value="${cart.older_id}">
                                    </div>
                                    <div class="p-product flex-rr" >
                                        <a href="">
                                            <div class="tag-image">
                                                <img src="${product_color_cart.image}" alt="product">
                                            </div>
                                        </a>
                                        <div class="tag-info flex-rr">
                                            <a href="">
                                                <span  class="product_namer">${product_cart.name}</span>
                                            </a>
                                            <span >
                                                Màu: 
                                                <select name="id_proco" class="product_clolor pcal${cart.older_id}"  data-cart="${cart.older_id}">
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="p-price">
                                        <div class="tag-price flex-rr">
                                            <span class="old-price old-price${cart.older_id}">${ol_price}</span>
                                            <span class="new-price new-price${cart.older_id}">${ne_price}</span>
                                        </div>
                                    </div>
                                    <div class="p-quantity">
                                        <div class="tag-quntity">
                                            <span class="flex-rr" class="rm"  data-cart="${cart.older_id}">-</span>
                                            <input type="number" value="1" class="quantity${cart.older_id}">
                                            <span class="flex-rr" class="ad"  data-cart="${cart.older_id}">+</span>
                                        </div>
                                    </div>
                                    <div class="p-total_price">
                                        <span class="total-price total-price${cart.older_id}">${ne_price}</span>
                                    </div>
                                    <div class="p-action">
                                        <button class="tag-delete" onclick="">
                                            <b>Delete</b>
                                        </button>
                                    </div>
                                </div>
                            `
                            let nameclass="."+"pcal"+cart.older_id;
                            let ccolor= document.querySelector(nameclass);
                            let PcolorFP=[];
                            for(let value of product_color_cart){
                                if(value.product_id==product_cart.product_id){
                                    PcolorFP.push(value);
                                }
                            }
                            ccolor.innerHTML="";
                            for(let value of PcolorFP){
                                let col_res=null;
                                for (let coloral of data.color){
                                    if(value.color_id==coloral.color_id){
                                        col_res=coloral;
                                        break;
                                    }
                                }
                                if(col_res){
                                    ccolor.innerHTML +=
                                    `
                                        <option class="product_clolor" value="${value.product_color_id}">${col_res.color_name}</option>
                                    `
                                }
                            }
                    }else{
                        boxCart.innerHTML ="<div> You don't sign up  </div>";
                    }
                    
                }
            }
        }
    }
})