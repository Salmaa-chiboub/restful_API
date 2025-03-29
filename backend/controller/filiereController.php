<?php
require_once "../model/filiereModel.php";
require_once "../utils/response.php";

// Get all filieres
function getAllFilieresAPI() {
    $filieres = getAllFilieres();
    
    if (isset($filieres['error'])) {
        jsonResponse(['error' => $filieres['error']], 404);
    }
    
    jsonResponse(['data' => $filieres], 200);
}

// Get filiere by ID
function getFiliereByIdAPI($id) {
    $filiere = getFiliereById($id);
    
    if (isset($filiere['error'])) {
        jsonResponse(['error' => $filiere['error']], 404);
    }
    
    jsonResponse(['data' => $filiere], 200);
}

// Create new filiere
function createFiliereAPI() {
    $json = file_get_contents("php://input");
    error_log("Received JSON: " . $json);
    $data = json_decode($json, true);

    if (!$data) {
        error_log("JSON decode error: " . json_last_error_msg());
        jsonResponse(['error' => 'Invalid JSON data'], 400);
    }

    $requiredFields = ['nom_filiere', 'id_chef_filiere', 'id_dep', 'niveau'];
    
    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            jsonResponse(['error' => "Field $field is required"], 400);
        }
    }
    
    $result = insertFiliere(
        $data['nom_filiere'],
        $data['id_chef_filiere'],
        $data['id_dep'],
        $data['niveau']
    );
    
    if ($result) {
        jsonResponse(['message' => 'Filiere created successfully'], 201);
    } else {
        jsonResponse(['error' => 'Error creating filiere'], 500);
    }
}

// Update filiere
function updateFiliereAPI($id) {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if (!$data) {
        jsonResponse(['error' => 'Invalid JSON data'], 400);
    }

    $requiredFields = ['nom_filiere', 'id_chef_filiere', 'id_dep', 'niveau'];
    
    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            jsonResponse(['error' => "Field $field is required"], 400);
        }
    }

    $result = updateFiliere(
        $id,
        $data['nom_filiere'],
        $data['id_chef_filiere'],
        $data['id_dep'],
        $data['niveau']
    );

    if ($result) {
        jsonResponse(['message' => 'Filiere updated successfully'], 200);
    } else {
        jsonResponse(['error' => 'Error updating filiere'], 500);
    }
}

// Delete filiere
function deleteFiliereAPI($id) {
    $filiere = getFiliereById($id);
    
    if (isset($filiere['error'])) {
        jsonResponse(['error' => $filiere['error']], 404);
    }
    
    $result = deleteFiliere($id);
    
    if ($result) {
        jsonResponse(['message' => 'Filiere deleted successfully'], 200);
    } else {
        jsonResponse(['error' => 'Error deleting filiere'], 500);
    }
}