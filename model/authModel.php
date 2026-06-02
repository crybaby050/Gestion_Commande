<?php
require_once ROOT."/config/config.php";

function createUser($nom, $prenom, $email, $password, $role = 'user'){
    $sql = "INSERT INTO users (nom, prenom, email, password, role) 
            VALUES (:nom, :prenom, :email, :password, :role)";
    $data = [
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'password' => $password,
        'role' => $role
    ];
    return executeUpdate($sql, $data);
}

function getUserByEmail($email){
    $sql = "SELECT * FROM users WHERE email = :email";
    $data = ['email' => $email];
    return executeSelect($sql, $data, true);
}

function emailExiste($email){
    $sql = "SELECT COUNT(*) as total FROM users WHERE email = :email";
    $result = executeSelect($sql, ['email' => $email], true);
    return $result['total'] > 0;
}
?>