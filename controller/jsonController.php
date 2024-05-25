<?php


if (isset($_GET['json'])) {
    $datas = createTextByUserLang($db, $_SESSION["user_lang"]);
    if (!is_string($datas)) {
        echo json_encode($datas);
    }
    exit();
}

