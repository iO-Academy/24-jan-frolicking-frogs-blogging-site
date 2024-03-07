<?php

class ReactionModel
{

    public function LikePost(int $postId, int $userId): void
    {
        $query = $this->db->prepare('INSERT INTO `reactions` (`user_id`, `post_id`, `reaction`) VALUES (:userId, :postId, :reaction)');
        if ($userId > 0) {
            $query->execute([
                ':userId' => $userId,
                ':postId' => $postId,
                ':reaction' => 'like',
            ]);
        }
    }

    public function DislikePost(int $postId, int $userId): void
    {
        $query = $this->db->prepare('INSERT INTO `reactions` (`user_id`, `post_id`, `reaction`) VALUES (:userId, :postId, :reaction)');
        if ($userId > 0) {
            $query->execute([
                ':userId' => $userId,
                ':postId' => $postId,
                ':reaction' => 'dislike',
            ]);
        }
    }
}