<?php
require_once "../controller/etudiantController.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

$method = $_SERVER['REQUEST_METHOD'];

// Utiliser un switch pour traiter les différentes méthodes HTTP
switch ($method) {
    case 'GET':
        // Vérifier si un CNE est passé dans l'URL
         if (isset($_GET['cne'])) {
            // Route pour obtenir un étudiant par son CNE
            getEtudiantByCNEAPI($_GET['cne']);
        } else {
            // Route pour obtenir tous les étudiants
            getAllEtudiantsAPI();
        }
        break;

    case 'POST':
        // Route pour créer un nouvel étudiant
        createEtudiantAPI();
        break;

    case 'PUT':
        // Vérifier si un CNE est passé dans l'URL pour mettre à jour un étudiant
        if (isset($_GET['cne'])) {
            // Route pour mettre à jour un étudiant par son CNE
            updateEtudiantAPI($_GET['cne']);
        }
        break;

    case 'DELETE':
        // Vérifier si un CNE est passé dans l'URL pour supprimer un étudiant
        if (isset($_GET['cne'])) {
            // Route pour supprimer un étudiant par son CNE
            deleteEtudiantAPI($_GET['cne']);
        }
        break;

    default:
        // Si la méthode n'est pas supportée, renvoyer une erreur
        jsonResponse(['error' => 'Méthode HTTP non autorisée'], 405);
        break;
}
?>