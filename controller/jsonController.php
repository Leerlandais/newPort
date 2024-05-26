<?php


if (isset($_GET['json'])) {
    $datas = createTextByUserLang($db, $_SESSION["user_lang"]);
    if (!is_string($datas)) {
        echo json_encode($datas);
    }
    exit();
}



if (isset($_GET['jsonCSS'])) {
    $datasCSS = getAllCss($db);
    if (!is_string($datasCSS)) {
        echo json_encode($datasCSS);
    }
    exit();
}