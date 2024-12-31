<?php extract($data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Managerment</title>
    <link href="http://localhost/Black-Aries-Project/public/css/UserManagerment.css?ver=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
    <div class="big-container">
        <?php include_once __DIR__.'/../../Components/AdminNavigation.php' ;?>
        <div class="main-container">
            <h1>User managerment</h1>
            <table>
                <thead>
                    <td>ID</td>
                    <td>Full name</td>
                    <td>User name</td>
                    <td>Date of birth</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    <?php foreach($users as $user){
                        ?>
                            <tr>
                                <td><?php echo $user['user_id']; ?></td>
                                <td><?php echo $user['fullname']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['date_of_birth']; ?></td>
                                <td><?php echo $user['phone']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['address']; ?></td>
                                <td class="td_action">
                                    <button onclick="edit(<?php echo $user['user_id']; ?>)">Detail</button>
                                    <form action = "" method="POST">
                                        <input type="number" name="user_id" readonly value="<?php echo $user['user_id']; ?>">
                                        <button type="submit" class="delete_button" >Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <!--form detail -->
            <form class="form-detail">
                <div class="field">
                    <div class="box-image">
                        <img src="" alt="">
                    </div>
                    <div class="box-info">
                        <p> <b>Id:</b> &nbsp; <span id="f-user_id"></span></p>
                        <p> <b>User name:</b> &nbsp;<span id="f-user_name"></span></p>
                        <p> <b>Email:</b> &nbsp;<span id="f-email"></span></p>
                    </div>
                </div>
                <div class="field">
                    <label><b>Full name:</b>&nbsp;
                        <input class="input1" type="text" id="f-fullname" readonly>
                    </label>
                    <label><b>Date of birth:</b>&nbsp;
                        <input class="input1" type="date" id="f-birth">
                    </label>
                </div>
                <div class="field">
                    <label><b>Phone:</b>&nbsp;
                        <input class="input2" type="text" id="f-phone">
                    </label>
                </div>
                <div class="field">
                    <label><b>Address:</b>&nbsp;
                        <input class="input2" type="text" id="f-address">
                    </label>
                </div>
                <h2>Order</h2>
                <div class="field">
                    <div class="order">
                        <h3>Waiting</h3>
                        <p id="order-wait">0</p>
                    </div>
                    <div class="order">
                        <h3>Shipping</h3>
                        <p id="order-shipping">0</p>
                    </div>
                    <div class="order">
                        <h3>Shipped</h3>
                        <p id="order-shiped">0</p>
                    </div>
                </div>
                <button type="button" class="button-cancel">X</button>
            </form>
        </div>
        <div class="wall"></div>
    </div>
</body>
</html>