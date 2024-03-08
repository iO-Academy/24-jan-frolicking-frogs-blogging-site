<?php

namespace src;

require_once 'src/Models/PostModel.php';
require_once 'src/Models/PostModel.php';
require_once 'connectToDB.php';

class PostsViewHelper
{
    public string $posts;

    public function displayAllPosts(array $posts)
    {
        $db = connectToDB();
        $postModel = new \PostModel($db);
        $postString = '';

        foreach ($posts as $post) {

            $postId = $post->id;

            $dislikes = $postModel->dislikeCount($postId);
            $likes = $postModel->likeCount($postId);
            $formattedDate = date('d/m/Y', strtotime($post->dateTime));

            $controversial = '';
            if ($dislikes['COUNT(`reaction`)'] > ($likes['COUNT(`reaction`)'] * 1.5)) {
                $controversial = '<span class="px-3 py-2 bg bg-rose-600 inline-block mb-4 rounded-sm">Controversial</span>';
            }
            $postString .= "<article class='p-8 border border-solid rounded-md'>
                 {$controversial}
                 <div class='flex justify-between items-center flex-col md:flex-row mb-4'>
                <h2 class='text-4xl'> {$post->title} </h2>
                <span class='text-xl'> {$likes['COUNT(`reaction`)']} likes - {$dislikes['COUNT(`reaction`)']} dislikes </span>
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