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