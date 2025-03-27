<?php
require_once "../controller/enseignantController.php";

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['cni'])) {
            getEnseignantByCNIAPI($_GET['cni']);
        } else {
            getAllEnseignantsAPI();
        }
        break;

    case 'POST':
        createEnseignantAPI();
        break;

    case 'PUT':
        if (isset($_GET['cni'])) {
            updateEnseignantAPI($_GET['cni']);
        }
        break;

    case 'DELETE':
        if (isset($_GET['cni'])) {
            deleteEnseignantAPI($_GET['cni']);
        }
        break;

    default:
        jsonResponse(['error' => 'Méthode HTTP non autorisée'], 405);
        break;
}
?>
