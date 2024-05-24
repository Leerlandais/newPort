
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ("../view/cdn/cssBS.php"); ?>
    <script src="<?php include ("../view/cdn/queryCDN.js")?>"></script>
    <link rel="stylesheet" href="css/colours.css">
    <link rel="stylesheet" href="css/style.css">
    <title><?=$title?></title>
</head>
<body>
    <?php
        if (isset($myMessage)) {
            ?>
            <p class="h2"><?=$myMessage?></p>
            <?php
        }
        ?>
        <p class="h1 text-center">Bienvenue</p>

        <main class="tiny">
            <p class="tiny">THESTOIERZOIHMSDOFHMSH</p>
        </main>
        <?php if (isset($_GET["login"])) include ("inc/loginForm.php"); ?>
<?php include ("inc/footer.public.php"); ?>
<?php require ("../view/cdn/jsBS.php") ?>
<script src="js/script.js"></script>
</body>
</html>