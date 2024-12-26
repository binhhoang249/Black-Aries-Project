var tableCart = document.getElementById('tb-cart');
var boxCart = document.getElementById('box-cart');
showCartCard();
function showCartCard(){
    fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
        method: "POST",
        body: JSON.stringify({action:"getCarts"}),
    })
    .then((reponse)=>reponse.text())
    .then((data)=>{
        //console.log(data);
        data= JSON.parse(data);
        if(data=="userId"){
            boxCart.innerHTML = "<div> You don't sign up  </div>";
            tableCart.style.display="none";
        }else{
            if(!data||data.cart==[]){
                boxCart.innerHTML = "<div> You don't product in your cart  </div>";
            }else{
                document.getElementById('cp-2').value=data.cart.length;
                //có các mặt hành trong giỏ hàng(older)
                if(data.product==[]||data.product_color==[]||data.product_color==[]){
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
                        let to_product= ne_price*parseInt(cart.quantity);
                        if(product_color_cart){
                            boxCart.innerHTML +=
                                `
                                    <div class="field-product flex-rr">
                                        <div class="c_option flex-rr">
                                            <input type="checkbox" name="c_op" class="check_cart" value="${cart.older_id}">
                                        </div>
                                        <div class="p-product flex-rr" >
                                            <a href="">
                                                <div class="tag-image">
                                                    <img src="http://localhost/Black-Aries-Project/public/images/products/${product_color_cart.image}" alt="product">
                                                </div>
                                            </a>
                                            <div class="tag-info flex-rr">
                                                <a href="">
                                                    <span  class="product_namer">${product_cart.product_name}</span>
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
                                                <span class="old-price old-price${cart.older_id}">${ne_price}</span>
                                                <span class="new-price new-price${cart.older_id}">${ol_price}</span>
                                            </div>
                                        </div>
                                        <div class="p-quantity">
                                            <div class="tag-quntity">
                                                <span class="flex-rr rm" data-cart="${cart.older_id}">-</span>
                                                <input type="number" value="${cart.quantity}" class="quantity${cart.older_id}" readonly >
                                                <span class="flex-rr ad"  data-cart="${cart.older_id}">+</span>
                                            </div>
                                        </div>
                                        <div class="p-total_price">
                                            <input type="number" class="res_total${cart.older_id}" style="display:none" value="${to_product}"> 
                                            <span class="total-price total-price${cart.older_id}">${to_product}</span>
                                        </div>
                                        <div class="p-action">
                                            <button class="tag-delete" data-cart="${cart.older_id}">
                                                <b>Delete</b>
                                            </button>
                                        </div>
                                    </div>
                                `
                                let nameclass="."+"pcal"+cart.older_id;
                                let ccolor= document.querySelector(nameclass);
                                let PcolorFP=[];
                                for(let value of data.product_color){
                                    if(value.product_id==product_cart.product_id){
                                        PcolorFP.push(value);
                                        console.log(product_cart.product_id)
                                    }
                                }
                                console.log(PcolorFP)
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
                                        if(value.product_color_id==cart.product_color_id){
                                            ccolor.innerHTML +=
                                            `
                                                <option class="product_clolor" value="${value.product_color_id}" selected>${col_res.color_name}</option>
                                            `
                                        }else{
                                            ccolor.innerHTML +=
                                            `
                                                <option class="product_clolor" value="${value.product_color_id}">${col_res.color_name}</option>
                                            `
                                        }
                                    }
                                }
                        }else{
                            boxCart.innerHTML ="<div> You don't sign up  </div>";
                        }
                        
                    }//for
                    let reduceProduct = document.querySelectorAll('.ad');
                    reduceProduct.forEach(reduce => {
                        reduce.addEventListener('click',function(){
                            let valueDefuault= reduce.dataset.cart;
                            let nameRClass= ".quantity"+valueDefuault;
                            fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
                                method: "POST",
                                body: JSON.stringify({action:"getCarts"}),
                            })
                            .then((reponse)=>reponse.text())
                            .then((data)=>{
                                //console.log(data);
                                data=JSON.parse(data);
                                if(!data){
                                    alert('error')
                                }else if(data=="userId"){
                                    alert("You don;t sign up");
                                }else{
                                    if(data.cart==[]){
                                        alert("Your cart don;t hav product")
                                    }else{
                                        if(data.product_color==[]||data.color==[]||data.product==[]){
                                            alert("error");
                                        }else{
                                            let findCart=null;
                                            for(let value_cart of data.cart){
                                                if(value_cart.older_id==valueDefuault){
                                                    findCart=value_cart;
                                                    break;
                                                }
                                            }
                                            let findP_C=null;
                                            if(findCart){
                                                for (let value_p_c of data.product_color){
                                                    if(value_p_c.product_color_id==findCart.product_color_id){
                                                        findP_C=value_p_c;
                                                        break;
                                                    }
                                                }
                                                let findP=null;
                                                for (let value_p of data.product){
                                                    if(value_p.product_id==findP_C.product_id){
                                                        findP=value_p;
                                                        break;
                                                    }
                                                }
                                                console.log(findP)
                                                if(findP_C){
                                                    console.log("ssssssssss")
                                                    if(findCart.quantity<findP_C.quantity){
                                                        let changeQuantity= document.querySelector(nameRClass);
                                                        let numaf =parseInt(changeQuantity.value)+1;
                                                        changeQuantity.value=numaf;
                                                        fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
                                                        method: "POST",
                                                        body: JSON.stringify({action:"updateCart",product_color_id:findP_C.product_color_id,quantity:numaf}),
                                                        })
                                                        .then((reponse)=>reponse.text())
                                                        .then((data1)=>{
                                                            //console.log(data1);
                                                            data1=JSON.parse(data1);
                                                            if(!data){
                                                                alert('error');
                                                            }else if(data=="userId"){
                                                                alert("You don't sign up")
                                                            }else{
                                                                showCartCard();
                                                            }
                                                        })
                                                    }else{
                                                        alert("Product had in your cart and this quantity is over rule")
                                                    }
                                                }
                                            }else{
                                                alert("error! Don't find Product")
                                            }
                                            
                                        }
                                    }
                                }
                            })
                        })
                    })
                    //
                    let increateProduct = document.querySelectorAll('.rm');
                    increateProduct.forEach(reduce => {
                        reduce.addEventListener('click',function(){
                            let valueDefuault= reduce.dataset.cart;
                            let nameRClass= ".quantity"+valueDefuault;
                            let olpriceClass=".old-price"+valueDefuault;
                            let nepriceClass=".new-price"+valueDefuault;
                            let toPriceClass=".total-price"+valueDefuault
                            fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
                                method: "POST",
                                body: JSON.stringify({action:"getCarts"}),
                            })
                            .then((reponse)=>reponse.text())
                            .then((data)=>{
                                //console.log(data);
                                data=JSON.parse(data);
                                if(!data){
                                    alert('error')
                                }else if(data=="userId"){
                                    alert("You don;t sign up");
                                }else{
                                    if(data.cart==[]){
                                        alert("Your cart don;t hav product")
                                    }else{
                                        if(data.product_color==[]||data.color==[]||data.product==[]){
                                            alert("error");
                                        }else{
                                            let findCart=null;
                                            for(let value_cart of data.cart){
                                                if(value_cart.older_id==valueDefuault){
                                                    findCart=value_cart;
                                                    break;
                                                }
                                            }
                                            let findP_C=null;
                                            if(findCart){
                                                for (let value_p_c of data.product_color){
                                                    if(value_p_c.product_color_id==findCart.product_color_id){
                                                        findP_C=value_p_c;
                                                        break;
                                                    }
                                                }
                                                let findP=null;
                                                for (let value_p of data.product){
                                                    if(value_p.product_id==findP_C.product_id){
                                                        findP=value_p;
                                                        break;
                                                    }
                                                }
                                                console.log(findP)
                                                if(findP_C){
                                                    console.log("ssssssssss")
                                                    if(findCart.quantity>1){
                                                        let changeQuantity= document.querySelector(nameRClass);
                                                        let numaf =parseInt(changeQuantity.value)-1;
                                                        changeQuantity.value=numaf;
                                                        fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
                                                        method: "POST",
                                                        body: JSON.stringify({action:"updateCart",product_color_id:findP_C.product_color_id,quantity:numaf}),
                                                        })
                                                        .then((reponse)=>reponse.text())
                                                        .then((data1)=>{
                                                            console.log(data1);
                                                            data1=JSON.parse(data1);
                                                            if(!data){
                                                                alert('error');
                                                            }else if(data=="userId"){
                                                                alert("You don't sign up")
                                                            }else{
                                                                showCartCard();
                                                            }
                                                        })
                                                    }else{
                                                        alert("Product had in your cart and this quantity is over rule 1")
                                                    }
                                                }
                                            }else{
                                                alert("error! Don't find Product")
                                            }
                                            
                                        }
                                    }
                                }
                            })
                        })
                    })
                    //Hàm xóa 
                    let dele = document.querySelectorAll('.tag-delete');
                    dele.forEach(mar => {
                        mar.addEventListener('click',function(){
                            let valueDefuault= mar.dataset.cart;
                            fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
                                method: "POST",
                                body: JSON.stringify({action:"deleteCart",cart_id:valueDefuault}),
                            })
                            .then((reponse)=>reponse.text())
                            .then((data1)=>{
                                //console.log(data1);
                                data1=JSON.parse(data1);
                                if(!data){
                                    alert('error');
                                }else if(data=="userId"){
                                    alert("You don't sign up")
                                }else{
                                    showCartCard();
                                }
                            })
                        })
                    })
                    //Thay đổi màu cho sản phẩm
                    let changeColor = document.querySelectorAll('.product_clolor');
                    changeColor.forEach(chan => {
                        chan.addEventListener('change',function(){
                            let newColor = chan.value;
                            let df_cart_id=chan.dataset.cart;
                            fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
                                method: "POST",
                                body: JSON.stringify({action:"updateCart1",cart_id:df_cart_id,product_color_id:newColor}),
                                })
                                .then((reponse)=>reponse.text())
                                .then((data1)=>{
                                    console.log(data1);
                                    data1=JSON.parse(data1);
                                    if(!data){
                                        alert('error');
                                    }else if(data=="userId"){
                                        alert("You don't sign up")
                                    }else{
                                        showCartCard();
                                    }
                                })
                        })
                    })
                    // Khi nhấn tick fuction
                    checkTick ()
                    function checkTick (){
                        var tick=document.querySelectorAll('.check_cart');
                    tick.forEach(to=>{
                        to.addEventListener('change',function(){
                            var res_totalal=0;
                            var listCheck="";
                            var numcheck=[];
                            tick.forEach(ti => {
                                let siClass=".res_total"+ti.value;
                                let classsis=document.querySelector(siClass);
                                if(ti.checked){
                                    if(listCheck.length>0){
                                        res_totalal+=parseFloat(classsis.value)
                                        listCheck+=","+ti.value
                                    }else{
                                        listCheck+=ti.value
                                        res_totalal+=parseFloat(classsis.value)
                                    }
                                    numcheck.push(ti.value)
                                }
                            })
                            document.getElementById('cp-1').value=numcheck.length;
                            document.getElementById('post_cart').value=listCheck;
                            document.getElementById('cps-price').value=res_totalal;
                            
                            //gắn cái này vào forrm
                        })
                    })
                    }
                    //function kiểm tra giá trị
                    function checkvaliddata(){
                        let ck=document.forms["myForm"]["valueCart"].value;
                        if(ck){
                            return false
                        }
                    }
                }//If để thêm card

            }
        }
    })
}