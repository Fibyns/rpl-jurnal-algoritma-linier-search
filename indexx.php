<?php 
    include "conec.php"; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pemesanan Tiket Bioskop</title>
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <style>
            body {
                height: 100%;
                background-color: #222d32 !important;
                padding-top: 65px;
                padding-bottom: 15px;
            }

            .container {
                max-width: 630.3px;
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
            <h1 class="text-center">Pemesanan Tiket Bioskop</h1>
            <form id="bookingForm" method="post">
                <div class="form-group">
                    <label for="movie">Film</label>
                    <select class="form-control" id="movie" name="movie" required>
                    <option value="">Pilih Film</option>
                    <option value="Titanic">Titanic</option>
                    <option value="Jurassic Park">Jurassic Park</option>
                    <option value="The Lion King">The Lion King</option>
                    <option value="Avatar">Avatar</option>
                    <option value="Frozen">Frozen</option>
                    <option value="Black Panther">Black Panther</option>
                    <option value="Joker">Joker</option>
                    <option value="Toy Story">Toy Story</option>
                    <option value="Finding Nemo">Finding Nemo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="seats">Jumlah Tiket</label>
                    <input type="number" class="form-control" id="seats" name="seats" min="1" placeholder="Masukkan Jumlah Tiket" required>
                </div>
                <div class="form-group">
                    <label for="totalPrice">Total Harga</label>
                    <input type="text" class="form-control" id="totalPrice" name="totalPrice" placeholder="Total Harga" readonly>
                </div>
                <div class="form-group">
                    <label for="transactionNumber">Nomor Transaksi</label>
                    <input type="text" class="form-control" id="transactionNumber" name="transactionNumber" placeholder="Kode Transaksi" readonly>
                </div>
                <button type="button" onclick="copyTransactionNumber()" class="btn btn-outline-secondary">Salin</button>
                <button type="button" class="btn btn-outline-primary" onclick="calculateTotal()">Hitung Total</button>
                <button type="button" id="bookingButton" type="submit" class="btn btn-outline-warning" disabled onclick="submitForm()">Pesan Tiket</button>
                <a href="pencarian.php" class="btn btn-outline-success">Pencarian Tiket Bioskop</a>
                <a href="logout.php" class="btn btn-outline-danger">Log Out</a>
            </form>
            <div id="summary" class="mt-4"></div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script>
            function generateTransactionNumber() {
                const randomNumber = Math.floor(Math.random() * 1000);  // Angka acak antara 0 dan 999
                const transactionNumber = `TRX${randomNumber}`;  // Menggabungkan angka acak
                document.getElementById('transactionNumber').value = transactionNumber;
            }

            function calculateTotal() {
                const movie = document.getElementById('movie').value;
                const seats = document.getElementById('seats').value;
                let totalPrice = 0;

                switch (movie) {
                    case 'Titanic':
                        totalPrice = seats * 50000;
                        break;
                    case 'Jurassic Park':
                        totalPrice = seats * 60000;
                        break;
                    case 'The Lion King':
                        totalPrice = seats * 55000;
                        break;
                    case 'Avatar':
                        totalPrice = seats * 45000;
                        break;
                    case 'Frozen':
                        totalPrice = seats * 50000;
                        break;
                    case 'Black Panther':
                        totalPrice = seats * 55000;
                        break;
                    case 'Joker':
                        totalPrice = seats * 45000;
                        break;
                    case 'Toy Story':
                        totalPrice = seats * 40000;
                        break;
                    case 'Finding Nemo':
                        totalPrice = seats * 45000;
                        break;
                    default:
                        break;
                }

                document.getElementById('totalPrice').value = totalPrice.toLocaleString('id-ID');
                enableBookingButton(); // Aktifkan tombol pesan tiket setelah perhitungan total

                const transactionNumber = generateTransactionNumber();
                document.getElementById('transactionNumber').value = transactionNumber;

                enableBookingButton(); // Aktifkan tombol pesan tiket setelah perhitungan total
            }

            function submitForm() {
                generateTransactionNumber();

                const movie = document.getElementById('movie').value;
                const seats = document.getElementById('seats').value;
                const totalPrice = document.getElementById('totalPrice').value.replace(/\./g, ''); // Remove dots
                const transactionNumber = document.getElementById('transactionNumber').value;
                const formattedTotalPrice = parseInt(totalPrice).toLocaleString('id-ID');
                const summary = `
                    <center><h4><b>Ringkasan Pemesanan Tiket</b></h4></center>
                    <p></p>
                    <p><strong>Nomor Transaksi:</strong> ${transactionNumber}</p>
                    <p><strong>Film:</strong> ${movie}</p>
                    <p><strong>Jumlah Tiket:</strong> ${seats}</p>
                    <p><strong>Total Harga:</strong> Rp ${totalPrice.toLocaleString('id-ID')}</p>
                `;

                document.getElementById('summary').innerHTML = summary;
                document.getElementById('summary').style.display = 'block';

                $.ajax({
                    url: 'submit.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        movie: movie,
                        seats: seats,
                        totalPrice: totalPrice,
                        transactionNumber: transactionNumber
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            const summary = `
                                <center><h4><b>Ringkasan Pemesanan Tiket</b></h4></center>
                                <p></p>
                                <p><strong>Nomor Transaksi:</strong> ${transactionNumber}</p>
                                <p><strong>Film:</strong> ${movie}</p>
                                <p><strong>Jumlah Tiket:</strong> ${seats}</p>
                                <p><strong>Total Harga:</strong> Rp ${totalPrice.toLocaleString('id-ID')}</p>
                            `;

                            document.getElementById('summary').innerHTML = summary;
                            document.getElementById('summary').style.display = 'block';
                        } else {
                            alert(response.message);
                        }
                    },
                    /*error: function() {
                        alert("Terjadi kesalahan saat mengirim data. Silakan coba lagi.");
                    }*/
                });
            }
            function copyTransactionNumber() {
                const transactionNumber = document.getElementById('transactionNumber');

                // Select the text inside the input
                transactionNumber.select();
                transactionNumber.setSelectionRange(0, 99999); // For mobile devices

                // Copy the selected text
                document.execCommand('copy');

                // Deselect the input
                window.getSelection().removeAllRanges();

                // Optional: Give feedback to the user
                alert('Nomor transaksi telah disalin: ' + transactionNumber.value);
            }
            function enableBookingButton() {
                const bookingButton = document.getElementById('bookingButton');
                bookingButton.disabled = false; // Aktifkan tombol
                bookingButton.addEventListener('click', submitBooking); // Tambahkan event listener
            }
            function submitBooking() {
                document.getElementById('bookingForm').submit(); // Kirim formulir
            }
            function enableBookingButton() {
                const bookingButton = document.getElementById('bookingButton');
                bookingButton.disabled = false; // Aktifkan tombol
            }
        </script>
        <!--<button type="button" class="btn btn-success" onclick="submitForm()" disabled>Pesan Tiket</button>-->
    </body>
</html>
fiby naya sari FIX