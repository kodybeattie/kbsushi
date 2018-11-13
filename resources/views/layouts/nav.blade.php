<?php use Illuminate\Support\Facades\Auth; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Kiyoshi Bai Sushi</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <script type="text/javascript">
        function increaseValue(id) {
          var strId = id.toString();
          var value = parseInt(document.getElementById(strId).value, 10);
          value = isNaN(value) ? 0 : value;
          value++;
          document.getElementById(strId).value = value;
        }

      function decreaseValue(id) {
        var strId = id.toString();
        var value = parseInt(document.getElementById(strId).value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        value--;
        document.getElementById(strId).value = value;
      }
    </script>


</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.html"><img src="img/core-img/logo.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="/">Home</a>
                            <li><a href="/about">About</a></li>
                            <li><a href="/contact">Contact</a></li>
                        <?php
                        if (Auth::guest())
                        {
                        ?>
                            <li><a href="/register">Register</a></li>
                            <li><a href="/login">Login</a></li>
                        <?php
                        }
                        else
                        {
                        ?>
                            <li><a href="/logout">Logout</a></li>
                            <li><a href="/favorites">Favorite</a></li>
                        <?php
                        }
                        ?>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                     <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#"><img src="/images/like.png" alt=""></a>
                </div>
                <?php
                if (!Auth::guest())
                {
                  ?>
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="/settings"><img src="/images/account.png" alt=""></a>
                </div>
                <?php
                }
                ?>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="/cart" id="essenceCartBtn"><img src="/images/shopping-bag.png" alt=""> <span>3</span></a>
                </div>
            </div>

        </div>
    </header>
