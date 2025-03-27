<?php
require_once "../controller/adminController.php";

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['cni'])) {
            getAdminByCNIAPI($_GET['cni']);
        } else {
            getAllAdminsAPI();
        }
        break;

    case 'POST':
        createAdminAPI();
        break;

    case 'PUT':
        if (isset($_GET['cni'])) {
            updateAdminAPI($_GET['cni']);
        }
        break;

    case 'DELETE':
        if (isset($_GET['cni'])) {
            deleteAdminAPI($_GET['cni']);
        }
        break;

    default:
        jsonResponse(['error' => 'Méthode HTTP non autorisée'], 405);
        break;
}
?>
