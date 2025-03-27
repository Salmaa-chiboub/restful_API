<?php
require_once "../config/db.php";

function getAllEnseignants() {
    $conn = getConnection();
    $query = "SELECT * FROM enseignant";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getEnseignantByCNI($cni) {
    $conn = getConnection();
    $query = "SELECT * FROM enseignant WHERE CNI = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $cni);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function createEnseignant($data) {
    $conn = getConnection();
    $query = "INSERT INTO enseignant (CNI, nom, prenom, email, tele, date_naissance, lieu_naissance, sexe, ville, pays, role, id_departement, date_debut_travail) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssssis", 
        $data['CNI'], $data['nom'], $data['prenom'], $data['email'], $data['tele'], 
        $data['date_naissance'], $data['lieu_naissance'], $data['sexe'], $data['ville'], 
        $data['pays'], $data['role'], $data['id_departement'], $data['date_debut_travail']
    );
    return mysqli_stmt_execute($stmt);
}

function updateEnseignant($cni, $data) {
    $conn = getConnection();
    $query = "UPDATE enseignant SET nom=?, prenom=?, email=?, tele=?, date_naissance=?, 
              lieu_naissance=?, sexe=?, ville=?, pays=?, role=?, id_departement=?, date_debut_travail=?
              WHERE CNI=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssssis", 
        $data['nom'], $data['prenom'], $data['email'], $data['tele'], $data['date_naissance'], 
        $data['lieu_naissance'], $data['sexe'], $data['ville'], $data['pays'], 
        $data['role'], $data['id_departement'], $data['date_debut_travail'], $cni
    );
    return mysqli_stmt_execute($stmt);
}

function deleteEnseignant($cni) {
    $conn = getConnection();
    $query = "DELETE FROM enseignant WHERE CNI=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $cni);
    return mysqli_stmt_execute($stmt);
}
?>
