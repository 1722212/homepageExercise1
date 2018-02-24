<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once './InfraInfoClass.php';
require_once './InfraInfoLogic.php';
require_once './FaqClass.php';
require_once './FaqLogic.php';
require_once './InfraInfoPDO.php';
require_once './FaqPDO.php';


// 投稿内容を取得
$newInfraInfo = filter_input(INPUT_POST, "newInfraInfo");
$newFaq = filter_input(INPUT_POST, "newFaq");
// セッションから掲載中の配列を取得
session_start();
$upInfoAry = $_SESSION["upInfoAry"];
$upfaqAry = $_SESSION["upFaqAry"];

// オブジェクトにセット
$infraInfoObj = new InfraInfoClass();
$infraInfoObj->setContent($newInfraInfo);
$faqObj = new FaqClass();
$faqObj->setContent($newFaq);

// 投稿内容をDBに登録
$infraInfoPDO = new InfraInfoPDO();
$infraInfoPDO->insert($infraInfoObj);
$faqPDO = new FaqPDO();
$faqPDO->insert($faqObj);

// 前回の投稿内容のステータスを「未掲載」に変更
$infraInfoLogic = new InfraInfoLogic();
foreach ($upInfoAry as $infra){
    $result = $infraInfoLogic->updateStatus($infra["ID"], 0);
    
}
$faqLogic = new FaqLogic();
foreach ($upfaqAry as $faq){
    $faqLogic->updateStatus($faq["ID"], 0);
    
}



?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        変更完了
        <a href="Home.php">ホームへ</a>
    </body>
</html>
