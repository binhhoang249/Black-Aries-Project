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
                <h2>Chard</h2>
            </div>
            <form action="">
                <span><b>Year:</b></span>
                <select id="chart_year">
                    <?php 
                        $currentYear = date('Y');
                        if(!empty($year)){
                            while(true){
                                if($year == $currentYear){
                                    ?>
                                        <option value="<?php echo $year ; ?>" selected><?php echo $year ; ?></option>
                                    <?php
                                    break;
                                }else{
                                    ?>
                                        <option value="<?php echo $year ; ?>"><?php echo $year ; ?></option>
                                    <?php
                                }
                                $year +=1;
                            }
                        }
                     ?>
                </select>
            </form>
            <canvas id="barChart" width="400" height="200"></canvas>
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