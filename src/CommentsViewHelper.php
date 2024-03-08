<?php

namespace src;

require_once 'src/Models/CommentModel.php';

class CommentsViewHelper
{
    public function displayAllComments(array $comments): string
    {
        $CommentString = '';
        foreach ($comments as $comment) {
            $formattedDate = date('d/m/Y', strtotime($comment->date));
            $CommentString .= "<div class='p-8 border border-solid rounded-md bg-slate-200 mb-2'>
        <div class='text-2xl mb-3'> $comment->userName - $formattedDate </div>
        <p>$comment->content</p>
        </div>";
        }
        return $CommentString;
    }

}
