<?php


require_once 'src/CommentsViewHelper.php';

use PHPUnit\Framework\TestCase;

class CommentsViewHelperTest extends TestCase
{

    public function test_commentViewHelper_displayAllComments()
    {
        $post1 = new Comment(1, 'Test', '2024-03-05 12:00:00', 1, 'james');;
        $expecting = "<div class='p-8 border border-solid rounded-md bg-slate-200 mb-2'>
        <div class='text-2xl mb-3'> james - 05/03/2024 </div>
        <p>Test</p>
        </div>";

        $subject = new \src\CommentsViewHelper();
        $actual = $subject->displayAllComments([$post1]);
        $this->assertEquals($expecting, $actual);
    }
}

