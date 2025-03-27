<?php
require_once "../model/etudiantModel.php";
require_once "../utils/response.php";



// Afficher tous les étudiants 
function getAllEtudiantsAPI() {
    $etudiants = getAllEtudiants();
    
    if (isset($etudiants['error'])) {
        jsonResponse(['error' => $etudiants['error']], 404);
    }
    
    jsonResponse(['data' => $etudiants], 200);
}

// Afficher un étudiant par CNE 
function getEtudiantByCNEAPI($cne) {
    $etudiant = getEtudiantByCNE($cne);
    
    if (isset($etudiant['error'])) {
        jsonResponse(['error' => $etudiant['error']], 404);
    }
    
    jsonResponse(['data' => $etudiant], 200);
}

// Créer un nouvel étudiant 
function createEtudiantAPI() {
    // Récupérer les données POST au format JSON
    $json = file_get_contents("php://input");
    error_log("JSON reçu : " . $json);
    $data = json_decode($json, true);

    // Validation des données
    if (!$data) {
        error_log("Erreur de décodage JSON : " . json_last_error_msg());
        jsonResponse(['error' => 'Donnees JSON invalides'], 400);
    }

    $requiredFields = ['CNE', 'nom', 'prenom', 'email', 'tele', 'sexe', 'pays', 'ville', 
                     'date_naissance', 'lieu_naissance', 'coordonne_parental', 'id_filiere', 'date_inscription'];
    
    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            jsonResponse(['error' => "Le champ $field est obligatoire"], 400);
        }
    }
    
    // Appel au modèle
    $result = insertEtudiant(
        $data['CNE'],
        $data['nom'],
        $data['prenom'],
        $data['email'],
        $data['tele'],
        $data['sexe'],
        $data['pays'],
        $data['ville'],
        $data['date_naissance'],
        $data['lieu_naissance'],
        $data['coordonne_parental'],
        $data['id_filiere'],
        $data['date_inscription']
    );
    
    if ($result) {
        jsonResponse(['message' => 'Étudiant créé avec succès', 'CNE' => $data['CNE']], 201);
    } else {
        jsonResponse(['error' => 'Erreur lors de la création de l\'étudiant'], 500);
    }
}


// Mettre à jour un étudiant
function updateEtudiantAPI($cne) {
    // Récupérer les données POST au format JSON
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    // Validation des données
    if (!$data) {
        jsonResponse(['error' => 'Données JSON invalides'], 400);
    }

    // Les champs requis pour la mise à jour
    $requiredFields = ['nom', 'prenom', 'email', 'tele', 'sexe', 'pays', 'ville', 
                       'date_naissance', 'lieu_naissance', 'coordonne_parental', 'id_filiere', 'date_inscription'];
    
    foreach ($requiredFields as $field) {
        if (empty($data[$field])) {
            jsonResponse(['error' => "Le champ $field est obligatoire"], 400);
        }
    }

    // Appel au modèle pour mettre à jour l'étudiant
    $result = updateEtudiant(
        $cne, // Utilisation du CNE pour identifier l'étudiant à mettre à jour
        $data['nom'],
        $data['prenom'],
        $data['email'],
        $data['tele'],
        $data['sexe'],
        $data['pays'],
        $data['ville'],
        $data['date_naissance'],
        $data['lieu_naissance'],
        $data['coordonne_parental'],
        $data['id_filiere'],
        $data['date_inscription']
    );

    if ($result) {
        jsonResponse(['message' => 'Les informations de l\'étudiant ont été mises à jour avec succès'], 200);
    } else {
        jsonResponse(['error' => 'Erreur lors de la mise à jour des informations de l\'étudiant'], 500);
    }
}

// Supprimer un étudiant 
function deleteEtudiantAPI($cne) {
    // Vérifier d'abord si l'étudiant existe
    $etudiant = getEtudiantByCNE($cne);
    
    if (isset($etudiant['error'])) {
        jsonResponse(['error' => $etudiant['error']], 404);
    }
    
    $result = deleteEtudiantByCNE($cne);
    
    if ($result) {
        jsonResponse(['message' => 'Étudiant supprimé avec succès'], 200);
    } else {
        jsonResponse(['error' => 'Erreur lors de la suppression de l\'étudiant'], 500);
    }
}