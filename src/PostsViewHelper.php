<?php

namespace src;

require_once 'src/Models/PostModel.php';

class PostsViewHelper
{
    public string $posts;
    public function displayAllPosts(array $posts) :void
    {
        foreach ($posts as $post) {
            echo "<article class='p-8 border border-solid rounded-md'>
                 <div class='flex justify-between items-center flex-col md:flex-row mb-4'>
                <h2 class='text-4xl'> {$post->title} </h2>
                </div>
                <p class='text-2xl mb-2'> {$post->dateTime} - {$post->authorName} </p>";
            echo "<p>" . mb_strimwidth($post->content, 0, 100, '...') . "</p>
                </article>";
        }
    }

    public function __toString(): string
    {
        return $this->posts;
    }
}