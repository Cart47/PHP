<?php

class Image {
    
    private $id;
    private $url;
    private $link;
    private $title;
    
    public function __construct($url, $title, $link = "#"){
        $this->url = $url;
        $this->title = $title;
        $this->link = $link;
    }
    
    
    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }
    
    
    public function getUrl() {
        return $this->url;
    }

    public function setUrl($value) {
        $this->url = $value;
    }
    
    public function getLink(){
        return $this->link;
    }
    
    public function setLink(){
        $this->link = $value;
    }
    
    public function getTitle(){
        return $this->title;
    }
    
    public function setTitle(){
        $this->title = $value;
    }
}