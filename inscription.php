<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "site");
    if (!$conn) {
        die("Échec de la connexion : " . mysqli_connect_error());
    }

    $fullname =  $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $req = "insert into  comptes values('$fullname', '$email', '$password')";

    if (mysqli_query($conn, $req)) {
        echo "<script>
                alert('Inscription réussie !');
                window.location.href = 'login.html';
              </script>";
    } else {
        $error = mysqli_error($conn);
        echo "<script>
                alert('Échec : $error');
                window.location.href = 'inscription.html';
              </script>";
    }

    mysqli_close($conn);
} else {
    header("Location: inscription.html");
    exit;
}
?>
