<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_pendaftaran";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];

    $stmt = $conn->prepare("INSERT INTO pendaftar (nama, alamat, jenis_kelamin, agama, asal_sekolah, email, no_telepon) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nama, $alamat, $jenis_kelamin, $agama, $asal_sekolah, $email, $no_telepon);

    if ($stmt->execute()) {
        echo "<div style='text-align:center; margin-top:50px;'>
                <div style='display:inline-block; background:#e6f7e6; padding:30px 50px; border-radius:15px; box-shadow:0 0 10px rgba(0,0,0,0.1);'>
                <h2 style='color:green;'>✅ Pendaftaran Berhasil!</h2>
                <p><b>Nama:</b> $nama</p>
                <p><b>Email:</b> $email</p>
                <p><b>No. Telepon:</b> $no_telepon</p>
                <p><b>Asal Sekolah:</b> $asal_sekolah</p>
                </div>
              </div>";
    } else {
        echo "<h2 style='color:red; text-align:center;'>❌ Gagal menyimpan data.</h2>";
    }

    $stmt->close();
}
$conn->close();
?>
