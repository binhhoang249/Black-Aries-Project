<?php extract($data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="http://localhost/Black-Aries-Project/public/css/DashBoard.css?ver=<?php echo time(); ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <style>
        *{
            box-sizing:border-box;
        }
        html,body{
            padding:0;
            margin:0;
            width: 100%;
            height:100%;
            font-family: Arial, sans-serif;
            font-size:12px;
        }
        .big-container{
            display:flex;
            width:100%;
            height:100%;
        }
        .main-container{
            flex:1;
            padding:15px 21px;
            position:relative;
            overflow-y: auto;
        }
        .header_content{
            display:flex;
            justify-content:center;
            align-items:center;
            margin:15px 0 21px 0;
        }
        .header_content h1{
            margin:0;
            padding:0;
        }
        .description{
            margin-bottom:12px;
            display:flex;
            margin-top:21px;
        }
        .description h2{
            margin: 0 12px 0 0 ;
            padding:0;
        }
        .description >div{
            padding: 3px 12px;
            background-color:gray;
            border:none;
            border-radius:6px;
        }
        textarea{
            border:none;
            width:100%;
            overflow: hidden;
            resize: none;
            height:auto;
        }
        .show{
            width:100%;
            display:flex;
            flex-wrap: nowrap;
            overflow-x:hidden;
            gap:9px;
            padding: 12px 0;
            
        }
        .card{
            width:19%;
            border-radius:9px;
            box-shadow: 2px 4px 4px 2px rgba(0, 0, 0, 0.4);
            height:90px;
        }
        .card h3 {
            text-align:center;
            color:black;
            font-size:21px;
        }
        .card p {
            text-align:center;
            color:gray;
        }
        .card-color, .card-color2{
            width: 100%;
            height: 50%;       
            border-top-left-radius:9px ;
            border-top-right-radius: 9px;
            border-bottom:1px solid gray;
        }
        .card-name{
            text-align:center;
            color: black !important;
        }
        .box-content{
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            width:80%;
            box-shadow: 2px 4px 4px 2px rgba(0, 0, 0, 0.4);
            padding:9px 21px 18px 21px;
            z-index:999;
            background:white;
        }
        .title{
            text-align:center;
            position: relative;
        }
        .box_containerCard{
            width:100%;
            display:flex;
            flex-wrap:wrap;
            gap:21px;
        }
        .box-card{
            width: 31%;
            height:192px;
            position:relative;
            box-shadow: 2px 4px 4px 2px rgba(0, 0, 0, 0.4);
        }
        .field{
            width:100%;
            display:flex;
            align-items:center;
            margin-bottom:9px;
        }
        .field span{
            width: 30%;
        }
        .field input {
            flex:1;
            border:none;
            color:black;
            font-size:14px;
        }
        .box-button{
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .box-button button{
            margin-right:9px;
        }
        .button-cancel, .button-cancelDetail {
            position:absolute;
            top:0;
            right:0;
        }
        .button-add{
            position:absolute;
            top:3px;
            left:0;
        }
        .cancel1, .upColor{
            display:none;
        }
        .box-content{
            display:none;
        }
    </style>
    <div class="big-container">
        <?php include_once __DIR__.'/../../Components/AdminNavigation.php' ;?>
        <div class="main-container">
            <div class="header_content">
                <h1>Black Aries</h1>
            </div>
            <div class="description">
                <h2>Description</h2>
                <div id="button-editDescriptionBusiness">Edit</div>
            </div>
            <textarea id="myTextarea" readonly><?php echo $business[0]['description'] ; ?></textarea>
            <h2>Chart</h2>
            <canvas id="barChart" width="400" height="200"></canvas>
            <div class="description">
                <h2>Color</h2>
                <div id="button-editColor">View more</div>
            </div>
            <div class="show">
                <?php if (count($color)>0) :
                $n=1;
                ?>
                <?php foreach($color as $value){ ?>
                <div class="card">
                    <div class="card-color" style="background-color:<?php echo $value['color_link']  ; ?>"></div>
                    <p class="card-name"><?php echo $value['color_name']  ; ?></p>
                </div>
                <?php 
                if($n==5){
                    break;
                }
                $n+1;
                }?>
                <?php else : ?>
                    <p>Don't color</p>
                <?php endif ; ?>
            </div>
            <div class="description">
                <h2>Categories</h2>
                <div id="button-editCategories">View more</div>
            </div>
            <div class="show">
                <?php if(count($categories)>0) :
                $n=0;
                ?>
                <?php foreach($categories as $value) {
                    $list=[];
                    foreach($products as $product){
                        if($product['category_id'] == $value['category_id']){
                            array_push($list,$product);
                        }
                        $num = count($list);
                    }
                    ?>
                        <div class="card">
                            <h3><?php echo $value['category_name'] ; ?></h3>
                            <p> <?php echo $num ; ?> Available Item</p>
                        </div>
                    <?php
                } ?>
                <?php else : ?>
                    <p>Don't Category</p>
                <?php endif ; ?>
            </div>
            <div class="box-content">
                    <button type="button" class="button-cancel">X</button>
                    <h1 class="title"><span>Color</span>
                        <button type="button" class="button-add" data-type="">Add</button>
                    </h1>
                    <div class="box_containerCard">
                        <form class="box-card">
                            <button type="button" class="button-cancelDetail" onclick="deleteColor()">X</button>
                            <div class="card-color2" style="background-color: "></div>
                            <div class="field">
                                <span>Color Code:</span><input type="color" class="colorCode">
                            </div>
                            <div class="field">
                                <span>Color name: </span><input type="text" value="name" required class="colorName">
                            </div>
                            <div class="box-button">
                                <button type="button" class="up1 up1" onclick="up1()">Update</button>
                                <button type="button" class="cancel1 cancel1" onclick="cancel()">Cancel</button>
                                <button type="button" class="upColor upColor" onclick="upColor()">Verify</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div><!--Main container -->
    </div>
    <script type="module" src="http://localhost/Black-Aries-Project/public/js/DashBoard.js?ver=<?php echo time(); ?>"></script>
</body>
</html>