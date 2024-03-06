<?php

require_once 'src/Entities/Post.php';

class PostModel {

    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllPosts()
    {
        $query = $this->db->prepare('SELECT `id`,`title`, `content`,`author-name`, `date-time`, `user-id` 
        FROM `posts` ORDER BY `date-time` DESC');
        $query->execute();
        $data = $query->fetchAll();

        return $this->hydrateMultiplePosts($data);
    }

    private function hydrateMultiplePosts(array $data)
    {
        $posts = [];
        foreach ($data as $post) {
            $posts[] = new Post($post['title'], $post['author-name'], $post['content'], $post['date-time']);
        }
        return $posts;
    }
    public function addPost(string $inputtedTitle, string $inputtedContent, int $userId)
    {

        $query = $this->db->prepare("INSERT INTO `posts` (`title`, `content`, `date-time`, `user-id`) VALUES (:title, :content, CURRENT_TIMESTAMP(), :userId);");
        $query->execute([
            ':title' => $inputtedTitle,
            ':content' => $inputtedContent,
            ':userId' => $userId,
        ]);

    }

}