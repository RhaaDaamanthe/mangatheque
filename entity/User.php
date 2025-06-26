<?php
class User {
    private int $id = 12;
    private string $pseudo = 'toto';
    private string $email = 'toto@gmail.com';
    private string $password = '123456';
    private DateTimeImmutable $created_at;

    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id) : void{
        $this->id = $id;
    }

    public function getPseudo() : string {
        return $this->pseudo;
    }

    public function setPseudo(int $pseudo) : void{
        $this->pseudo = $pseudo;
    }

    public function getEmail() : string{
        return $this->email;
    }

    public function setEmail(int $email) : void{
        $this->email = $email;
    }

    public function getPassword() : string{
        return $this->password;
    }

    public function setPassword(int $password) : void{
        $this->password = $password;
    }

    public function getCreated_at() : DateTimeImmutable{
        return $this->created_at;
    }
}

$user = new User();

echo $user->getId() . '<br>';

$user->setId(25);

echo $user->getId() . '<br>';