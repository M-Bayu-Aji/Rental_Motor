<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Rental Motor</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Rental Motor</h1>
        <form action="" method="post" class="mt-4">
            <div class="form-group">
                <label for="nama">Nama Pelanggan :</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lama_rental">Lama Waktu Rental (per hari) :</label>
                <input type="number" name="lama_rental" id="lama_rental" class="form-control" min="1" required>
            </div>
            <div class="form-group">
                <label for="jenis_motor">Pilih Jenis Motor :</label>
                <select name="jenis_motor" id="jenis_motor" class="form-control">
                    <option value="scoopy">Scoopy</option>
                    <option value="beat">Beat</option>
                    <option value="vario">Vario</option>
                    <option value="nmax">NMax</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Hitung Total</button>
        </form>
        <?php
        // Cek apakah form telah disubmit
        if (isset($_POST['submit'])) {
            // Ambil nilai dari form
            $nama = $_POST['nama'];
            $lamaRental = $_POST['lama_rental'];
            $jenisMotor = $_POST['jenis_motor'];

            // Import class RentalMotor
            require 'rental_motor.php';

            // Lakukan perhitungan harga total
            $rental = new RentalMotor($nama, $lamaRental, $jenisMotor);
            $output = $rental->hitungHargaTotal();
            echo "<div class='mt-4 alert alert-info text-center'>$output</div>";
        }
        ?>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
