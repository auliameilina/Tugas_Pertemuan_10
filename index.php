<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Tugas PHP</title>
</head>
<body>
    <h2>Form Input Tugas PHP</h2>
    <form method="POST" action="">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br><br>

        <label for="pekerjaan">Pekerjaan:</label>
        <select id="pekerjaan" name="pekerjaan" required>
            <option value="Manager">Manager</option>
            <option value="Programmer">Programmer</option>
            <option value="Desainer">Desainer</option>
        </select><br><br>

        <button type="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Mengambil data dari form
        $nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        // Menghitung umur
        $tanggal_lahir_datetime = new DateTime($tanggal_lahir);
        $sekarang = new DateTime();
        $umur = $sekarang->diff($tanggal_lahir_datetime)->y;

        // Menentukan gaji berdasarkan pekerjaan
        $gaji = 0;
        switch ($pekerjaan) {
            case 'Manager':
                $gaji = 50000000;
                break;
            case 'Programmer':
                $gaji = 30000000;
                break;
            case 'Desainer':
                $gaji = 20000000;
                break;
        }

        // Menampilkan output
        echo "<h2>Output Tugas PHP:</h2>";
        echo "Nama: $nama<br>";
        echo "Umur: $umur tahun<br>";
        echo "Pekerjaan: $pekerjaan<br>";
        echo "Gaji: Rp. " . number_format($gaji, 0, ',', '.') . "<br>";
    }
    ?>
</body>
</html>