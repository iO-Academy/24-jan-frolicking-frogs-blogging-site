<?php

readonly class Post {

    public string $title;
    public string $authorName;
    public string $content;
    public string $dateTime;

    public function __construct(string $title, string $authorName, string $content, string $dateTime)
    {
        $this->title = $title;
        $this->authorName = $authorName;
        $this->content = $content;
        $this->dateTime = $dateTime;
    }
}



