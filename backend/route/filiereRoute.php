<?php
require_once "../controller/filiereController.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            getFiliereByIdAPI($_GET['id']);
        } else {
            getAllFilieresAPI();
        }
        break;

    case 'POST':
        createFiliereAPI();
        break;

    case 'PUT':
        if (isset($_GET['id'])) {
            updateFiliereAPI($_GET['id']);
        } else {
            jsonResponse(['error' => 'ID is required for update'], 400);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            deleteFiliereAPI($_GET['id']);
        } else {
            jsonResponse(['error' => 'ID is required for deletion'], 400);
        }
        break;

    default:
        jsonResponse(['error' => 'Method not allowed'], 405);
        break;
}