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

// 掲載中の各配列をセッションに登録
session_start();
$_SESSION["upInfoAry"] = $upInfoAry;
$_SESSION["upFaqAry"] = $upfaqAry;
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>編集</title>
    </head>
    <body>
        <form action="Modify.php" method="post">
            基盤情報<br>
            <textarea name="newInfraInfo" cols="50" rows="10">
                <?php
                    foreach ($upInfoAry as $infra){
                        echo "・".$infra["CONTENT"];
                        
                    }
                ?>
            </textarea><br>
            よくある質問<br>
            <textarea name="newFaq" cols="50" rows="10">            
                <?php
                    foreach ($upfaqAry as $faq){
                        echo "・".$faq["CONTENT"];
                        
                    }
                ?>
            </textarea><br>
            <!-- 掲載中の基盤情報、FAQの配列を送る -->
            <input type="submit" value="編集">
            </form>
        <a href="Home.php">ホームへ</a>
    </body>
</html>
