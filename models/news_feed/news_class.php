<?php

class NewsClass {
    
    private $news_id, $title, $date_created, $date_published, $author, $story_url, $other_url, $description, $article, $type, $publish;
    
    public function __construct($title, $date_created, $date_published, $author, $story_url, $other_url, $description, $article, $type, $publish) {
        $this->title = $title;
        $this->date_created = $date_created;
        $this->date_published = $date_published;
        $this->author = $author;
        $this->story_url = $story_url;
        $this->other_url = $other_url;
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
    
    public function getDateCreated() {
        return $this->date_created;
    }

    public function setDateCreated($value) {
        $this->date_created = $value;
    }
    
    public function getDatePublished() {
        return $this->date_published;
    }

    public function setDatePublished($value) {
        $this->date_published = $value;
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
