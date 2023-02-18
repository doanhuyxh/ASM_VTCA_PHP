<?php
class AuthModel extends Model
{

    public function CheckExit($data)
    {
        $stmt = $this->connection->prepare('SELECT * FROM user WHERE username = :username');

        $stmt->execute(['username' => $data]);

        $result = $stmt->fetch();

        return ($result['username']);
    }

    public function createUser($mail, $user, $pass)
    {
        $stmt = $this->connection->prepare('INSERT INTO user (email, username, password, canceled) values (?, ?, ?, 0)');
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $username);
        $stmt->bindParam(3, $password);        

        $email = $mail;
        $username = $user;
        $password = md5($pass);
        $stmt->execute();
    }

    public function GetUser($username, $password) {
        $stmt = $this->connection->prepare('SELECT username, password from user WHERE username = :username AND password = :password');
        $stmt->execute(array('username' => $username, 'password'=> $password));
        $result = $stmt->fetch();
        echo "123\n";
        print_r($result);
        echo "456";
        die;
        return [$result['username'], $result['password']];
    }
}
