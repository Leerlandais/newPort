
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ("../view/cdn/cssBS.php"); ?>
    <script><?php include ("../view/cdn/queryCDN.js")?></script>
    <link rel="stylesheet" href="css/colours.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?=$title?></title>
</head>
<body>
    <?php
        if (isset($errorMessage)) {
            ?>
            <p class="h2"><?=$errorMessage?></p>
            <?php
        }
    //    var_dump($_SESSION);
        ?>
                  
    <?php include ("inc/header.public.php"); ?>
    <?php if (isset($_GET["login"])) include("inc/login-form.php");?>
    <?php if (isset($_GET["createUser"])) include("inc/createUser-form.php");?>
    <?php if (isset($_GET["controls"])) include("inc/site-controller.php");?>
    <?php include("inc/carousel-home.php");?>

<!--    <p class="h5" id="forMarie"></p>  -->


<?php include ("inc/footer.public.php"); ?>
<?php require ("../view/cdn/jsBS.php") ?>
<script src="js/script.js"></script>
</body>
</html>