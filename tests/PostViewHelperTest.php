<?php

require_once 'src/PostsViewHelper.php';

use PHPUnit\Framework\TestCase;

class PostViewHelperTest extends TestCase {

    public function test_postViewHelper_displayAllPosts()
    {
        $expecting = ;
        $post1 =
        $input = ([$post1, $post2]);
        $subject = new \src\PostsViewHelper();
        $actual = $subject->displayAllPosts($input);
        $this->assertEquals($expecting, $actual);
    }
}
