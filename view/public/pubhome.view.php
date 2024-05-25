
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
        var_dump($_SESSION);
        ?>
    <?php if (isset($_GET["login"])) include("inc/login-form.php");?>
                  
<?php include ("inc/header.public.php"); ?>


<?php include ("inc/footer.public.php"); ?>
<?php require ("../view/cdn/jsBS.php") ?>
<script src="js/script.js"></script>
</body>
</html>