<style>
    .box-navigation{
        width:20% !important;
        background-color:black;
        min-height:100%;
    }
    .box-navigation ul{
        list-style:none;
        padding:0;
        margin:0;
    }
    .box-navigation li a{
        display:flex;
        justify-content:center;
        align-items:center;
        text-decoration:none;
        padding:12px 0 ;
        color:white;
        border-bottom:1px solid gray;
        font-size:18px;
    }
    .box-navigation li a:hover{
        background:#527A9A;
    }
</style>
<div class="box-navigation">
    <ul>
        <li id="position1"><a href="http://localhost/Black-Aries-Project/AdminController/DashBoard?position=1">DashBoard</a></li>
        <li id="position2"><a href="http://localhost/Black-Aries-Project/AdminController/productManagement?position=2">Product managerment</a></li>
        <li id="position3"><a href="http://localhost/Black-Aries-Project/AdminController/UserManagement?position=3">User managerment</a></li>
        <li id="position4"><a href="http://localhost/Black-Aries-Project/AdminController/orderManagement?position=4">Order managerment</a></li>
    </ul>
</div>
<script>
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const name = urlParams.get('position');
    if(name && name==1){
        document.getElementById('position1').style.backgroundColor ="#527A9A";
    }else if(name && name==2){
        document.getElementById('position2').style.backgroundColor ="#527A9A";
    }else if(name && name==3){
        document.getElementById('position3').style.backgroundColor ="#527A9A";
    }else if(name && name==4){
        document.getElementById('position4').style.backgroundColor ="#527A9A";
    }   
</script>