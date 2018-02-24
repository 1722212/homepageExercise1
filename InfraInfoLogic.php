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
class InfraInfoLogic {
    /**
     * 投稿中の基盤情報を取得
     */
    public function selectUpInfo($infraInfoAry){
        // 投稿中の情報を格納する配列
        $upInfoAry = [];
        // STATUSが１のものを取得
        foreach ($infraInfoAry as $infra){
            if($infra["STATUS"] == 1){
                // 配列に追加
                $upInfoAry[] = $infra;
            }
        }
        return $upInfoAry;
    }
    
    /**
     * 投稿ステータスを未掲載に変更する
     */
    public function updateStatus($id, $status){
        
        // 掲載中に変更
        if($status == 1){
            $infraInfoPDO = new InfraInfoPDO();
            $infraInfoPDO->updateStatusToOn($id);
            return 1;
        }
        // 未掲載に変更
        else if($status == 0){
            $infraInfoPDO = new InfraInfoPDO();
            $infraInfoPDO->updateStatusOff($id);
            return 0;
        }
    }
}
