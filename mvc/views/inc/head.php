<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['Title'] ?></title>
    <link rel="icon" type="image/jpg" href="media/logo-banner/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <base href="<?php echo app_path ?>">
    <link rel="stylesheet" href="public/lib/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/style.css">
    <?php if (isset($data["plugin"]["list_product"])) {
        echo '<link rel="stylesheet" href="./public/css/list_product.css">';
    } ?>
</head>