<?php
require_once "../model/enseignantModel.php";
require_once "../utils/response.php";

function getAllEnseignantsAPI() {
    $enseignants = getAllEnseignants();
    jsonResponse($enseignants);
}

function getEnseignantByCNIAPI($cni) {
    $enseignant = getEnseignantByCNI($cni);
    if ($enseignant) {
        jsonResponse($enseignant);
    } else {
        jsonResponse(['error' => 'Enseignant non trouvé'], 404);
    }
}

function createEnseignantAPI() {
    $data = json_decode(file_get_contents("php://input"), true);
    if (createEnseignant($data)) {
        jsonResponse(['message' => 'Enseignant créé avec succès']);
    } else {
        jsonResponse(['error' => 'Erreur lors de la création'], 500);
    }
}

function updateEnseignantAPI($cni) {
    $data = json_decode(file_get_contents("php://input"), true);
    if (updateEnseignant($cni, $data)) {
        jsonResponse(['message' => 'Enseignant mis à jour avec succès']);
    } else {
        jsonResponse(['error' => 'Erreur lors de la mise à jour'], 500);
    }
}

function deleteEnseignantAPI($cni) {
    if (deleteEnseignant($cni)) {
        jsonResponse(['message' => 'Enseignant supprimé avec succès']);
    } else {
        jsonResponse(['error' => 'Erreur lors de la suppression'], 500);
    }
}
?>
