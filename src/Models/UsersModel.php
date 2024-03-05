<?php


require_once 'src/Entities/User.php';


class UsersModel
{

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllUsers()
    {

        $query = $this->db->prepare('SELECT * FROM `users`;');
        $query->execute();
        $data = $query->fetchAll();

        return $this->hydrateMultipleUsers($data);
    }

    public function selectUser(string $inputtedUsername): User
    {

        $query = $this->db->prepare('SELECT * FROM `users` WHERE `user-name` = :inputtedUsername');
        $query->execute([
            ':inputtedUsername' => $inputtedUsername
        ]);

        $data = $query->fetch();

        return $this->hydrateSingleUser($data);

    }


    private function hydrateSingleUser(array $data): User {
        return new User($data['id'], $data['user-name'], $data['password'], $data['email-address']);
    }

    private function hydrateMultipleUsers(array $data): array
    {
        $users = [];
        foreach ($data as $user) {
            $users[] = new User($user['id'], $user['user-name'], $user['password'], $user['email-address']);
        }
        return $users;
    }
}