<?php

require_once 'src/Entities/User.php';
require_once 'emailAddress.php';

class UsersModel
{

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function selectUser(string $inputtedEmail): User|null
    {
        $query = $this->db->prepare('SELECT `id`, `user-name`, `email-address`, `password` FROM `users` WHERE `email-address` = :inputtedEmail');
        $query->execute([
            ':inputtedEmail' => $inputtedEmail
        ]);

        $data = $query->fetch();

        if (!$data) {
            return null;
        }

        return $this->hydrateSingleUser($data);

    }

    public function addUser(string $inputtedUsername, EmailAddress $inputtedEmail, Password $inputtedPassword): void
    {
        $query = $this->db->prepare("INSERT INTO `users` (`user-name`, `email-address`, `password`) VALUES (:username, :emailAddress, :password);");
        $query->execute([
            ':username' => $inputtedUsername,
            ':emailAddress' => $inputtedEmail,
            ':password' => $inputtedPassword
        ]);
    }

    public function checkUser(string $inputtedUsername): mixed
    {

        $query = $this->db->prepare('SELECT `id`, `user-name`, `email-address`, `password` FROM `users` WHERE `user-name` = :inputtedUsername');
        $query->execute([
            ':inputtedUsername' => $inputtedUsername
        ]);

        $data = $query->fetch();

        return $data;

    }


    private function hydrateSingleUser(array $data): User {
        return new User($data['id'], $data['user-name'], $data['password'], new EmailAddress($data['email-address']));
    }

    private function hydrateMultipleUsers(array $data): array
    {
        $users = [];
        foreach ($data as $user) {
            $users[] = new User($user['id'], $user['user-name'], $user['password'], new EmailAddress($user['email-address']));
        }
        return $users;
    }
}