<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once './InfraInfoClass.php';
require_once './InfraInfoPDO.php';
require_once './FaqClass.php';
require_once './FaqPDO.php';
require_once './FaqLogic.php';
require_once './InfraInfoLogic.php';

// 基盤情報を全件取得
$infraInfo = new InfraInfoPDO();
$infraInfoAry = $infraInfo->selectAll();

// ステータスが「掲載中」のものを取得
$infraInfoLogic = new InfraInfoLogic();
$upInfoAry = $infraInfoLogic->selectUpInfo($infraInfoAry);



// FAQ取得
$faq = new FaqPDO();
$faqAry = $faq->selectAll();

// ステータスが「掲載中」のものを取得
$faqLogic = new FaqLogic();
$upfaqAry = $faqLogic->selectUpFaq($faqAry);


?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo '基盤情報：';
        echo "<br>";
        foreach ($upInfoAry as $infra){
            echo "・".$infra["CONTENT"];
            echo "<br>";
        }
        echo "<br>";
        echo 'よくある質問：';
        echo "<br>";
        foreach ($upfaqAry as $faq){
            echo "・".$faq["CONTENT"];
            echo "<br>";
        }
        ?>
        
        <a href="InputModify.php">編集画面へ</a>
    </body>
</html>
