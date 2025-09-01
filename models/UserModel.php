<?php
class UserModel {
    private $conn;
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // -------- Admin --------
    public function findAdminByCredentials($adminId, $passwordPlain) {
        $sql = "SELECT * FROM Admin WHERE admin_id=? AND password=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $adminId, $passwordPlain);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;
    }

    // -------- Users --------
    public function userIdExists($userId) {
        $sql = "SELECT user_id FROM Users WHERE user_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function emailExists($email) {
        $sql = "SELECT email FROM Users WHERE email=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function createUser($userId, $name, $email, $phone, $passwordPlain, $userType, $address, $nidNullable) {
        $sql = "INSERT INTO Users (user_id, name, email, phone, password, user_type, address, nid)
                VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssssss", $userId, $name, $email, $phone, $passwordPlain, $userType, $address, $nidNullable);
        return $stmt->execute();
    }

    public function findUserById($userId) {
        $sql = "SELECT * FROM Users WHERE user_id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $userId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc() ?: null;

    }


    // public function findUserByCredentials($userId, $passwordPlain) {
    //     $sql = "SELECT * FROM Users WHERE user_id=? AND password=?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bind_param("ss", $userId, $passwordPlain);
    //     $stmt->execute();
    //     return $stmt->get_result()->fetch_assoc() ?: null;
    // }

}
?>
