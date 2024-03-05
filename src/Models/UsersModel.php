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

        $query = $this->db->prepare('SELECT `id`, `user-name`, `email-address`, `password` FROM `users`;');
        $query->execute();
        $data = $query->fetchAll();

        return $this->hydrateMultipleUsers($data);
    }

    public function selectUser(string $inputtedUsername): User|null
    {
        $query = $this->db->prepare('SELECT `id`, `user-name`, `email-address`, `password` FROM `users` WHERE `user-name` = :inputtedUsername');
        $query->execute([
            ':inputtedUsername' => $inputtedUsername
        ]);

        $data = $query->fetch();

        if ($data === false) {
            return null;
        }

        return $this->hydrateSingleUser($data);

    }

    public function addUser(string $inputtedUsername, EmailAddress $inputtedEmail, Password $inputtedPassword)
    {
        $query = $this->db->prepare("INSERT INTO `users` (`user-name`, `email-address`, `password`) VALUES (:username, :emailAddress, :password);");
        $query->execute([
            ':username' => $inputtedUsername,
            ':emailAddress' => $inputtedEmail,
            ':password' => $inputtedPassword,
        ]);
    }

    public function checkUser(string $inputtedUsername)
    {

        $query = $this->db->prepare('SELECT `id`, `user-name`, `email-address`, `password` FROM `users` WHERE `user-name` = :inputtedUsername');
        $query->execute([
            ':inputtedUsername' => $inputtedUsername
        ]);

        $data = $query->fetch();

        return $data;

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