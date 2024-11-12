<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Isi Buku Tamu</h2>
        <form action="proses.php" method="POST">
            Nama: <input type="text" name="nama" required><br>
            Jenis Kelamin: 
            <select name="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select><br>
            No. Telpon: <input type="text" name="no_telpon" required><br>
            Tanggal: <input type="date" name="tanggal" required><br>
            Jam: <input type="time" name="jam" required><br>
            Keperluan: <textarea name="keperluan" required></textarea><br>
            Keterangan: <textarea name="keterangan"></textarea><br>
            <input type="submit" value="Simpan">
        </form>
    </div>
</body>
</html>
