<?php
    include "conec.php";
        /* I N D E X */
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $movie = $_POST['movie'];
            $seats = (int) $_POST['seats'];
            $totalPrice = (int) str_replace('.', '', $_POST['totalPrice']);
            $transactionNumber = $_POST['transactionNumber'];

            // Debugging output
            error_log("Received: movie=$movie, seats=$seats, totalPrice=$totalPrice, transactionNumber=$transactionNumber");

            // Prepare SQL statement
            $sql = "INSERT INTO bioskop (transactionNumber, movie, seats, totalPrice) 
                    VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                error_log("Error preparing statement: " . $conn->error);
                echo json_encode(['status' => 'error', 'message' => 'Error preparing statement.']);
            } else {
                // Binding parameters
                $stmt->bind_param("ssii", $transactionNumber, $movie, $seats, $totalPrice);

                // Execute statement
                if ($stmt->execute()) {
                    echo json_encode(['status' => 'success', 'message' => 'Pesanan berhasil disimpan!']);
                } else {
                    error_log("Error executing statement: " . $stmt->error);
                    echo json_encode(['status' => 'error', 'message' => 'Error executing statement.']);
                }
            }

            $stmt->close();
            $conn->close();
        }
?>