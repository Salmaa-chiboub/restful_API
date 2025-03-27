<?php
require_once "../config/db.php";

 //get All etudiant 
function getAllEtudiants() {
    $conn = getConnection();
    $sql = "SELECT * FROM etudiant";
    $result = mysqli_query($conn, $sql);

    $etudiants = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $etudiants[] = $row;
    }

    mysqli_close($conn);

    
    return $etudiants;
}


 //get etudiant by CNE
function getEtudiantByCNE($cne) {
    $conn = getConnection(); // Connexion à la base de données

    if (!$conn) {
        return ["error" => "Erreur de connexion à la base de données"];
    }

    // Sécuriser le CNE contre les injections SQL
    $cne = mysqli_real_escape_string($conn, $cne);
    
    $sql = "SELECT * FROM etudiant WHERE CNE = '$cne'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $etudiant = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);
        return $etudiant;
    } else {
        mysqli_close($conn);
        return ["error" => "Aucun étudiant trouvé avec ce CNE"];
    }
}

//insert etudiant
function insertEtudiant($CNE, $nom, $prenom, $email, $tele, $sexe, $pays, $ville, $date_naissance, $lieu_naissance, $coordonne_parental, $id_filiere, $date_inscription) {
    $conn = getConnection();
    
    // Échapper toutes les variables pour prévenir les injections SQL
    $CNE = mysqli_real_escape_string($conn, $CNE);
    $nom = mysqli_real_escape_string($conn, $nom);
    $prenom = mysqli_real_escape_string($conn, $prenom);
    $email = mysqli_real_escape_string($conn, $email);
    $tele = mysqli_real_escape_string($conn, $tele);
    $sexe = mysqli_real_escape_string($conn, $sexe);
    $pays = mysqli_real_escape_string($conn, $pays);
    $ville = mysqli_real_escape_string($conn, $ville);
    $date_naissance = mysqli_real_escape_string($conn, $date_naissance);
    $lieu_naissance = mysqli_real_escape_string($conn, $lieu_naissance);
    $coordonne_parental = mysqli_real_escape_string($conn, $coordonne_parental);
    $id_filiere = mysqli_real_escape_string($conn, $id_filiere);
    $date_inscription = mysqli_real_escape_string($conn, $date_inscription);

    $sql = "INSERT INTO etudiant (CNE, nom, prenom, email, tele, sexe, pays, ville, date_naissance, lieu_naissance, coordonne_parental, id_filiere, date_inscription) 
            VALUES ('$CNE', '$nom', '$prenom', '$email', '$tele', '$sexe', '$pays', '$ville', '$date_naissance', '$lieu_naissance', '$coordonne_parental', '$id_filiere', '$date_inscription')";
    
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

//update etudiant's details
function updateEtudiant($CNE, $nom, $prenom, $email, $tele, $sexe, $pays, $ville, $date_naissance, $lieu_naissance, $coordonne_parental, $id_filiere, $date_inscription) {
    $conn = getConnection();
    
    // Échapper toutes les variables pour prévenir les injections SQL
    $CNE = mysqli_real_escape_string($conn, $CNE);
    $nom = mysqli_real_escape_string($conn, $nom);
    $prenom = mysqli_real_escape_string($conn, $prenom);
    $email = mysqli_real_escape_string($conn, $email);
    $tele = mysqli_real_escape_string($conn, $tele);
    $sexe = mysqli_real_escape_string($conn, $sexe);
    $pays = mysqli_real_escape_string($conn, $pays);
    $ville = mysqli_real_escape_string($conn, $ville);
    $date_naissance = mysqli_real_escape_string($conn, $date_naissance);
    $lieu_naissance = mysqli_real_escape_string($conn, $lieu_naissance);
    $coordonne_parental = mysqli_real_escape_string($conn, $coordonne_parental);
    $id_filiere = mysqli_real_escape_string($conn, $id_filiere);
    $date_inscription = mysqli_real_escape_string($conn, $date_inscription);

    // Mettre à jour les données de l'étudiant
    $sql = "UPDATE etudiant 
            SET nom = '$nom', prenom = '$prenom', email = '$email', tele = '$tele', sexe = '$sexe', 
                pays = '$pays', ville = '$ville', date_naissance = '$date_naissance', 
                lieu_naissance = '$lieu_naissance', coordonne_parental = '$coordonne_parental', 
                id_filiere = '$id_filiere', date_inscription = '$date_inscription' 
            WHERE CNE = '$CNE'";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}


//delete etudiant
function deleteEtudiantByCNE($CNE) {
    $conn = getConnection();
    $CNE = mysqli_real_escape_string($conn, $CNE);

    $sql = "DELETE FROM etudiant WHERE CNE = '$CNE'";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
    return $result;
}
?>
