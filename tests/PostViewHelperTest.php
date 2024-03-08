<?php

require_once 'src/PostsViewHelper.php';

use PHPUnit\Framework\TestCase;

class PostViewHelperTest extends TestCase {

    public function test_postViewHelper_displayAllPosts()
    {
        $post1 = new Post(1, 'Test', 'Test', 'Test', '2024-03-05 12:00:00');;
        $expecting = "<article class='p-8 border border-solid rounded-md'>
                 <div class='flex justify-between items-center flex-col md:flex-row mb-4'>
                <h2 class='text-4xl'> Test </h2>
                </div>
                <p class='text-2xl mb-2'> 05/03/2024 - Test </p><p>Test</p>
            <div class='flex justify-center'>
            <a class='px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm' href='singlePost.php?id=1'>View post</a>
            </div>
            </article>";

        $subject = new \src\PostsViewHelper();
        $actual = $subject->displayAllPosts([$post1]);
        $this->assertEquals($expecting, $actual);
    }
}
