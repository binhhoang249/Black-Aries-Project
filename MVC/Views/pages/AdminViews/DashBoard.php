<?php extract($data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="http://localhost/Black-Aries-Project/public/css/DashBoard.css?ver=<?php echo time(); ?>" rel="stylesheet">
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
            outline: none;
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
        .card-color2{
            height: 90px;
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
            height:555px;
            overflow-y: auto;
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
            max-height:192px;
            position:relative;
            box-shadow: 2px 4px 4px 2px rgba(0, 0, 0, 0.4);
            border-radius:6px;
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
            z-index: 1000;
        }
        .button-add{
            position:absolute;
            top:3px;
            left:0;
        }
        .cancel1, .upColor, .cancel2, .upCategory{
            display:none;
        }
        .box-content{
            display:none;
        }
        .colorFcode{
            display:none;
        }
        .box-verify{
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            width: 300px;
            z-index:1100;
            font-size:18px;
        }
        #boc{
            position:absolute;
            z-index: 1050;
            width: 100%;
            height:100%;
            top:0;
            right:0;
            background:white;
            display:none;
        }
        .form-add, .form-add-category{
            width: 300px;
            margin-bottom:15px;
            display:none;
            border:1px solid gray;
            padding:2px 6px;
        }
        .form-add h2, .form-add-category h2{
            text-align:center;
            margin-top:0;
            padding-top:0;
        }
        .categoryName{
            text-align: center; /* Căn giữa văn bản */
            font-size: 27px !important;   /* Kích cỡ chữ */
            font-weight: bold; /* Đậm chữ */
            color: black;      /* Màu chữ */
            padding: 10px;     /* Khoảng cách bên trong */
            box-sizing: border-box; /* Đả */
            width:100%;
            outline: none;
            margin:0;
        }
        .field_category{
            text-align:center;
            color:gray;
            margin-top:0;
            font-size:13px;
            padding-top:0;
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
                <button id="button-editDescriptionBusiness" data-role="1">Edit</button>
            </div>
            <textarea id="myTextarea" readonly></textarea>
            <div class="description">
                <h2>Color</h2>
                <button type="button" id="button-editColor">View more</button>
            </div>
            <div class="show container-color">
                
            </div>
            <div class="description">
                <h2>Categories</h2>
                <button type="button" id="button-editCategories">View more</button>
            </div>
            <div class="show container-category">
                
            </div>
            <div class="box-content" >
                    <div id="boc"></div>
                    <div id="box-content"></div>
                    <button type="button" class="button-cancel">X</button>
                    <h1 class="title"><span>Color</span>
                        <button type="button" class="button-add" data-type="">Add</button>
                    </h1>
                    <div id="box-addForm"></div>
                    <div class="box_containerCard">
                        <form class="box-card">
                            <button type="button" class="button-cancelDetail" onclick="deleteCategory()">X</button>
                            <div class="field">
                                <input type="text" placeholder="Category" value="name" required class="categoryName" readonly>
                            </div>
                            <p class="field_category"> <span class="num_category"></span>&nbsp;Available Item</p>
                            <div class="box-button">
                                <button type="button" class="up2 up2${color.color_id}" data-num="${color.color_id}">Update</button>
                                <button type="button" class="cancel2 cancel2${color.color_id}" data-num="${color.color_id}">Cancel</button>
                                <button type="button" class="upCategory upCategory${color.color_id}" data-num="${color.color_id}">Verify</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div><!--Main container -->
    </div>
    <script type="module" src="http://localhost/Black-Aries-Project/public/js/DashBoard.js?ver=<?php echo time(); ?>"></script>
</body>
</html>