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
function detailView(id){
    console.log("idddd"+id);
    (async ()=>{
        console.log("sssssssssss")
        document.querySelector('.form-detail').style.display="block";
        document.querySelector('.wall').style.display="block";
        let users = await getAllOneTable("getUsers");
        console.log(users);
        if(users){
            let user = null;
            for(let value of users){
                if(value.user_id == id){
                    user = value;
                }
            }
            if(user){
                let birth = null;;
                if(user.day_of_birth){
                    birth = user.day_of_birth;
                }else{
                    birth="1999-09-09"
                }
                
                document.getElementById('f-image').src = `http://localhost/Black-Aries-Project/public/images/avatars/${user.avatar}`;
                console.log(document.getElementById('f-image').src);
                document.getElementById('f-user_id').innerHTML = user.user_id;
                document.getElementById('f-user_name').innerHTML = user.username;
                document.getElementById('f-email').innerHTML = user.email;
                document.getElementById('f-fullname').value = user.fullname;
                document.getElementById('f-birth').value = birth;
                document.getElementById('f-phone').value = user.phone;
                document.getElementById('f-address').value = user.address;
                let waitingOrders=[];
                let shippingOrders=[];
                let shippedOrders=[];
                let orders = await getAllOneTable("getOrders");
                console.log(orders);
                if(orders){
                    for(let value of orders){
                        if(user.user_id==value.user_id && value.status == 2){
                            waitingOrders.push(value);
                        }else if(user.user_id==value.user_id&&value.status == 4){
                            shippingOrders.push(value);
                        }else if(user.user_id==value.user_id&&value.status == 5){
                            shippedOrders.push(value);
                        }
                    }
                    document.getElementById('order-wait').innerHTML = waitingOrders.length;
                    document.getElementById('order-shipping').innerHTML = shippingOrders.length;
                    document.getElementById('order-shipped').innerHTML = shippedOrders.length;
                }
            }
        }
        let buttonCancel = document.querySelector('.button-cancel');
        buttonCancel.addEventListener('click', function(){
            document.querySelector('.form-detail').style.display = "none";
            document.querySelector('.wall').style.display = "none";
        })
        let wall = document.querySelector('.wall');
        wall.addEventListener('click',function(){
            document.querySelector('.form-detail').style.display = "none";
            document.querySelector('.wall').style.display = "none";
        })
    })()
}
// Phần điều phân trang
let listRow= document.querySelectorAll('.row-object');
var numPage= 0;
if(listRow.length%10 == 0){
    numPage = Math.floor(listRow.length/10) ;
}else{
    numPage = Math.floor(listRow.length/10 + 1) ;
}
var current_page =1;
console.log(current_page);
displayPagination();
function displayPagination(){
    var sesPage=document.getElementById('pagination');
    sesPage.innerHTML="";
    if(numPage>0){
        let numPagePres=1;
        let numPageNext=1;
        if(current_page==1 && numPage == 1){
            numPagePres=1;
            numPageNext=1;
        }else if(current_page==1){
            numPagePres=1;
            numPageNext=current_page+1;
        }else if(current_page==numPage){
             numPageNext=numPage;
             numPagePres=current_page-1;
        }else{
            numPagePres=current_page-1;
            numPageNext=current_page+1;
        }
        let nodeStart=document.createElement('div');
        nodeStart.dataset.page=1;
        nodeStart.style.width="100px";
        nodeStart.textContent="First page";
        sesPage.appendChild(nodeStart);
        let nodePres=document.createElement('div');
        nodePres.dataset.page=numPagePres;
        nodePres.textContent="<<";
        sesPage.appendChild(nodePres);
        if(numPage<=5){
            for(let i=1; i<=numPage;i++){
                let node=document.createElement('div');
                if(i==current_page){
                    node.className="act";
                }
                node.dataset.page=i;
                node.textContent=`${i}`;
                sesPage.appendChild(node);
            }
        }else{
            if((current_page-2)<1){
                for(let i=1;i<=current_page;i++){
                    let node=document.createElement('div');
                    if(i==current_page){
                        node.className="act";
                    }
                    node.dataset.page=i;
                    node.textContent=`${i}`;
                    sesPage.appendChild(node);
                }
                for(let i=(current_page+1);i<=5;i++){
                    let node=document.createElement('div');
                    if(i==current_page){
                        node.className="act";
                    }
                    node.dataset.page=i;
                    node.textContent=`${i}`;
                    sesPage.appendChild(node);
                }
            }else if(((current_page+2)-numPage)>0){
                let numPagePr=5-(1+(numPage-current_page));
                for(let i=(current_page-numPagePr);i<current_page;i++){
                    let node=document.createElement('div');
                    if(i==current_page){
                        node.className="act";
                    }
                    node.dataset.page=i;
                    node.textContent=`${i}`;
                    sesPage.appendChild(node);
                }
                for(let i=current_page;i<=numPage;i++){
                    let node=document.createElement('div');
                    if(i==current_page){
                        node.className="act";
                    }
                    node.dataset.page=i;
                    node.textContent=`${i}`;
                    sesPage.appendChild(node);
                }
            }else{
                for(let i=(current_page-2);i<=current_page+2;i++){
                    let node=document.createElement('div');
                    if(i==current_page){
                        node.className="act";
                    }
                    node.dataset.page=i;
                    node.textContent=`${i}`;
                    sesPage.appendChild(node);
                }
            }
        }
        let nodeNext=document.createElement('div');
        nodeNext.dataset.page=numPageNext;
        nodeNext.className="border-right"
        nodeNext.textContent=">>";
        sesPage.appendChild(nodeNext);
    }
    // Sự kiện khi nhấn vào phân trang
    pageCurrent(current_page);
    var boxPagination =document.getElementById('pagination');
    var butPaginations=boxPagination.querySelectorAll('div');
    butPaginations.forEach(buttonPage=>{
        buttonPage.addEventListener('click',function(){
            console.log(current_page);
            console.log(buttonPage.dataset.page);
            current_page=parseInt(buttonPage.dataset.page);
            pageCurrent(current_page);
            comfirmPageButton(current_page);
            displayPagination();
        })
    })
    // function hiện các card có page là current_page
    function pageCurrent(numeber_page){
        var object= document.querySelectorAll('.row-object');
        object.forEach( value => {
            console.log("000000000000")
            console.log(value.dataset.page)
            if(value.dataset.page != numeber_page){
                value.style.display = "none";
                console.log("111111111111111")
            }else{
                value.style.display = "table-row";
                console.log("22222222222222")
            }
        })
    }
    //Function hiện màu cho nút nào là nút hiện tại
    function comfirmPageButton(numeber_page){
        let box_pagination = document.getElementById('pagination');
        let button_pagination = box_pagination.querySelectorAll('div');
        button_pagination.forEach(button => {
            if(button.dataset.page == numeber_page){
                button.classList.add('act');
            }else{
                button.classList.remove('act');
            }
        })
    }
}