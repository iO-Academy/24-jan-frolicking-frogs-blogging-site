<?php

namespace src;

require_once 'src/Models/PostModel.php';

class PostsViewHelper
{
    public string $posts;
    public function displayAllPosts(array $posts)
    {
        $postString = '';
        foreach ($posts as $post) {
            $formattedDate = date('d/m/Y', strtotime($post->dateTime));
            $postString .= "<article class='p-8 border border-solid rounded-md'>
                 <div class='flex justify-between items-center flex-col md:flex-row mb-4'>
                <h2 class='text-4xl'> {$post->title} </h2>
                </div>
                <p class='text-2xl mb-2'> {$formattedDate} - {$post->authorName} </p>";
            $postString .= "<p>" . mb_strimwidth($post->content, 0, 100, '...') . "</p>
            <div class='flex justify-center'>
            <a class='px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm' href='singlePost.php?id={$post->id}'>View post</a>
            </div>
            </article>";
        }
        return $postString;
    }

}