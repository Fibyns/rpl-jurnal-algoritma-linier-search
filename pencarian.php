<?php 
    include "conec.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pencarian Pemesanan Tiket Bioskop</title>
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="style.css">
        <style>
            body {
                height: 100%;
                background-color: #222d32 !important;
                padding-top: 75px;
                padding-bottom: 20px;
            }

            .container {
                max-width: 600px;
                height: auto;
                margin: 0 auto;
                padding: 30px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                background: #1a2226;
                color: #fff;
                border-radius: 10px;
                grid-template-columns: max-content 1fr;
                gap: 10px;
            }

            .text-center{
                font-weight: 800;
                padding-top: 5px;
                padding-bottom: 20px;
            }

            .form-control{
                border-radius: 10px;
                margin-bottom: 25px;
            }

            .btn{
                transform: translateY(10px);
                border-radius: 10px !important;
            }

            #summary {
                background-color: #222d32; /* Warna latar belakang */
                color: #fff; /* Warna teks */
                border-radius: 4px;
                padding: 10px;
                display: none;
                border-radius: 4px;
                padding: 10px;
                margin-top: 20px;
                gap: 90px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1 class="text-center">Pencarian Pemesanan Tiket Bioskop</h1>
            <form method="post" action="pencarian.php">
                <div class="form-group">
                    <label for="transactionNumber">Nomor Transaksi:</label>
                    <input type="text" class="form-control" id="transactionNumber" name="transactionNumber" placeholder="Masukkan nomor transaksi" required>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success btn-block">Cari</button>
                    </div>
                    <div class="col">
                        <a href="indexx.php" class="btn btn-primary btn-block">Pemesanan Tiket</a>
                    </div>
                    <div class="col">
                        <a href="logout.php" class="btn btn-outline-secondary btn-block">Log Out</a>
                    </div>
                </div>
            </form>
            <div id="result" class="result mt-4">
                <?php
                    /*function linearSearch($array, $key) {
                        foreach ($array as $element) {
                            if ($element['transactionNumber'] === $key) {
                                return $element;
                            }
                        }
                        return null;
                    }
                    // Fungsi untuk mendapatkan semua data pemesanan dari database
                    function getAllBookings() {
                        global $conn;
                        $sql = "SELECT * FROM bioskop";
                        $result = $conn->query($sql);
                    
                        $bookings = [];
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $bookings[] = $row;
                            }
                        }
                    
                        return $bookings;
                    }
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $transactionNumber = $_POST['transactionNumber'];

                        // Gunakan parameter binding untuk mencegah SQL Injection
                        $sql = "SELECT * FROM bioskop WHERE transactionNumber=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $transactionNumber);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<div>
                                        <p><strong>Detail Pemesanan:</strong></p>
                                        <p><strong>Nomor Transaksi:</strong> " . htmlspecialchars($row['transactionNumber']) . "</p>
                                        <p><strong>Film:</strong> " . htmlspecialchars($row['movie']) . "</p>
                                        <p><strong>Jumlah Tiket:</strong> " . htmlspecialchars($row['seats']) . "</p>
                                        <p><strong>Total Harga:</strong> Rp " . number_format($row['totalPrice'], 0, '.', '.') . "</p>
                                    </div>";
                            }
                        } else {
                            echo "<p class='text-danger'>Pemesanan dengan nomor transaksi " . htmlspecialchars($transactionNumber) . " tidak ditemukan.</p>";
                        }

                        $stmt->close();
                        $conn->close();
                    }*/

                    // Fungsi untuk melakukan linear search di dalam array PHP
                    function linearSearch($array, $key) {
                        foreach ($array as $element) {
                            if ($element['transactionNumber'] === $key) {
                                return $element;
                            }
                        }
                        return null;
                    }

                    // Fungsi untuk mendapatkan semua data pemesanan dari database
                    function getAllBookings() {
                        global $conn;
                        $sql = "SELECT * FROM bioskop";
                        $result = $conn->query($sql);

                        $bookings = [];
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $bookings[] = $row;
                            }
                        }

                        return $bookings;
                    }

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $transactionNumber = $_POST['transactionNumber'];

                        // Panggil fungsi untuk mendapatkan semua pemesanan
                        $bookings = getAllBookings();

                        // Lakukan linear search di array $bookings
                        $booking = linearSearch($bookings, $transactionNumber);

                        if ($booking) {
                            // Jika ditemukan, tampilkan detail pemesanan
                            echo "<div>
                                    <p><strong>Detail Pemesanan:</strong></p>
                                    <p><strong>Nomor Transaksi:</strong> " . htmlspecialchars($booking['transactionNumber']) . "</p>
                                    <p><strong>Film:</strong> " . htmlspecialchars($booking['movie']) . "</p>
                                    <p><strong>Jumlah Tiket:</strong> " . htmlspecialchars($booking['seats']) . "</p>
                                    <p><strong>Total Harga:</strong> Rp " . number_format($booking['totalPrice'], 0, '.', '.') . "</p>
                                </div>";
                        } else {
                            // Jika tidak ditemukan, tampilkan pesan
                            echo "<p class='text-danger'>Pemesanan dengan nomor transaksi " . htmlspecialchars($transactionNumber) . " tidak ditemukan.</p>";
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>