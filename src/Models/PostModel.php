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
            $posts[] = new Post($post['id'], $post['title'], $post['author-name'], $post['content'], $post['date-time']);
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

    public function getSinglePostById(string $id)
    {
        $query = $this->db->prepare('SELECT * FROM `posts` WHERE `id` = :id;');
        $query->execute([
            ':id' => $id
        ]);
        $data = $query->fetch();

        if ($data === false) {
            return null;
        }

        return $this->hydrateSinglePost($data);
    }

    private function hydrateSinglePost(array $data): Post {
        return new Post($data['id'], $data['title'], $data['author-name'], $data['content'], $data['date-time']);
    }

    public function LikePost(int $postId, int $userId) :void
    {
            $query = $this->db->prepare('INSERT INTO `reactions` (`user_id`, `post_id`, `reaction`) VALUES (:userId, :postId, :reaction)');
            if ($userId > 0) {
                $query->execute([
                    ':userId' => $userId,
                    ':postId' => $postId,
                    ':reaction' => 1,
                ]);
            }
    }

    public function DislikePost(int $postId, int $userId) :void
    {
            $query = $this->db->prepare('INSERT INTO `reactions` (`user_id`, `post_id`, `reaction`) VALUES (:userId, :postId, :reaction)');
            if ($userId > 0) {
                $query->execute([
                    ':userId' => $userId,
                    ':postId' => $postId,
                    ':reaction' => 0,
                ]);
            }
    }

    public function HasLiked(int $postId, int $userId) :int
    {
        $query = $this->db->prepare('SELECT `user_id` FROM `reactions` WHERE `post_id` = :post_id AND `user_id` = :user_id AND `reaction` = 1');
        $query->execute([
            ':post_id' => $postId,
            ':user_id' => $userId
            ]);

        $data = $query->fetch();

        return $data;
    }

    public function HasDisliked(int $postId, int $userId) :int
    {
        $query = $this->db->prepare('SELECT `user_id` FROM `reactions` WHERE `post_id` = :post_id AND `user_id` = :user_id AND `reaction` = 0');
        $query->execute([
            ':post_id' => $postId,
            ':user_id' => $userId
        ]);

        $data = $query->fetch();

        return $data;
    }

}

