var slider = document.querySelector(".slider");
var itemPerView = 5;
var positionCurrent = 0;
let itemWidth = 0;
var listPFC = [];
console.log("sssssss");
function nextSlide() {
  var items = document.querySelectorAll(".itemal");
  itemWidth = items[0].offsetWidth;
  if (positionCurrent > (itemPerView - items.length) * itemWidth) {
    positionCurrent -= itemWidth;
  } else {
    positionCurrent = 0;
  }
  slider.style.transform = `translateX(${positionCurrent}px)`;
}
function prevSlide() {
  var items = document.querySelectorAll(".itemal");
  itemWidth = items[0].offsetWidth;
  if (items.length > itemPerView) {
    if (positionCurrent === 0) {
      positionCurrent = -1 * (items.length - itemPerView) * itemWidth;
    } else {
      positionCurrent += itemWidth;
    }
  } else {
    positionCurrent = 0;
  }
  slider.style.transform = `translateX(${positionCurrent}px)`;
}
slider.innerHTML = "";
var categories = [];
//chưa có đường dẫn
fetch("http://localhost/Black-Aries-Project/public/ajax/serveData.php", {
  method: "POST",
  headers: { "Content-type": "application/json" },
  body: JSON.stringify("getCategory"),
})
  .then((reponse) => reponse.text())
  .then((data) => {
    try {
      let resu = JSON.parse(data);
      //console.log(data)
      categories = resu.category;
      let product = resu.product;
      if (categories.length > 0) {
        for (let category of categories) {
          let listProduct = [];
          for (let pro of product) {
            if (pro.category_id == category.category_id) {
              listProduct.push(pro);
            }
          }
          slider.innerHTML += `
                    <div class="itemal" style="display:flex;justify-content:center;align-items:center;width:20%;" data-category=${category.category_id}>
                        <div class="rootal" style="width:80%;">
                            <div class="card-category text-center p-3 shadow-sm">
                                <div class="card-body">
                                    <svg width="24px" height="24px" viewBox="0 0 24 24" stroke-width="1.5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 18L4 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M5 10V5C5 3.89543 5.89543 3 7 3L17 3C18.1046 3 19 3.89543 19 5V10" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M19.5 10C18.1193 10 17 11.1193 17 12.5V14H7V12.5C7 11.1193 5.88071 10 4.5 10C3.11929 10 2 11.1193 2 12.5C2 13.7095 2.85888 14.7184 4 14.95V18H20V14.95C21.1411 14.7184 22 13.7095 22 12.5C22 11.1193 20.8807 10 19.5 10Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M20 18L20 21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                    <h5 class="mt-3">${category.category_name}</h5>
                                    <p class="text-muted">${listProduct.length} Item Available</p>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
        }
        //Chọn lạo sản phẩm đầu tiên làm mặc định
        let de_ca = document.querySelector(".itemal");
        de_ca
          .querySelector(".rootal")
          .querySelector(".card-category")
          .classList.add("back_color");
        displayProductFcategory(de_ca.dataset.category);
        //
        var items = document.querySelectorAll(".itemal");
        items.forEach((item) => {
          item.addEventListener("click", function () {
            items.forEach((it) => {
              let itRoot = it
                .querySelector(".rootal")
                .querySelector(".card-category");
              itRoot.classList.remove("back_color");
            });
            let cate_id = item.dataset.category;
            let itemRoot = item
              .querySelector(".rootal")
              .querySelector(".card-category");
            itemRoot.classList.add("back_color");
            displayProductFcategory(cate_id);
          });
        });
      } else {
        slider.innerHTML += "<h2>Don't have category</h2>";
      }
    } catch {
      console.error("Error oarsing Json", error);
    }
  });
function displayProductFcategory(type) {
  findProductFcategory(type, (listPFC) => {
    let res = listPFC;
    let productF = res.products;
    let pro_color = res.product_colors;
    let proFcate = document.getElementById("product_category");
    proFcate.innerHTML = "";
    let numf = 1;
    if (productF.length > 0) {
      for (let pro of productF) {
        let cu_productColor = null;
        for (let o_lcor of pro_color) {
          if (o_lcor.product_id == pro.product_id && o_lcor.defaultal) {
            cu_productColor = o_lcor;
            break;
          }
        }
        if(cu_productColor){
          let url = "http://localhost/Black-Aries-Project/public/images/products/"+cu_productColor.image;
          proFcate.innerHTML += `
                      <div class="col-md-3">
                          <div class="card-product text-center p-3 shadow-sm">
                              <div class="card-imagel">
                                 <img src="${url}" class="card-img-top" alt="product">
                              </div>
                              <div class="card-body">
                                  <a href="http://localhost/Black-Aries-Project/productController/detail/${pro.product_id}">
                                      <h5 class="card-title">${pro.product_name}</h5>
                                  </a>
                                  <p class="card-text">$${cu_productColor.price}</p>
                                  <div class="btn btn-primary addCart" data-cart="${cu_productColor.product_color_id}" data-product="${cu_productColor.product_id}">Add to cart</div>
                              </div>
                          </div>
                      </div>
                  `;
          if (numf == 4) {
            break;
          }
          numf++;
        }
      }
      addToCart();
    } else {
      proFcate.innerHTML = "<h2>Don't have product</h2>";
    }
  });
}
function findProductFcategory(type, callback) {
  let prod = [];
  return fetch(
    "http://localhost/Black-Aries-Project/public/ajax/serveData.php",
    {
      method: "POST",
      headers: { "Content-type": "application/json" },
      body: JSON.stringify(`getProductFcategory-${type}`),
    }
  )
    .then((response) => response.text())
    .then((data) => {
      try {
        prod = JSON.parse(data);
        listPFC = prod;
        if (callback) callback(listPFC);
      } catch {
        console.error("Error oarsing Json", error);
      }
    });
}
function addToCart(){
  var cart= document.querySelectorAll('.addCart');
  cart.forEach(ob => {
    ob.addEventListener('click',function(){
        let product_co = ob.dataset.cart;
        let de_product=ob.dataset.product
        fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
          method: "POST",
          body: JSON.stringify({action:"getCarts"}),
        })
        .then((reponse)=>reponse.text())
        .then((data)=>{
          data= JSON.parse(data);
          if(data=="userId"){
            alert("You neet to sign up to add product to your cart");
          }else if(data){
            if(data.cart&&data.cart!=[]){
              if(data.product&&data.product_color&&data.color){
                  let mcarrt=null;
                  for(let va of data.cart){
                    if (va.product_color_id==product_co){
                        mcarrt=va;
                        break;
                    }
                  }
                  let mp_c=null;
                  let fakecarrt=null;
                  if(mcarrt){
                    for(let va of data.product_color){
                      if (va.product_color_id==product_co){
                        mp_c=va;
                        break;
                      }
                    }
                  }else{
                    //tìm kiếm thẻ mà có product_id giống nó de_product
                    for(let va of data.cart){
                      let f_pcc=null;
                      for(let vslu of data.product_color){
                        if(vslu.product_color_id==va.product_color_id){
                          f_pcc=vslu.product_id;
                          console.log("sss"+f_pcc)
                          break;
                        }
                      }
                      if(f_pcc){
                        if(f_pcc==de_product){
                          fakecarrt=va;
                          break;
                        }
                      }
                    }
                  }
                  let mp=null;
                  if(mp_c){
                    for(let va of data.product){
                      if (va.product_id==mp_c.product_id){
                        mp=va;
                        break;
                      }
                    }
                  }
                  if(fakecarrt){
                    let nuMC= 1;
                      //thay đổi
                      fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
                        method: "POST",
                        body: JSON.stringify({action:"updateCart1",cart_id:fakecarrt.order_id,product_color_id:product_co,quantity:nuMC}),
                      })
                      .then((reponse)=>reponse.text())
                      .then((data)=>{
                        console.log(data);
                        data=JSON.parse(data);
                        if(data=="userId"){
                          alert("You neet to sign up to add product to your cart");
                        }else{
                          if(data){
                            //Sau khi thêm thành công
                          }else{
                            alert("fail")
                          }
                        }
                      })
                  }else if(mp_c&&mcarrt){
                    console.log(mcarrt.quantity+"ffff"+mp_c.quantity)
                    if(parseInt(mcarrt.quantity)<parseInt(mp_c.quantity)){
                      let nuMC= parseInt( mcarrt.quantity)+1;
                      //thay đổi
                      fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
                        method: "POST",
                        body: JSON.stringify({action:"updateCart",product_color_id:product_co,quantity:nuMC}),
                      })
                      .then((reponse)=>reponse.text())
                      .then((data)=>{
                        console.log(data);
                        data=JSON.parse(data);
                        if(data=="userId"){
                          alert("You neet to sign up to add product to your cart");
                        }else{
                          if(data){
                            //Sau khi thêm thành công
                          }else{
                            alert("fail")
                          }
                        }
                      })
                    }else{
                      alert("Product had in your cart and this quantity is over rule")
                    }//if
                  }else{
                    //thêm một froduct vào vcarrt
                    fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
                      method: "POST",
                      body: JSON.stringify({action:"addCart",product_color_id:product_co}),
                    })
                    .then((reponse)=>reponse.text())
                    .then((data)=>{
                      console.log(data);
                      data=JSON.parse(data);
                      if(data=="userId"){
                        alert("You neet to sign up to add product to your cart");
                      }else{
                        if(data){
                          //Sau khi thêm thành công
                        }else{
                          alert("fail")
                        }
                      }
                    })
                    //
                  }
              }else{
                alert("error");
              }
            }else{
              if(data.product&&data.product_color&&data.color){
                console.log("sssssssssss111")
                fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
                  method: "POST",
                  body: JSON.stringify({action:"addCart",product_color_id:product_co}),
                })
                .then((reponse)=>reponse.text())
                .then((data)=>{
                  console.log(data);
                  data=JSON.parse(data);
                  if(data=="userId"){
                    alert("You neet to sign up to add product to your cart");
                  }else{
                    if(data){
                      //Sau khi thêm thành công
                    }else{
                      alert("fail")
                    }
                  }
                })
              }else{
                alert("error j");
              }
            }
          }else{
            alert("error k");
          }
        })//then data
    })//event
  })//for
}
