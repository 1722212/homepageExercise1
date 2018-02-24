<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 基盤情報のPDO
 *
 * @author Takayama
 */
class InfraInfoPDO {
    
    /**
     * SELECT ALL
     */
    public function selectAll(){
        /* DBに接続 */
        // データベース設定
        $dbServer = '127.0.0.1';
        $dbUser = 'root';
        $dbPass = 'root';
        $dbName = 'mizuho';
        // MySQL用のDSN文字列
        $dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";

        try{
            // DB接続
            $db = new PDO($dsn, $dbUser, $dbPass);
            // プリペアードステートメントのエミュレーションを無効にする
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            // 例外をスロー
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "接続できませんでした　理由：".h($e->getMessage());
        }

        // sql
        $sql = "SELECT * FROM INFRA_INFO";
        $preapre = $db->prepare($sql);
        $preapre->execute();  
        $result = $preapre->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    /**
     * SELECT
     */
    public function selectById($id){
        /* DBに接続 */
        // データベース設定
        $dbServer = '127.0.0.1';
        $dbUser = 'root';
        $dbPass = 'root';
        $dbName = 'mizuho';
        // MySQL用のDSN文字列
        $dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";

        try{
            // DB接続
            $db = new PDO($dsn, $dbUser, $dbPass);
            // プリペアードステートメントのエミュレーションを無効にする
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            // 例外をスロー
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "接続できませんでした　理由：".h($e->getMessage());
        }

        // sql
        $sql = "SELECT * FROM INFRA_INFO WHERE ID = :ID";
        $preapre = $db->prepare($sql);
        $preapre->bindValue(":ID", $id);
        $preapre->execute();  
        $result = $preapre->fetchAll(PDO::FETCH_ASSOC);
        return $result;  
    }
    
    /**
     * INSERT
     */
    public function insert($infraInfoObj){
        /* DBに接続 */
        // データベース設定
        $dbServer = '127.0.0.1';
        $dbUser = 'root';
        $dbPass = 'root';
        $dbName = 'mizuho';
        // MySQL用のDSN文字列
        $dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";

        try{
            // DB接続
            $db = new PDO($dsn, $dbUser, $dbPass);
            // プリペアードステートメントのエミュレーションを無効にする
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            // 例外をスロー
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "接続できませんでした　理由：".h($e->getMessage());
        }

        // sql
        $sql = "INSERT INTO `INFRA_INFO`(`CONTENT`) VALUES (:CONTENT)";
        $preapre = $db->prepare($sql);
        $preapre->bindValue(":CONTENT", $infraInfoObj->getContent());
        $preapre->execute();
    }
    
    /**
     * UPDATE
     */
    public function update($infaInfoObj, $id){
        /* DBに接続 */
        // データベース設定
        $dbServer = '127.0.0.1';
        $dbUser = 'root';
        $dbPass = 'root';
        $dbName = 'mizuho';
        // MySQL用のDSN文字列
        $dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";

        try{
            // DB接続
            $db = new PDO($dsn, $dbUser, $dbPass);
            // プリペアードステートメントのエミュレーションを無効にする
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            // 例外をスロー
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "接続できませんでした　理由：".h($e->getMessage());
        }
        
        $sql = "UPDATE `INFRA_INFO` SET `ID`=:ID,`CONTENT`=:CONTETN,`UPDATE_TIME`=:UPDATE WHERE ID = :ID";
        $preapre = $db->prepare($sql);
        $preapre->bindValue(":CONTENT", $infaInfoObj->getContent());
        $preapre->bindValue(":UPDATE_TIME", time());
        $preapre->bindValue(":ID", $id);
        $preapre->execute();
    }
    
    /**
     * 投稿ステータスを掲載中に変更する
     */
    public function updateStatusToOn($id){
        /* DBに接続 */
        // データベース設定
        $dbServer = '127.0.0.1';
        $dbUser = 'root';
        $dbPass = 'root';
        $dbName = 'mizuho';
        // MySQL用のDSN文字列
        $dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";

        try{
            // DB接続
            $db = new PDO($dsn, $dbUser, $dbPass);
            // プリペアードステートメントのエミュレーションを無効にする
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            // 例外をスロー
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "接続できませんでした　理由：".h($e->getMessage());
        }
        
        $sql = "UPDATE `infra_info` SET `STATUS`= 1 WHERE ID = :ID";
        $preapre = $db->prepare($sql);
        $preapre->bindValue(":ID", $id);
        $preapre->execute();
    }
    
    /**
     * 投稿ステータスを未掲載に変更する
     */
    public function updateStatusOff($id){
        /* DBに接続 */
        // データベース設定
        $dbServer = '127.0.0.1';
        $dbUser = 'root';
        $dbPass = 'root';
        $dbName = 'mizuho';
        // MySQL用のDSN文字列
        $dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";

        try{
            // DB接続
            $db = new PDO($dsn, $dbUser, $dbPass);
            // プリペアードステートメントのエミュレーションを無効にする
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            // 例外をスロー
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "接続できませんでした　理由：".h($e->getMessage());
        }
        
        $sql = "UPDATE `infra_info` SET `STATUS`= 0 WHERE ID = :ID";
        $preapre = $db->prepare($sql);
        $preapre->bindValue(":ID", $id);
        $preapre->execute();
    }
    
    /**
     * DELETE
     */
    public function delete($id){
        /* DBに接続 */
        // データベース設定
        $dbServer = '127.0.0.1';
        $dbUser = 'root';
        $dbPass = 'root';
        $dbName = 'mizuho';
        // MySQL用のDSN文字列
        $dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";

        try{
            // DB接続
            $db = new PDO($dsn, $dbUser, $dbPass);
            // プリペアードステートメントのエミュレーションを無効にする
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            // 例外をスロー
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "接続できませんでした　理由：".h($e->getMessage());
        }
        
        $sql = "DELETE FROM `INFRA_INFO` WHERE ID = :ID";
        $preapre = $db->prepare($sql);
        $preapre->bindValue(":ID", $id);
        $preapre->execute();
    }
    
}
