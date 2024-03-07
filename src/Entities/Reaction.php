<?php

readonly class Reaction {

    public int $id;
    public string $title;
    public string $authorName;
    public string $content;
    public string $dateTime;

    public function __construct(string $id, string $title, string $authorName, string $content, string $dateTime)
    {
        $this->title = $title;
        $this->authorName = $authorName;
        $this->content = $content;
        $this->dateTime = $dateTime;
        $this->id = $id;
    }
}
