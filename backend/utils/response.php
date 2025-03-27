<?php
// En-têtes communs pour les réponses JSON
function setJsonHeaders() {
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
}

// Réponse JSON standardisée
function jsonResponse($data, $statusCode = 200) {
    setJsonHeaders();
    http_response_code($statusCode);
    echo json_encode($data);
    exit();
}

?>