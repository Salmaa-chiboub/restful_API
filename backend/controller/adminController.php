<?php
require_once "../model/adminModel.php";
require_once "../utils/response.php";

function getAllAdminsAPI() {
    try {
        $admins = getAllAdmins();
        if (empty($admins)) {
            jsonResponse(['message' => 'No admins found'], 204);
        }
        jsonResponse($admins);
    } catch (Exception $e) {
        jsonResponse(['error' => 'Failed to fetch admins'], 500);
    }
}

function getAdminByCNIAPI($cni) {
    if (empty($cni)) {
        jsonResponse(['error' => 'CNI is required'], 400);
    }

    try {
        $admin = getAdminByCNI($cni);
        if ($admin) {
            jsonResponse($admin);
        }
        jsonResponse(['error' => 'Admin not found'], 404);
    } catch (Exception $e) {
        jsonResponse(['error' => 'Failed to fetch admin'], 500);
    }
}

function createAdminAPI() {
    $data = json_decode(file_get_contents("php://input"), true);
    
    // Validate required fields
    $required_fields = ['CNI', 'nom', 'prenom', 'email', 'tele', 'date_naissance', 
                       'lieu_naissance', 'sexe', 'ville', 'pays', 'date_debut_travail'];
    
    foreach ($required_fields as $field) {
        if (!isset($data[$field]) || empty($data[$field])) {
            jsonResponse(['error' => "Field '$field' is required"], 400);
        }
    }

    // Validate email format
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        jsonResponse(['error' => 'Invalid email format'], 400);
    }

    try {
        if (createAdmin($data)) {
            jsonResponse(['message' => 'Admin created successfully'], 201);
        }
        jsonResponse(['error' => 'Failed to create admin'], 500);
    } catch (Exception $e) {
        jsonResponse(['error' => 'Failed to create admin'], 500);
    }
}

function updateAdminAPI($cni) {
    if (empty($cni)) {
        jsonResponse(['error' => 'CNI is required'], 400);
    }

    $data = json_decode(file_get_contents("php://input"), true);
    if (empty($data)) {
        jsonResponse(['error' => 'No data provided for update'], 400);
    }

    try {
        if (updateAdmin($cni, $data)) {
            jsonResponse(['message' => 'Admin updated successfully']);
        }
        jsonResponse(['error' => 'Admin not found or no changes made'], 404);
    } catch (Exception $e) {
        jsonResponse(['error' => 'Failed to update admin'], 500);
    }
}

function deleteAdminAPI($cni) {
    if (empty($cni)) {
        jsonResponse(['error' => 'CNI is required'], 400);
    }

    try {
        if (deleteAdmin($cni)) {
            jsonResponse(['message' => 'Admin deleted successfully']);
        }
        jsonResponse(['error' => 'Admin not found'], 404);
    } catch (Exception $e) {
        jsonResponse(['error' => 'Failed to delete admin'], 500);
    }
}
?>
