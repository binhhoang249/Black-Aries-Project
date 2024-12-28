displayInfo();
var boxAvatar = document.querySelector('.update_avatar');
document.querySelector('.edit-avatar-btn').addEventListener('click', () => {
        if(boxAvatar.style.display== "flex"){
            boxAvatar.style.display= "none";
        }else{
            boxAvatar.style.display= "flex";
        }
    });
document.getElementById('ve_avartar').addEventListener('click', () =>{
    boxAvatar.style.display= "none";
    let image = document.getElementById('avataruser').files[0];
    console.log(image);
    if(!image){
        alert("Don't update image");
        return;
    }
    const formData = new FormData();
    formData.append('avatarUser',image);
    fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
        method: "POST",
        body: formData,
    })
    .then((reponse)=>reponse.text())
    .then((data)=>{
        try{
            console.log(data);
            let result= JSON.parse(data);
            if(!result){
                alert("Don't update image");
            }else{
                //hàm hiện thong tin user
                displayInfo();
            }
        }catch (error){
            console.error("Error oarsing Json", error);
        }
    })
})
var updateInform = document.querySelector('.up-btn');
updateInform.addEventListener('click',function(){
    let checkUp = updateInform.dataset.check;
    console.log(checkUp);
    if(checkUp==1){
        let tagS=updateInform.querySelector('span');
        tagS.innerHTML="Save";
        updateInform.style.backgroundColor ="red";
        updateInform.dataset.check =2;
        updateInform.querySelector('img').style.display="none";
        document.getElementById('fullname').readOnly = false;
        console.log(document.getElementById('fullname').readOnly)
        document.getElementById('fullname').required = true;
    }else if(checkUp==2){
        let fName= document.getElementById('fullname').value;
        let tagS=updateInform.querySelector('span');
        tagS.innerHTML="Update";
        updateInform.style.backgroundColor ="#527A9A";
        updateInform.dataset.check =1;
        updateInform.querySelector('img').style.display="block";
        document.getElementById('fullname').required = false;
        document.getElementById('fullname').readOnly = true;
        fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
            method:'POST',
            body: JSON.stringify({action:"updateInformUser",fullname:fName}),
        })
        .then(reponse=>reponse.text())
        .then(data=>{
            try{
                console.log(data);
                let result= JSON.parse(data);
                if(!result){
                    alert("Don't update your information");
                }else{
                    //hàm hiện thong tin user
                    displayInfo();
                }
            }catch (error) {
                console.error("Error oarsing Json", error);
            }
        })
    }
})
//Thay đổi mật khẩu
var chPass = document.querySelector('.change-btn');
chPass.addEventListener('click',()=>{
    document.querySelector('.h1').style.display="none";
    document.querySelector('.form1').style.display="none";
    document.querySelector('.h2').style.display="block";
    document.querySelector('.form2').style.display="block";
    document.getElementById('Opassword').readOnly = false;
    document.getElementById('Opassword').required = true;
    document.getElementById('Npassword').readOnly = false;
    document.getElementById('Npassword').required = true;
    document.getElementById('Cpassword').readOnly = false;
    document.getElementById('Cpassword').required = true;
    document.getElementById('Opassword').value="";
    document.getElementById('Npassword').value="";
    document.getElementById('Cpassword').value="";
})
var canPass = document.querySelector('.caPass-btn');
canPass.addEventListener('click',()=>{
    document.querySelector('.h1').style.display="block";
    document.querySelector('.form1').style.display="block";
    document.querySelector('.h2').style.display="none";
    document.querySelector('.form2').style.display="none";
    document.getElementById('Opassword').required =false;
    document.getElementById('Opassword').readOnly =true;
    document.getElementById('Npassword').required =false;
    document.getElementById('Npassword').readOnly =true;
    document.getElementById('Cpassword').required =false;
    document.getElementById('Cpassword').readOnly =true;
})
var comfPas = document.querySelector('.updatePass-btn');
comfPas.addEventListener('click',()=>{
    let oPass=document.getElementById('Opassword');
    let nPass=document.getElementById('Npassword');
    let cPass=document.getElementById('Cpassword');
    fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
        method:'POST',
        body: JSON.stringify({action:"getUser"}),
    })
    .then(reponse=>reponse.text())
    .then(data=>{
        try{
            console.log(data);
            let result= JSON.parse(data);
            if(!result){
                alert("Don't update password");
            }else{
                // xác nhận mật khẩu đúng ko
                fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
                    method:'POST',
                    body: JSON.stringify({action:"checkPassword",hash:result.password,op:oPass.value}),
                })
                .then(reponse=>reponse.text())
                .then(data=>{
                    try{
                        console.log(data);
                        let result= JSON.parse(data);
                        if(!result){
                            alert("Password is incorrect");
                        }else{
                            console.log(nPass.value.length)
                            if(nPass.value.length>5){
                                if(nPass.value==cPass.value){
                                    fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
                                        method:'POST',
                                        body: JSON.stringify({action:"updateInformUser",password:nPass.value}),
                                    })
                                    .then(reponse=>reponse.text())
                                    .then(data=>{
                                        try{
                                            console.log(data);
                                            let result= JSON.parse(data);
                                            if(!result){
                                                alert("Don't update password");
                                            }else{
                                                document.querySelector('.h1').style.display="block";
                                                document.querySelector('.form1').style.display="block";
                                                document.querySelector('.h2').style.display="none";
                                                document.querySelector('.form2').style.display="none";
                                                document.getElementById('Opassword').required =false;
                                                document.getElementById('Opassword').readOnly =true;
                                                document.getElementById('Npassword').required =false;
                                                document.getElementById('Npassword').readOnly =true;
                                                document.getElementById('Cpassword').required =false;
                                                document.getElementById('Cpassword').readOnly =true;
                                                //hàm hiện thong tin user
                                                displayInfo();
                                            }
                                        }catch (error) {
                                            console.error("Error oarsing Json", error);
                                        }//fetch thay đổi mật khảu
                                    })
                                }else{
                                    alert("Please enter 2 passwords that match each other!");
                                }//if so sánh 2 mật khẩu trùng nhau ko
                            }else{
                                alert("Please enter 2 passwords with length greater than 5!");
                            }//if so sánh 2 mật khẩu lớn hơn 5 hay không
                        }
                    }catch (error) {
                        console.error("Error oarsing Json", error);
                    }//fetch checkPassword
                }) 
            }
        }catch (error) {
            console.error("Error oarsing Json", error);
        }//fetch getUser
    })
})
//Hàm đẩy thông tin từ server
function displayInfo(){
    let usernam =document.getElementById('username');
    let fullnam=document.getElementById('fullname');
    let passwo=document.getElementById('password');
    let emai =document.getElementById('email');
    let imagel =document.getElementById('l-imagel');
    fetch('http://localhost/Black-Aries-Project/public/ajax/serveData.php',{
        method:'POST',
        body: JSON.stringify({action:"getUser"}),
    })
    .then((response)=>response.text())
    .then((data)=>{
        try{
            console.log(data);
            let resk=JSON.parse(data);
            console.log(resk);
            if(!resk){
                alert("Don't update password");
            }else{
                usernam.value=resk.username;
                fullnam.value=resk.fullname;
                passwo.value=resk.password;
                emai.value=resk.email;
                imagel.src="http://localhost/Black-Aries-Project/public/images/avatars/"+resk.avatar;
                console.log(imagel.src)
            }
        }catch (error) {
            console.error("Error parsing JSON:", error);
        }//fetch getUser

    })
}   