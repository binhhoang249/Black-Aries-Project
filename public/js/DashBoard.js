async function getAllOneTable(actional){
    try {
        let response = await fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ action: actional }),
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        let data = await response.json();
        return data;
    } catch (error) {
        console.error("Error fetching data:", error);
        return null; 
    }
}
async function updateAllOneTable(body){
    try {
        let response = await fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php', {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(body),
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        let data = await response.json();
        return data;
    } catch (error) {
        console.error("Error fetching data:", error);
        return null; 
    }
}
const textarea = document.getElementById("myTextarea");
textarea.addEventListener("change", function () {
    textarea.style.height = "auto"; // Reset chiều cao trước khi tính toán
    textarea.style.height = textarea.scrollHeight + "px"; // Điều chỉnh chiều cao theo nội dung
});
textarea.style.height = textarea.scrollHeight + "px";

//
showInterfaceColor();
showInterfaceCategory();
var viewColor = document.getElementById('button-editColor');
var viewDetail = document.querySelector('.box-content');
var boxDetail= document.querySelector('.box_containerCard');
viewColor.addEventListener('click',function(){
    if(viewDetail.style.display == "none"){
        viewDetail.style.display = "block";
        document.querySelector('.title').querySelector('span').innerHTML = "COLOR";
        document.querySelector('.button-add').dataset.type=1;
        boxDetail.innerHTML="";
        colorDetailView()
    }else{
        viewDetail.style.display = "none";
        let colorupbutton = document.querySelectorAll('.up1');
        colorupbutton.forEach( up => {
            up.style.display = "block";
        })
        let colorcancelbutton = document.querySelectorAll('.cancel1');
        colorcancelbutton.forEach( cancel => {
            cancel.style.display = "none";
        })
        let colorupcolorbutton = document.querySelectorAll('.upColor');
        colorupcolorbutton.forEach(up => {
            up.style.display = "none";
        })
    }
    
})
var viewCategory = document.getElementById('button-editCategories');
viewCategory.addEventListener('click',function(){
    if(viewDetail.style.display == "none"){
        viewDetail.style.display = "block";
        document.querySelector('.title').querySelector('span').innerHTML = "Category";
        document.querySelector('.button-add').dataset.type=2;
        boxDetail.innerHTML="";
        categoryDetailView();
    }else{
        viewDetail.style.display = "none";
        let up2button = document.querySelectorAll('.up2');
        up2button.forEach( up => {
            up.style.display = "block";
        })
        let cancelCategorybutton = document.querySelectorAll('.cancel2');
        cancelCategorybutton.forEach( cancel => {
            cancel.style.display = "none";
        })
        let upcategorybutton = document.querySelectorAll('.upCategory');
        upcategorybutton.forEach(up => {
            up.style.display = "none";
        })
    }
    
})
function categoryDetailView(){
    (async ()=>{
        let categories = await getAllOneTable("getCategories");
        let products = await getAllOneTable("getProducts");
        boxDetail.innerHTML = "";
        for(let category of categories){
            let listVal = [];
            for(let product of products){
                if(product.category_id==category.category_id){
                    listVal.push(product);
                }
            }
            boxDetail.innerHTML += 
            `
                <form class="box-card">
                    <button type="button" class="button-cancelDetail deleteCategory" data-num="${category.category_id}">X</button>
                    <div class="field">
                        <input type="text" placeholder="Category" value="${category.category_name}" class="categoryName categoryName${category.category_id}" readonly>
                    </div>
                    <p class="field_category"> <span class="num_category">${listVal.length}</span>&nbsp;Available Item</p>
                    <div class="box-button">
                        <button type="button" class="up2 up2${category.category_id}" data-num="${category.category_id}">Update</button>
                        <button type="button" class="cancel2 cancel2${category.category_id}" data-num="${category.category_id}">Cancel</button>
                        <button type="button" class="upCategory upCategory${category.category_id}" data-num="${category.category_id}">Verify</button>
                    </div>
                </form>
            `
        }//for
        //delete
        let buttonDelete = document.querySelectorAll('.deleteCategory');
        buttonDelete.forEach(button => {
            button.addEventListener('click', function(){
                console.log("sssssssss")
                let id = button.dataset.num;
                let list=[];
                for(let value of products){
                    if (value.product_id==id){
                        list.push(value);
                    }
                }
                document.getElementById('boc').style.display = "block";
                document.getElementById('box-content').innerHTML=
                `
                    <div class="box-verify">
                    <p> If delete this category, ${list.length} product will delete with </p>
                    <button type="button" id="button-box2-verify1" style="margin-right:21px;"> no </button>
                    <button type="button" id="button-box2-verify2" data-num="${id}"> yes </button>
                    </div>
                `
                document.getElementById('button-box2-verify1').addEventListener('click',function(){
                    document.getElementById('boc').style.display = "none";
                    document.getElementById('box-content').innerHTML="";
                    categoryDetailView();
                })
                document.getElementById('button-box2-verify2').addEventListener('click',function(){
                    let id1 = document.getElementById('button-box2-verify2').dataset.num;
                    let body = {action : "deleteCategory", category_id : id1};
                    let res = updateAllOneTable(body);
                    if(res){
                        document.getElementById('boc').style.display = "none";
                        document.getElementById('box-content').innerHTML="";
                        categoryDetailView();
                    }
                })
            })
        })
        //uơdate
        let upBut = document.querySelectorAll('.up2');
        upBut.forEach(up => {
            up.addEventListener('click', function(){
                let id = up.dataset.num;
                let class1= ".up2" + id;
                console.log(class1)
                let class2 = ".cancel2" + id;
                let class3 = ".upCategory" + id;
                let class4 = ".categoryName" + id ;
                document.querySelector(class1).style.display = "none";
                document.querySelector(class2).style.display = "flex";
                document.querySelector(class3).style.display = "flex";
                document.querySelector(class4).readOnly = false;
                document.querySelector(class4).required = true;
            })
        })
        let cancelBut = document.querySelectorAll('.cancel2');
        cancelBut.forEach(up => {
            up.addEventListener('click', function(){
                let id = up.dataset.num;
                cancel2(id);
            })
        })
        let upCategoryBut = document.querySelectorAll('.upCategory');
        upCategoryBut.forEach(up => {
            up.addEventListener('click', function(){
                let id = up.dataset.num;
                let classa= ".categoryName" + id;
                let name = document.querySelector(classa).value;
                let body = {action : "updateCategory", category_name : name, category_id : id};
                let res = updateAllOneTable(body);
                console.log(res);
                cancel2(id);
            })
        })
        showInterfaceColor();
        showInterfaceCategory();
    })()
}
function colorDetailView(){
    (async ()=>{
        let colors = await getAllOneTable("getColor");
        boxDetail.innerHTML = "";
        for(let color of colors){
            boxDetail.innerHTML += 
            `
                <form class="box-card">
                    <button type="button" class="button-cancelDetail deleteColor" data-num="${color.color_id}">X</button>
                    <div class="card-color2" style="background-color:${color.color_link} "></div>
                    <div class="field colorFcode colorFcode${color.color_id}">
                        <span>Color Code:</span><input type="color" value="${color.color_link}" class="colorCode colorCode${color.color_id}">
                    </div>
                    <div class="field">
                        <span>Color name: </span><input type="text" value="${color.color_name}" class="colorName colorName${color.color_id}" readonly>
                    </div>
                    <div class="box-button">
                        <button type="button" class="up1 up1${color.color_id}" data-num="${color.color_id}">Update</button>
                        <button type="button" class="cancel1 cancel1${color.color_id}" data-num="${color.color_id}">Cancel</button>
                        <button type="button" class="upColor upColor${color.color_id}" data-num="${color.color_id}">Verify</button>
                    </div>
                </form>
            `
        }//for
        //delete
        let buttonDelete = document.querySelectorAll('.deleteColor');
        buttonDelete.forEach(button => {
            button.addEventListener('click', function(){
                console.log("sssssssss")
                let id = button.dataset.num;
                (async ()=>{
                    let products = await getAllOneTable("getProductColor");
                    let list=[];
                    for(let value of products){
                        if (value.color_id==id){
                            list.push(value);
                        }
                    }
                    document.getElementById('boc').style.display = "block";
                    document.getElementById('box-content').innerHTML=
                    `
                     <div class="box-verify">
                        <p> If delete this color, ${list.length} product will delete with </p>
                        <button type="button" id="button-box-verify1" style="margin-right:21px;"> no </button>
                        <button type="button" id="button-box-verify2" data-num="${id}"> yes </button>
                     </div>
                    `
                    document.getElementById('button-box-verify1').addEventListener('click',function(){
                        document.getElementById('boc').style.display = "none";
                        document.getElementById('box-content').innerHTML="";
                        colorDetailView();
                    })
                    document.getElementById('button-box-verify2').addEventListener('click',function(){
                        let id1 = document.getElementById('button-box-verify2').dataset.num;
                        let body = {action : "deleteColor", color_id : id1};
                        let res = updateAllOneTable(body);
                        if(res){
                            document.getElementById('boc').style.display = "none";
                            document.getElementById('box-content').innerHTML="";
                            colorDetailView();
                        }
                    })
                })()
            })
        })
        //uơdate
        let up1But = document.querySelectorAll('.up1');
        up1But.forEach(up => {
            up.addEventListener('click', function(){
                let id = up.dataset.num;
                let class1= ".up1" + id;
                console.log(class1)
                let class2 = ".cancel1" + id;
                let class3 = ".upColor" + id;
                let class4 = ".colorFcode" + id ;
                let class5 = ".colorName" + id ;
                document.querySelector(class1).style.display = "none";
                document.querySelector(class2).style.display = "flex";
                document.querySelector(class3).style.display = "flex";
                document.querySelector(class4).style.display = "block";
                document.querySelector(class5).readOnly = false;
                document.querySelector(class5).required = true;
            })
        })
        let cancel1But = document.querySelectorAll('.cancel1');
        cancel1But.forEach(up => {
            up.addEventListener('click', function(){
                let id = up.dataset.num;
                cancel1(id);
            })
        })
        let upColorBut = document.querySelectorAll('.upColor');
        upColorBut.forEach(up => {
            up.addEventListener('click', function(){
                let id = up.dataset.num;
                let classa= ".colorName" + id;
                let classb = ".colorCode" + id;
                let name = document.querySelector(classa).value;
                let code = document.querySelector(classb).value;
                console.log(code)
                let body = {action : "updateColor", color_name : name, color_link : code, color_id : id};
                let res = updateAllOneTable(body);
                console.log(res);
                cancel1(id);
            })
        })
        showInterfaceColor();
        showInterfaceCategory();
    })()
}
let cancelForm = document.querySelector('.button-cancel');
cancelForm.addEventListener('click', function(){
    viewDetail.style.display = "none";
    let colorupbutton = document.querySelectorAll('.up1');
    colorupbutton.forEach( up => {
        up.style.display = "block";
    })
    let colorcancelbutton = document.querySelectorAll('.cancel1');
    colorcancelbutton.forEach( cancel => {
        cancel.style.display = "none";
    })
    let colorupcolorbutton = document.querySelectorAll('.upColor');
    colorupcolorbutton.forEach(up => {
        up.style.display = "none";
    })
})

//
document.getElementById('box-addForm').innerHTML=
        `
        <form class="form-add">
            <h2>Add color</h2>
            <div class="field">
                <span>Color Code:</span><input type="color" class="a-colorCode">
            </div>
            <div class="field">
                <span>Color name: </span><input type="text" placeholder="Enter color's name" value="" required class="a-colorName">
            </div>
            <div class="box-button">
                <button type="button" class="addColor">Verify</button>
            </div>
        </form>
        <form class="form-add-category">
            <h2>Add category</h2>
            <div class="field">
                <span>Category name: </span><input type="text" placeholder="Enter color's name" value="" required class="a-categoryName">
            </div>
            <div class="box-button">
                <button type="button" class="addCategory">Verify</button>
            </div>
        </form>
        `

//add color
let addButton = document.querySelector('.button-add');
addButton.addEventListener('click',function(){
    let optionAdd = addButton.dataset.type;
    if(optionAdd == 1){
        let formAdd=document.querySelector('.form-add');
        if(formAdd.style.display == "none"){
            formAdd.style.display = "block";
            console.log("ppp")
        }else{
            console.log("sss")
            formAdd.style.display = "none";
        }
    }else if(optionAdd == 2){
        let formAdd=document.querySelector('.form-add-category');
        if(formAdd.style.display == "none"){
            formAdd.style.display = "block";
            console.log("ppp")
        }else{
            console.log("sss")
            formAdd.style.display = "none";
        }
    }
})
let verifyAdd = document.querySelector('.addColor');
verifyAdd.addEventListener('click', function(){
    let nameColor = document.querySelector('.a-colorName').value;
    let codeColor = document.querySelector('.a-colorCode').value;
    if(!nameColor){
        alert("Please enter color's name");
    }else{
        let body = {action : "addColor", color_name : nameColor, color_link : codeColor};
        (async ()=>{
            let res = await updateAllOneTable(body);
            console.log(res);
            if(res){
                document.querySelector('.a-colorName').value = "";
                colorDetailView();
                document.querySelector('.form-add').style.display = "none"
            }
        })()
    }
})
let verifyAdd2 = document.querySelector('.addCategory');
verifyAdd2.addEventListener('click', function(){
    let nameCategory = document.querySelector('.a-categoryName').value;
    if(!nameCategory){
        alert("Please enter category's name");
    }else{
        let body = {action : "addCategory", category_name : nameCategory};
        (async ()=>{
            let res = await updateAllOneTable(body);
            console.log(res);
            if(res){
                document.querySelector('.a-categoryName').value = "";
                categoryDetailView();
                document.querySelector('.form-add-category').style.display = "none"
            }
        })()
    }
})
function cancel1(id){
    let class1= ".up1" + id;
    let class2 = ".cancel1" + id;
    let class3 = ".upColor" + id;
    let class4 = ".colorFcode" + id ;
    let class5 = ".colorName" + id ;
    document.querySelector(class1).style.display = "flex";
    document.querySelector(class2).style.display = "none";
    document.querySelector(class3).style.display = "none";
    document.querySelector(class4).style.display = "none";
    document.querySelector(class5).readOnly = true;
    document.querySelector(class5).required = false;
    colorDetailView();
}
function cancel2(id){
    let class1= ".up2" + id;
    let class2 = ".cancel2" + id;
    let class3 = ".upCategory" + id;
    let class4 = ".categoryName" + id ;
    document.querySelector(class1).style.display = "flex";
    document.querySelector(class2).style.display = "none";
    document.querySelector(class3).style.display = "none";
    document.querySelector(class4).readOnly = true;
    document.querySelector(class4).required = false;
    categoryDetailView();
}
function showInterfaceColor(){
    (async ()=>{
        let colors = await getAllOneTable("getColor");
        let boxColor = document.querySelector('.container-color');
        boxColor.innerHTML = "";
        let n = 1;
        for(let value of colors){
            boxColor.innerHTML +=
            `
                <div class="card">
                    <div class="card-color" style="background-color:${value.color_link}"></div>
                    <p class="card-name">${value.color_name}</p>
                </div>
            ` 
            if(n == 5){
                break;
            }
            n += 1;
        }
    })()
}
function showInterfaceCategory(){
    (async ()=>{
        let categories = await getAllOneTable("getCategories");
        let products = await getAllOneTable("getProducts");
        let boxCategory = document.querySelector('.container-category');
        boxCategory.innerHTML = "";
        let n = 1;
        for(let value of categories){
            let listVal = [];
            for(let product of products){
                if(product.category_id == value.category_id){
                    listVal.push(product);
                }
            }
            boxCategory.innerHTML +=
            `
                <div class="card">
                    <h3>${value.category_name}</h3>
                    <p> ${listVal.length} Available Item</p>
                </div>
            ` 
            if(n == 5){
                break;
            }
            n += 1;
        }
    })()
}