<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "site");
    if (!$conn) {
        die("Échec de la connexion : " . mysqli_connect_error());
    }
    $email =  $_POST['email'];
    $password = $_POST['password'];

    $query = "select * from comptes where email='$email' and password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
                echo "<script>
                alert('Connexion réussie !');
                window.location.href = 'passer_commande.html';
              </script>";
    } else {
        echo "<script>
                alert('Email ou mot de passe incorrect.');
                window.location.href = 'login.html';
              </script>";
    }

    mysqli_close($conn);
} else {
        header("Location: login.html");
    exit;
}
?>
