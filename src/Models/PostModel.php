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

    public function getPostById(int $id): Post
    {
        $query = $this->db->prepare('SELECT `id`,`title`, `content`,`author-name`, `date-time`, `user-id` 
        FROM `posts` WHERE `id` = :id');
        $query->execute([':id' => $id]);
        $data = $query->fetch();

        return $this->hydrateSinglePost($data);
    }

    private function hydrateMultiplePosts(array $data)
    {
        $posts = [];
        foreach ($data as $post) {
            $posts[] = new Post($post['title'], $post['author-name'], $post['content'], $post['date-time']);
        }
        return $posts;
    }

    private function hydrateSinglePost(array $data): Post
    {
        return new Post($data['title'], $data['author-name'], $data['content'], $data['date-time']);
    }

    public function displayAllPosts()
    {
        $query = $this->db->prepare('SELECT `id`,`title`, `content`,`author-name`, `date-time`, `user-id` 
        FROM `posts` ORDER BY `date-time` DESC');
        $query->execute();
        $data = $query->fetchAll();

        return $data;
    }




}