<?php

class NewsClass {
    
    private $news_id, $title, $date, $author, $story_url, $other_url, $feature_img, $banner_img, $description, $article, $type, $publish;
    
    public function __construct($title, $date, $author, $story_url, $other_url, $feature_img, $banner_img, $description, $article, $type, $publish) {
        $this->title = $title;
        $this->date = $date;
        $this->author = $author;
        $this->story_url = $story_url;
        $this->other_url = $other_url;
        $this->feature_img = $feature_img;
        $this->banner_img = $banner_img;
        $this->description = $description;
        $this->article = $article;
        $this->type = $type;
        $this->publish = $publish;
    }
    
    public function getNewsID() {
        return $this->news_id;
    }

    public function setNewsID($value) {
        $this->news_id = $value;
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($value) {
        $this->title = $value;
    }
    
    public function getDate() {
        return $this->date;
    }

    public function setDate($value) {
        $this->date = $value;
    }
    
    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($value) {
        $this->author = $value;
    }
    
    public function getStoryURL() {
        return $this->story_url;
    }

    public function setStoryURL($value) {
        $this->story_url = $value;
    }
    
    public function getOtherURL() {
        return $this->other_url;
    }

    public function setOtherURL($value) {
        $this->other_url = $value;
    }
    
    public function getFeatureIMG() {
        return $this->feature_img;
    }

    public function setFeatureIMG($value) {
        $this->feature_img = $value;
    }
    
    public function getBannerIMG() {
        return $this->banner_img;
    }

    public function setBannerIMG($value) {
        $this->banner_img = $value;
    }
    
    public function getDesc() {
        return $this->description;
    }

    public function setDesc($value) {
        $this->description = $value;
    }
    
    public function getArticle() {
        return $this->article;
    }

    public function setArticle($value) {
        $this->article = $value;
    }
    
    public function getType() {
        return $this->type;
    }

    public function setType($value) {
        $this->type = $value;
    }
    
    public function getPublish() {
        return $this->publish;
    }

    public function setPublish($value) {
        $this->publish = $value;
    }
}
