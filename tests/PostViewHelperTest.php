<?php

require_once 'src/PostsViewHelper.php';

use PHPUnit\Framework\TestCase;

class PostViewHelperTest extends TestCase {

    public function test_postViewHelper_displayAllPosts()
    {
        $post1 = new Post('test', 'Test', 'Test', '2024-03-05 12:00:00');;
        $expecting = "<article class='p-8 border border-solid rounded-md'>
                 <div class='flex justify-between items-center flex-col md:flex-row mb-4'>
                <h2 class='text-4xl'> test </h2>
                </div>
                <p class='text-2xl mb-2'> 2024-03-05 12:00:00 - Test </p><p>Test</p>
                </article>";
        $subject = new \src\PostsViewHelper();
        $actual = $subject->displayAllPosts([$post1]);
        $this->assertEquals($expecting, $actual);
    }
}
