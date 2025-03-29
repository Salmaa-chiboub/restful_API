<?php
require_once "../config/db.php";

// Get all filieres
function getAllFilieres() {
    $conn = getConnection();
    $sql = "SELECT * FROM filiere";
    $result = mysqli_query($conn, $sql);

    $filieres = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $filieres[] = $row;
    }

    mysqli_close($conn);
    return $filieres;
}

// Get filiere by ID
function getFiliereById($id) {
    $conn = getConnection();

    if (!$conn) {
        return ["error" => "Database connection error"];
    }

    $id = mysqli_real_escape_string($conn, $id);
    $sql = "SELECT * FROM filiere WHERE id_filiere = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $filiere = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);
        return $filiere;
    } else {
        mysqli_close($conn);
        return ["error" => "No filiere found with this ID"];
    }
}

// Insert filiere
function insertFiliere($nom_filiere, $id_chef_filiere, $id_dep, $niveau) {
    $conn = getConnection();
    
    $nom_filiere = mysqli_real_escape_string($conn, $nom_filiere);
    $id_chef_filiere = mysqli_real_escape_string($conn, $id_chef_filiere);
    $id_dep = mysqli_real_escape_string($conn, $id_dep);
    $niveau = mysqli_real_escape_string($conn, $niveau);

    $sql = "INSERT INTO filiere (nom_filiere, id_chef_filiere, id_dep, niveau) 
            VALUES ('$nom_filiere', '$id_chef_filiere', '$id_dep', '$niveau')";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

// Update filiere
function updateFiliere($id_filiere, $nom_filiere, $id_chef_filiere, $id_dep, $niveau) {
    $conn = getConnection();
    
    $id_filiere = mysqli_real_escape_string($conn, $id_filiere);
    $nom_filiere = mysqli_real_escape_string($conn, $nom_filiere);
    $id_chef_filiere = mysqli_real_escape_string($conn, $id_chef_filiere);
    $id_dep = mysqli_real_escape_string($conn, $id_dep);
    $niveau = mysqli_real_escape_string($conn, $niveau);

    $sql = "UPDATE filiere 
            SET nom_filiere = '$nom_filiere', 
                id_chef_filiere = '$id_chef_filiere', 
                id_dep = '$id_dep', 
                niveau = '$niveau' 
            WHERE id_filiere = '$id_filiere'";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

// Delete filiere
function deleteFiliere($id) {
    $conn = getConnection();
    $id = mysqli_real_escape_string($conn, $id);

    $sql = "DELETE FROM filiere WHERE id_filiere = '$id'";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
    return $result;
}
?>