<?php
require_once "../utils/response.php";
require_once "../controller/adminController.php";

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$method = $_SERVER['REQUEST_METHOD'];
$cni = isset($_GET['cni']) ? $_GET['cni'] : null;

try {
    switch ($method) {
        case 'GET':
            if ($cni) {
                getAdminByCNIAPI($cni);
            } else {
                getAllAdminsAPI();
            }
            break;

        case 'POST':
            createAdminAPI();
            break;

        case 'PUT':
            if ($cni) {
                updateAdminAPI($cni);
            } else {
                jsonResponse(['error' => 'CNI parameter is required'], 400);
            }
            break;

        case 'DELETE':
            if ($cni) {
                deleteAdminAPI($cni);
            } else {
                jsonResponse(['error' => 'CNI parameter is required'], 400);
            }
            break;

        default:
            jsonResponse(['error' => 'Method not allowed'], 405);
            break;
    }
} catch (Exception $e) {
    jsonResponse(['error' => 'Internal server error'], 500);
}
?>
