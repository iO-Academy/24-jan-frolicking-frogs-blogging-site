<?php

require_once 'src/Entities/Comment.php';

class CommentModel {
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllComments(int $id)
    {
        $query = $this->db->prepare('SELECT `comments`.`id`,`comments`.`content`, `comments`.`date`, `comments`.`user-id`,`comments`.`post-id`,`users`.`user-name`
FROM `comments` INNER JOIN `users` ON `comments`.`user-id` = `users`.`id` WHERE `comments`.`post-id`= :id ORDER BY `date` DESC;');
        $query->execute([
            ':id' => $id
        ]);
        $data = $query->fetchAll();

        return $this->hydrateMultipleComments($data);
    }

    private function hydrateMultipleComments(array $data): array
    {
        $comments = [];
        foreach ($data as $comment) {
            $comments[] = new Comment($comment['id'], $comment['content'], $comment['date'], $comment['user-id'], $comment['user-name']);
        }
        return $comments;
    }

    public function addComment(string $content, int $userId, int $postId): void
    {

        $query = $this->db->prepare('INSERT INTO `comments` (`content`, `date`, `user-id`, `post-id`)
        VALUES (:content, CURRENT_TIMESTAMP(), :userId, :postId);');

        $query->execute([
            ':content'=> $content,
            ':userId'=> $userId,
            ':postId'=> $postId
        ]);
    }

}