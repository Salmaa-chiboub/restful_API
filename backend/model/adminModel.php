<?php
require_once "../config/db.php";

function getAllAdmins() {
    $conn = getConnection();
    $query = "SELECT * FROM admin";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getAdminByCNI($cni) {
    $conn = getConnection();
    $query = "SELECT * FROM admin WHERE CNI = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $cni);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function createAdmin($data) {
    $conn = getConnection();
    $query = "INSERT INTO admin (CNI, nom, prenom, email, tele, date_naissance, lieu_naissance, sexe, ville, pays, date_debut_travail) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssss", 
        $data['CNI'], $data['nom'], $data['prenom'], $data['email'], $data['tele'], 
        $data['date_naissance'], $data['lieu_naissance'], $data['sexe'], $data['ville'], 
        $data['pays'], $data['date_debut_travail']
    );
    return mysqli_stmt_execute($stmt);
}

function updateAdmin($cni, $data) {
    $conn = getConnection();
    $query = "UPDATE admin SET nom=?, prenom=?, email=?, tele=?, date_naissance=?, 
              lieu_naissance=?, sexe=?, ville=?, pays=?, date_debut_travail=?
              WHERE CNI=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssss", 
        $data['nom'], $data['prenom'], $data['email'], $data['tele'], $data['date_naissance'], 
        $data['lieu_naissance'], $data['sexe'], $data['ville'], $data['pays'], 
        $data['date_debut_travail'], $cni
    );
    return mysqli_stmt_execute($stmt);
}

function deleteAdmin($cni) {
    $conn = getConnection();
    $query = "DELETE FROM admin WHERE CNI=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $cni);
    return mysqli_stmt_execute($stmt);
}
?>
