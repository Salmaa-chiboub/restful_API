<?php
function getConnection() {
    $conn = mysqli_connect("localhost", "root", "", "ensah");

    if (!$conn) {
        die(json_encode(["error" => "Erreur de connexion à la base de données"]));
        echo "connection erreur";
    }

    return $conn;
}
?>
