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
        $query = $this->db->prepare('SELECT `posts`.`id`,`title`, `posts`.`content`,`posts`.`author-name`, `posts`.`date-time`, `posts`.`user-id`, `users`.`user-name` 
FROM `posts` INNER JOIN `users` ON `posts`.`user-id` = `users`.`id` ORDER BY `date-time` DESC;');
        $query->execute();
        $data = $query->fetchAll();

        return $this->hydrateMultiplePosts($data);
    }

    private function hydrateMultiplePosts(array $data): array
    {
        $posts = [];
        foreach ($data as $post) {
            $posts[] = new Post($post['title'], $post['user-name'], $post['content'], $post['date-time']);
        }
        return $posts;
    }
    public function addPost(string $inputtedTitle, string $inputtedContent, int $userId): void
    {

        $query = $this->db->prepare("INSERT INTO `posts` (`title`, `content`, `date-time`, `user-id`) VALUES (:title, :content, CURRENT_TIMESTAMP(), :userId);");
        $query->execute([
            ':title' => $inputtedTitle,
            ':content' => $inputtedContent,
            ':userId' => $userId,
        ]);

    }

}