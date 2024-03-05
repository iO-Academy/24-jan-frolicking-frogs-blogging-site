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

        return $data;
    }

    public function displayAllPosts() :void
    {
        foreach ($this->getAllPosts() as $post) {
            echo "<article class='p-8 border border-solid rounded-md'>
                <span class='px-3 py-2 bg bg-slate-200 inline-block mb-4 rounded-sm'>Science and Nature</span>
                <div class='flex justify-between items-center flex-col md:flex-row mb-4'>
                <h2 class='text-4xl'> {$post['title']} </h2>
                <span class='text-xl'>100 likes - 50 dislikes</span>
                </div>
                <p class='text-2xl mb-2'> {$post['date-time']} - {$post['author-name']} </p>";

             echo "<p>" . mb_strimwidth($post['content'], 0, 100, '...') . "</p>
                <div class='flex justify-center'>
                    <a class='px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm' href=singlePost.php'>View post</a>
                </div>
                </article>";
        }
    }

}