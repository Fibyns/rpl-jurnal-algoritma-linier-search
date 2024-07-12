<?php
    include "conec.php"; // Sertakan file koneksi ke database
    // Periksa jika pengguna sudah melakukan submit form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buat query untuk memeriksa username dan password di database
    $sql = "SELECT * FROM login WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    // Lakukan eksekusi query
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah ada baris yang cocok
    if ($result->num_rows == 1) {
        // Jika login sukses, arahkan ke halaman index
        header("Location: indexx.php");
        exit(); // Penting untuk menghentikan eksekusi skrip setelah redirect
    } else {
        // Jika login gagal, arahkan kembali ke halaman login dengan pesan error
        header("Location: login.php?error=1");
        exit();
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <div class="global-container">
            <div class="card login-form">
                <div class="card-body">
                    <h1 class="card-title text-center">L O G I N</h1>
                </div>
                <div class="card-text">
                    <form id="loginForm" method="post" action="login.php">
                        <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>