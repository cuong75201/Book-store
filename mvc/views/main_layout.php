<?php require 'inc/head.php';?>

<body>
    <?php
    require "inc/header.php";
    require "inc/navbar.php";
    ?>
    <!-- Main Container -->
    <div class="ins_main col-12">
        <?php include 'page/' . $data['page'] . '.php'; ?>
    </div>
    <?php require "inc/footer.php"; ?>
    
</body>