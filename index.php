<?php 
    require_once "php/all.php";
    require_once "php/variables.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en" ng-app="SS">
<head>
	<meta charset="UTF-8">
	<title>Home | <?php echo $project_name ?></title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/packery/1.4.3/packery.pkgd.min.js"></script>
	<script type="text/javascript" src="assets/js/angular.js"></script>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body id="body" ng-controller="main_controller" ng-init="get_all_secrets()">
    <header>
        <!-- <input type="text" id="search_box" ng-model="search" ng-keyup="search_in_ss()"> -->
        <input type="text" id="search_box" ng-model="cat_f" ng-keyup="get_secrets()">
        <div class="nav_btn" onclick="show.menu()"><i class="ion-navicon"></i></div>    
    </header>
    <nav><aside id="menu">
        <?php
            if(isset($_SESSION['user'])){ $user =  unserialize($_SESSION['user']); ?>
            <div class="menu_btn" onclick="show.new_secret()">Nuevo Post</div>
            <div class="menu_btn" onclick="show.wards()">Mis Wards</div>
        <?php } else { ?>
            <div class="menu_btn" onclick="show.login()">Iniciar</div>
            <div class="menu_btn" onclick="show.signup()">Registrarme</div>
        <?php } ?>
    </aside></nav>
    
    <div class="overlay" onclick="out_overlay()"></div>
    
    <div class="popup">
        <div class="header">
            <span class="title" id="p_title">
                Título
            </span>
        </div>
        <div class="content" id="p_content">
            <i class="ion-email"></i><input type="text" id="mail"><br>
            <i class="ion-unlocked"></i><input type="text" id="password"><br>
            <input type="button" value="Enviar" onclick="login()">
        </div>
    </div>


    <input type="text" ng-model="content" placeholder="Secret">
    <input type="text" ng-model="cat" placeholder="School">
    <input type="button" ng-click="new_post()">
    
    <br><br><br><br><br>
    
    <div id="container">
        <article class="post" ng-repeat="s in secrets">
            <div class="header">
                <img src="/usr/src/img/nyc.jpg" alt="">
            </div>
            <div class="data">
                <span class="category"><i class="ion-bookmark"></i>  {{s.category}}</span>
                
                <span class="date"><i class="ion-ios-clock"></i> {{s.creation_date}}</span>
            </div>
            <div class="space"></div>
            <div class="content">
                <div class="content_in content">
                    {{s.content}}
                </div>
                <div class="content_in like">
                    <span class="text">TIENE</span> <br>
                    <span class="like">
                        {{s.likes.length}}
                        <i class="ion-happy-outline"></i>
                    </span>
                </div>
            </div>
            <div class="space"></div>
            <div class="actions">
                <span class="like" ng-click="toggle_like(s.id)">
                    <i class="ion-happy-outline"></i>
                    Like
                </span> | 
                <span class="like" ng-click="toggle_ward(s.id)">
                    <i class="ion-android-cloud-circle"></i>
                    Ward
                </span>
            </div>
        </article>
    </div>
    
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script>
        setTimeout(function(){angular.element($("#body")).scope().init();}, 3000);
    </script>
</body>
</html>