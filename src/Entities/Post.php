<?php

readonly class Post {

    public string $title;
    public string $authorName;
    public string $content;
    public string $date;

    public function __construct(string $title, string $authorName, string $content, string $date)
    {
        $this->title = $title;
        $this->authorName = $authorName;
        $this->content = $content;
        $this->date = $date;
    }

}