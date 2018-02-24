<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InfraInfoLogic
 *
 * @author Takayama
 */
class FaqLogic {
    /**
     * 投稿中の基盤情報を取得
     */
    public function selectUpFaq($faqAry){
        // 投稿中の情報を格納する配列
        $upFaqAry = [];
        // STATUSが１のものを取得
        foreach ($faqAry as $faq){
            if($faq["STATUS"] == 1){
                // 配列に追加
                $upFaqAry[] = $faq;
            }
        }
        return $upFaqAry;
    }
    
    /**
     * 投稿ステータスを未掲載に変更する
     */
    public function updateStatus($id, $status){
        
        // 掲載中に変更
        if($status == 1){
            $faqPDO = new FaqPDO();
            $faqPDO->updateStatusToOn($id);
            return 1;
        }
        // 未掲載に変更
        else if($status == 0){
            $faqPDO = new FaqPDO();
            $faqPDO->updateStatusOff($id);
            return 0;
        }
    }
}
