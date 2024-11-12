<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku Tamu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Buku Tamu</h2>
        
        <!-- Form Pencarian -->
        <form action="proses.php" method="GET" style="margin-bottom: 20px;">
            <input type="text" name="search" placeholder="Cari nama tamu..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <input type="submit" value="Cari">
        </form>
        
        <?php
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'buku_tamu';

        $conn = new mysqli($host, $user, $pass, $db);
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $no_telpon = $_POST['no_telpon'];
            $tanggal = $_POST['tanggal'];
            $jam = $_POST['jam'];
            $keperluan = $_POST['keperluan'];
            $keterangan = $_POST['keterangan'];

            $sql = "INSERT INTO tamu (nama, jenis_kelamin, no_telpon, tanggal, jam, keperluan, keterangan) 
                    VALUES ('$nama', '$jenis_kelamin', '$no_telpon', '$tanggal', '$jam', '$keperluan', '$keterangan')";

            if ($conn->query($sql) === TRUE) {
                echo "<h3>Data Buku Tamu Berhasil Disimpan</h3>";
                echo "Nama: $nama<br>";
                echo "Jenis Kelamin: $jenis_kelamin<br>";
                echo "No. Telpon: $no_telpon<br>";
                echo "Tanggal: $tanggal<br>";
                echo "Jam: $jam<br>";
                echo "Keperluan: $keperluan<br>";
                echo "Keterangan: $keterangan<br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        // Query Pencarian
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $query = "SELECT * FROM tamu";
        if (!empty($search)) {
            $query .= " WHERE nama LIKE '%$search%'";
        }
        $query .= " ORDER BY id DESC";
        
        $result = $conn->query($query);
        ?>

        <!-- Tabel Data Tamu -->
        <table>
            <tr>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>No. Telpon</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Keperluan</th>
                <th>Keterangan</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['nama']}</td>
                        <td>{$row['jenis_kelamin']}</td>
                        <td>{$row['no_telpon']}</td>
                        <td>{$row['tanggal']}</td>
                        <td>{$row['jam']}</td>
                        <td>{$row['keperluan']}</td>
                        <td>{$row['keterangan']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Data tidak ditemukan</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
<?php
$conn->close();
?>
