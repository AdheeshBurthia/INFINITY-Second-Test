<?php
    session_start();
    
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
            <li class="active"><i class='bx bx-line-chart'></i><a href="index.php">Dashboard</a></li>
            <li><i class='bx bx-category'></i><a href="admin-products.php">Product List</a></li>
            <li><i class='bx bxs-user'></i><a href="admin-users.php">Users</a></li>
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
                    <input type="text" placeholder="Search">
                </div>
            </div>

            <div class="profile">
                <i class='bx bx-bell'></i>
                <img src="../assets/img/testimonial3.jpg" alt="">
            </div>
        </div>

        <h3 class="i-name">
            Dashboard
        </h3>

        <div class="values">
            <div class="val-box">
                <i class='bx bxs-user'></i>
                <div>
                    <h3>8,267</h3>
                    <span>Total Users</span>
                </div>
            </div>
            <div class="val-box">
                <i class='bx bxs-cart' ></i>
                <div>
                    <h3>200,521</h3>
                    <span>Total Orders</span>
                </div>
            </div>
            <div class="val-box">
                <i class='bx bx-data'></i>
                <div>
                    <h3>215,542</h3>
                    <span>Total Products</span>
                </div>
            </div>
            <div class="val-box">
                <i class='bx bx-dollar' ></i>
                <div>
                    <h3>Rs 677.89</h3>
                    <span>This Month</span>
                </div>
            </div>
        </div>

        <div class="charts">
            <div class="chart">
                <h2>Earnings (past 12 months)</h2>
                <canvas id="lineChart"></canvas>
            </div>
            <div class="chart" id="clock">
                <h2>Localtime (Mauritius)</h2>
                <div class="date">
                    <?php date_default_timezone_set("Indian/Mauritius");
                        $hour = date('h');
                        $minute = date('ia');
                        $mydate=getdate(date("U"));
                        $date = "$mydate[mday] $mydate[month] $mydate[year]"; 
                        echo $date;
                    ?>
                </div>
                <div class="clock-container">
                    <div class="clock">
                        <div class="hour">
                            <div class="hr" id="hr"></div>
                        </div>
                        <div class="min">
                            <div class="mn" id="mn"></div>
                        </div>
                        <div class="sec">
                            <div class="sc" id="sc"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script src="../assets/js/chart1.js"></script>
    <script type="text/javascript">
        const deg = 6;
        const hr = document.querySelector("#hr");
        const mn = document.querySelector("#mn");
        const sc = document.querySelector("#sc");
        setInterval(() => {
            let day = new Date();
            let hh = day.getHours() * 30;
            let mm = day.getMinutes() * deg;
            let ss = day.getSeconds() * deg;
            hr.style.transform = `rotateZ(${hh+(mm/12)}deg)`;
            mn.style.transform = `rotateZ(${mm}deg)`;
            sc.style.transform = `rotateZ(${ss}deg)`;
        })
    </script>
    <script>
        $('#menu-btn').click(function(){
            $('#menu').toggleClass("active");
        })
    </script>
</body>
</html>