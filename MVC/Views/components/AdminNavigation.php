<style>
    .box-navigation{
        width:20%;
        background-color:black;
        height:100%;
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
        padding:9px 0 ;
        color:white;
        border-bottom:1px solid gray;
    }
    .box-navigation li a:hover{
        background:#527A9A;
    }
</style>
<div class="box-navigation">
    <ul>
        <li id="position1"><a href="?position=1">Product managerment</a></li>
        <li id="position2"><a href="?position=2">User managerment</a></li>
        <li id="position3"><a href="?position=3">Order managerment</a></li>
        <li id="position4"><a href="?position=4">Category managerment</a></li>
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