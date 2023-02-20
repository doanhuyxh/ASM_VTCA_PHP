<?php 
class adminModel extends Model {

    public function GetAdmin($username, $password) {
        $stmt = $this->connection->prepare('SELECT username, password from admin WHERE username = :username AND password = :password');
        $stmt->execute(array('username' => $username, 'password'=> $password));
        $result = $stmt->fetch();
        return [$result['username'], $result['password']];
    }
}
?>