<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body>
    <style>
        body,html{
            width:100%;
            height:100%;
            box-sizing:border-box;
            padding:0;
            margin:0;
        }
        .parent-container{
            width: 100%;
            height:100%;
            position:relative;
            background-image:url("http://localhost/Black-Aries-Project/public/images/134258081e1866e2bf8771978953f720.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .image-element{
            position: absolute;
            bottom:20%;
            height:60%;
            left:0%;
            z-index:10px;
        }
        .box-shadown{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.45);  /* Lớp phủ trắng với độ mờ */
            z-index: 100; 
        }
        .form-login{
            width:400px;
            position:absolute;
            right:10%;
            top:40%;
            background:white;
            border-radius:9px;
            padding:9px 10px;
            z-index: 500;
            transform:translateY( -50%);
            background: rgba(62, 62, 62, 0.6);
        }
        .form-login h1{
            text-align:center;
            color:black;
        }
        .field{
            display:flex;
            width: 100%;
            margin-bottom:15px;
        }
        .field input{
            flex:1;
            height:30px;
            border:none;
            border-bottom:1px solid rgb(29, 29, 29);
            outline:none;
            border-radius:5px;
            background-color:inherit;
            color:rgb(234, 234, 234);
        }
        .field input::placeholder{
            color:rgb(234, 234, 234);
        }
        .box_button{
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .box_button button{
            padding: 12px 45px;
            background-color:#527A9A;
            color:white;
            border-radius:9px;
            border:none;
            margin-top:12px;
        }
        .change_form{
            top:50%;
            width:500px;
            font-size:15px;
            transform:translate( -50%,-50%);
        }
        .change_input{
            margin-bottom:12px;
            font-size:18px;
            height:30px;
        }
        .change_h1{
            margin-bottom:30px;
            font-size:39px;
        }
        .change_button{
            padding:15px 60px;
            font-size:18px;
        }
        .color{
            color:white;
        }
    </style>
    <div class="parent-container">
        <img src="http://localhost/Black-Aries-Project/public/images/tree.png" class="image-element" alt="">
        <div class="box-shadown"></div>
        <form action="http://localhost/Black-Aries-Project/adminController" method="POST" class="form-login">
            <div>
                <h1>Black <span class="color"> Aries</span></h1>
            </div>
            <div class="field">
                <input type="text" placeholder="User name" name="username" required>
            </div>
            <div class="field">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="box_button">
                <button type="submit" class="button-login" name="signup">Sign up</button>
            </div>
        </form>
    </div>
    <script>
        var form = document.querySelector('.form-login');
        form.addEventListener('click',function(){
            form.classList.add('change_form');
            document.querySelector('.button-login').classList.add('change_button');
            let inp=form.querySelectorAll('input');
            inp.forEach(input => {
                input.classList.add('change_input');
            })
            form.querySelector('h1').classList.add('change_h1');
        })
    </script>
</body>
</html>