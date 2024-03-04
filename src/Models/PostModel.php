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
        $query = $this->db->prepare('SELECT `title`, `authorname`,`content`, `date`, `time` 
        FROM `posts` ORDER BY `date` DESC LIMIT `content` 100');
        $query->execute();
        $data = $query->fetchAll();

        return $this->hydrateMultiplePosts($data);
    }

    public function getPostById(int $id): Post
    {
        $query = $this->db->prepare('SELECT `title`, `authorname`,`content`, `date`, `time` 
        FROM `posts` WHERE `id` = :id');
        $query->execute([
            ':id' => $id
        ]);
        $data = $query->fetch();
        // We are converting the assoc array PDO gives us into our entity object
        // by passing data from the array ($data) into a new Adult object
        return $this->hydrateSinglePost($data);
    }

    private function hydrateMultiplePosts(array $data)
    {
        $posts = [];
        foreach ($data as $post) {
            $posts[] = new Post($post['title'], $post['authorname'], $post['content'], $post['date']);
        }
        return $posts;
    }

    private function hydrateSinglePost(array $data): Post
    {
        return new Post($data['title'], $data['authorname'], $data['content'], $data['date']);
    }

}