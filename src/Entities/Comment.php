<?php

readonly class Comment {

    public int $id;
    public string $content;
    public string $date;
    public int $userId;
    public string $userName;
    public function __construct(int $id, string $content, string $date, int $userId, string $userName)
    {
        $this->id = $id;
        $this->content = $content;
        $this->date = $date;
        $this->userId = $userId;
        $this->userName = $userName;
    }


}