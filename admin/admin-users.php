<?php
    session_start();
    require_once '../includes/conn.php';
    require_once '../includes/adminfunction.php';
    require_once '../includes/admincontrol.php';
    
    if((!isset($_SESSION["authentication"])) || ($_SESSION["authentication"] == false) || ($_SESSION["usertype"] == 0)){
        header('Location:../home.php');
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!--=============== FAVICON ===============-->
     <link rel="shortcut icon" href="../assets/img/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="../assets/css/admin-styles.css">

    <title>ADMIN | Rolex</title>
</head>
<body>
    <section id="menu">
        <div class="logo">
            <i class='bx bxs-watch nav__logo-icon'></i>
            <h2>Rolex</h2>
        </div>

        <div class="items">
            <li><i class='bx bx-line-chart'></i><a href="index.php">Dashboard</a></li>
            <li><i class='bx bx-category'></i><a href="admin-products.php">Product List</a></li>
            <li class="active"><i class='bx bxs-user'></i><a href="admin-users.php">Users</a></li>
            <li><i class='bx bxs-id-card'></i><a href="admin.php">Admin</a></li>
            <li><i class='bx bx-message-dots'></i><a href="admin-message.php">Message</a></li>
            <li><i class='bx bx-log-out'></i><a href="../logout.php" onClick = "return confirm('Are you sure you want to logout <?php echo (isset($_SESSION['username'])) ? $_SESSION['username'] : ''; ?>?')">Logout</a></li>
        </div>
    </section>

    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <i id="menu-btn" class='bx bx-menu'></i>
                </div>
                <div class="search">
                    <i class='bx bx-search-alt-2'></i>
                    <input type="text" id="live_search" placeholder="Search...">
                </div>
            </div>

            <div class="profile">
                <i class='bx bx-bell'></i>
                <img src="../assets/img/testimonial3.jpg" alt="">
            </div>
        </div>

        <div class="title">

            <h3 class="i-name">
                Users
            </h3>

            <div class="new2">
                <a href="admin-adduser.php">
                <i class='bx bx-plus'></i>
                    <div>
                        <span>New</span>
                    </div>
                </a>
            </div>

        </div>
            

        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Name<i class='bx bx-sort'></i></td>
                        <td>Status<i class='bx bx-sort'></i></td>
                        <td>Date created<i class='bx bx-sort'></i></td>
                        <td colspan="3">Tools</td>
                        <td></td>
                        <td><i class='bx bx-sort'></i></td>
                    </tr>
                </thead>
                <tbody class="featured__container">
                    
                    <?php foreach($listUser as $row) { ?>
                    <tr class="featured__card">
                        <td class="people">
                            <img src="../assets/userimage/<?php echo $row['userimage']; ?>" alt="">
                            <div class="people-de">
                                <h5><?php echo $row['username']; ?></h5>
                                <p><?php echo $row['useremail']; ?></p>
                            </div>
                        </td>

                        <td class="active"><p>Active</p></td>

                        <td class="people-des">
                            <p><?php echo $row['date_created']; ?></p>
                        </td>

                        <td class="cart" colspan="3"><a href="admin-cart.php?action=admin-cart&QStrUserID=<?php echo $row['userid']?>"><i class='bx bx-cart'></i>Cart</a></td>
                        <td class="edit"><a href="admin-useredit.php?action=admin-useredit&QStrUserID=<?php echo $row['userid']?>"><i class='bx bx-edit-alt'></i>Edit</a></td>
                        <td class="delete"><a href="admin-userdelete.php?action=admin-userdelete&QStrUserID=<?php echo $row['userid']?>"><i class='bx bx-trash'></i>Delete</a></td>
                    </tr>
                    <?php } ?>  
                    
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <!--<li class="page-item previous-page disable"><a class="page-link" href="#">Prev</a></li>
            <li class="page-item current-page active"><a class="page-link" href="#">1</a></li>
            <li class="page-item dots"><a class="page-link" href="#">...</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">5</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">6</a></li>
            <li class="page-item dots"><a class="page-link" href="#">...</a></li>
            <li class="page-item current-page"><a class="page-link" href="#">10</a></li>
            <li class="page-item next-page"><a class="page-link" href="#">Next</a></li>-->
        </div>
    </section>

    <script>
        $('#menu-btn').click(function(){
            $('#menu').toggleClass("active");
        })
    </script>
     <!--=============== Pagination JS ===============-->
     <script src="../assets/js/admin-pagination.js"></script>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../assets/js/admin-search.js"></script>
</body>
</html>