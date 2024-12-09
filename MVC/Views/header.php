<style>
    body{
        background: gray;
    }
    a{
        text-decoration:none;
        color:black;
    }
    header{
        background:white;
        padding:5px 20px;
        display:flex;
        align-items:center;
        justify-content:space-between;
    }
    .header-logo{
        display:flex;
        align-items:center;
        margin-left:30px;
    }
    .header-logo-icon{
        width:120px;
        height:40px;
    }
    .header-logo-icon img{
        height:100%;
        width: 100%;
    }
    .header-logo-navigation{
        margin-left:60px;
    }
    .header-logo-navigation ul, .header-user ul {
        display:flex;
        list-style: none; 
    }
    .header-logo-navigation ul li,  .header-user ul li {
        margin-right:30px;
    }
    .header-logo-navigation ul > li:hover ,  .header-user ul > li:hover {
        color:rgba(82, 122, 154, 1);
    }
    .header-logo-navigation ul li a:hover ,  .header-user ul li a:hover {
        color:rgba(82, 122, 154, 1);
    }
    .header-search{
        position: relative;
    }
    .h-searchField{
        position:absolute;
        top:200%;
        right:50%;
        width:300px;
        border-radius:40px;
        display:none;
        align-items:center;
        background:rgba(82, 122, 154, 1);
        padding:8px 12px;
    }
    .h-searchField input{
        flex:1;
        border:none;
        height:40px;
        border-radius:40px;
    }
    .h-searchField  button {
        border-radius:40px;
        margin-left:10px;
        border:0;
        padding:5px 10px;
    }
</style>
<!-- link: <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">  -->
<header>
    <div class="header-logo">
        <div class="header-logo-icon"><img src="" alt="Logo web"></div>
        <div class="header-logo-navigation">
            <ul>
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="#">About as</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
    <div class="header-user">
        <ul>
            <li class="header-search"><span  id="h-search"><i class="fas fa-search icon"></i>Search</span>
                <div class="h-searchField"> 
                    <input type="text" placeholder="Enter name of product!">
                    <button>Run</button>
                </div>
            </li>
            <li><a href="#"><i class="fas fa-user icon"></i>Profile</a></li>
            <li><a href="#"><i class="fas fa-user icon"></i>Log in</a></li>
            <li><a href="#"><i class="fas fa-shopping-cart icon"></i>Cart</a></li>
        </ul>
    </div>
</header>
<script>
    var se = document.getElementById('h-search');
    se.addEventListener('click',function(){
        let box= document.querySelector('.h-searchField');
        if(box.style.display == "flex"){
            box.style.display ="none";
        }else{
            box.style.display = "flex"
        }
    })
</script>