<?php 
    require_once "../php/all.php";
    require_once "../php/variables.php";
    session_start();
?>
<aside id="menu">
        <?php
            if(isset($_SESSION['user'])){ $user =  unserialize($_SESSION['user']); ?>
            <div class="menu_btn" onclick=""><?php echo $user->attr["username"]; ?></div>
            <div class="menu_btn" onclick="show.new_secret()">Nuevo Post</div>
            <div class="menu_btn" onclick="show.wards()">Mis Wards</div>
        <?php } else { ?>
            <div class="menu_btn" onclick="show.login()">Iniciar</div>
            <div class="menu_btn" onclick="show.signup()">Registrarme</div>
        <?php } ?>
    </aside>