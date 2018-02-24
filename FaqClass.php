<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FaqClass
 *
 * @author Takayama
 */
class FaqClass {
    /**
     * ID
     */
    private $faqId;
    
    /**
     * content
     */
    private $content;
    
    /**
     * updatetime
     */
    private $updateTime;
    
    public function getFaqId() {
        return $this->faqId;
    }

    public function getContent() {
        return $this->content;
    }

    public function getUpdateTime() {
        return $this->updateTime;
    }
    
    public function setFaqId($faqId) {
        $this->faqId = $faqId;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setUpdateTime($updateTime) {
        $this->updateTime = $updateTime;
    }
}
