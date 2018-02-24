<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InfraInfoClass
 *
 * @author Takayama
 */
class InfraInfoClass {
    /**
     * ID
     */
    private $id;
    
    /**
     * content
     */
    private $content;
    
    /**
     * update
     */
    private $updateTime;
    
    public function getId() {
        return $this->id;
    }

    public function getContent() {
        return $this->content;
    }

    public function getUpdateTime() {
        return $this->updateTime;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setUpdateTime($updateTime) {
        $this->updateTime = $updateTime;
    }
}
