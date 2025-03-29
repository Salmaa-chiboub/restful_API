<?php
require_once "../config/db.php";

function getAllAdmins() {
    $conn = getConnection();
    $query = "SELECT * FROM admin";
    $result = mysqli_query($conn, $query);
    $admins = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($conn);
    return $admins;
}

function getAdminByCNI($cni) {
    $conn = getConnection();
    $cni = mysqli_real_escape_string($conn, $cni);
    $query = "SELECT * FROM admin WHERE CNI = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $cni);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $admin = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $admin;
}

function createAdmin($data) {
    $conn = getConnection();
    
    // Validate required fields
    $required_fields = ['CNI', 'nom', 'prenom', 'email', 'tele', 'date_naissance', 
                       'lieu_naissance', 'sexe', 'ville', 'pays', 'date_debut_travail'];
    foreach ($required_fields as $field) {
        if (!isset($data[$field]) || empty($data[$field])) {
            return false;
        }
    }

    // Sanitize inputs
    foreach ($data as $key => $value) {
        $data[$key] = mysqli_real_escape_string($conn, $value);
    }

    $query = "INSERT INTO admin (CNI, nom, prenom, email, tele, date_naissance, 
              lieu_naissance, sexe, ville, pays, date_debut_travail) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssss", 
        $data['CNI'], $data['nom'], $data['prenom'], $data['email'], $data['tele'], 
        $data['date_naissance'], $data['lieu_naissance'], $data['sexe'], $data['ville'], 
        $data['pays'], $data['date_debut_travail']
    );
    $result = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $result;
}

function updateAdmin($cni, $data) {
    $conn = getConnection();
    
    // Validate CNI
    if (empty($cni)) {
        return false;
    }

    // Sanitize inputs
    $cni = mysqli_real_escape_string($conn, $cni);
    foreach ($data as $key => $value) {
        $data[$key] = mysqli_real_escape_string($conn, $value);
    }

    $query = "UPDATE admin SET nom=?, prenom=?, email=?, tele=?, date_naissance=?, 
              lieu_naissance=?, sexe=?, ville=?, pays=?, date_debut_travail=?
              WHERE CNI=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sssssssssss", 
        $data['nom'], $data['prenom'], $data['email'], $data['tele'], $data['date_naissance'], 
        $data['lieu_naissance'], $data['sexe'], $data['ville'], $data['pays'], 
        $data['date_debut_travail'], $cni
    );
    $result = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $result;
}

function deleteAdmin($cni) {
    $conn = getConnection();
    
    // Validate CNI
    if (empty($cni)) {
        return false;
    }

    $cni = mysqli_real_escape_string($conn, $cni);
    $query = "DELETE FROM admin WHERE CNI=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $cni);
    $result = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $result;
}
?>
