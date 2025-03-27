<?php
require_once "../model/adminModel.php";
require_once "../utils/response.php";

function getAllAdminsAPI() {
    $admins = getAllAdmins();
    jsonResponse($admins);
}

function getAdminByCNIAPI($cni) {
    $admin = getAdminByCNI($cni);
    if ($admin) {
        jsonResponse($admin);
    } else {
        jsonResponse(['error' => 'Admin non trouvé'], 404);
    }
}

function createAdminAPI() {
    $data = json_decode(file_get_contents("php://input"), true);
    if (createAdmin($data)) {
        jsonResponse(['message' => 'Admin créé avec succès']);
    } else {
        jsonResponse(['error' => 'Erreur lors de la création'], 500);
    }
}

function updateAdminAPI($cni) {
    $data = json_decode(file_get_contents("php://input"), true);
    if (updateAdmin($cni, $data)) {
        jsonResponse(['message' => 'Admin mis à jour avec succès']);
    } else {
        jsonResponse(['error' => 'Erreur lors de la mise à jour'], 500);
    }
}

function deleteAdminAPI($cni) {
    if (deleteAdmin($cni)) {
        jsonResponse(['message' => 'Admin supprimé avec succès']);
    } else {
        jsonResponse(['error' => 'Erreur lors de la suppression'], 500);
    }
}
?>
