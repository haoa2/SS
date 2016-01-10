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
    <style>
         .item { width: 25%; background-color: red;}
          .item.w2 { width: 50%; }
    </style>
</head>
<body id="body" ng-controller="main_controller" ng-init="get_all_secrets()">
    <header>
        <input type="text" id="search_box">
    </header>

    <?php
        if(isset($_SESSION['user'])){
            $user =  unserialize($_SESSION['user']);
            echo "You're already logged in<br>";
            echo "<pre>".var_dump($user)."</pre>";
            
        }
    ?>
    
    <input type="text" ng-model="content" placeholder="Secret">
    <input type="text" ng-model="cat" placeholder="School">
    <input type="button" ng-click="new_post()">
    <div id="container">
        <div class="item" ng-repeat="s in secrets">
            <p>{{s.content}}</p>
            <sub>{{s.category}}</sub>
        </div>
    </div>
    <hr>
    <h3>Filtrar</h3>
    <input type="text" ng-model="cat_f"> <input type="button" ng-click="get_secrets()" value="get secrets">
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script>
        setTimeout(function(){angular.element($("#body")).scope().init();}, 3000);
    </script>
</body>
</html>