# Tugas 9 - Pendaftaran Siswa Baru (MySQL)

LINK WEB LOCALHOST: [http://localhost/Tugas9/index.html](http://localhost/Tugas9/index.html)
LINK REPO GITHUB: [https://github.com/username/tugas9-mysql](https://github.com/username/tugas9-mysql)

---

## 📄 Deskripsi

Proyek ini merupakan pengembangan dari Tugas 8, dengan peningkatan berupa penyimpanan data ke dalam **database MySQL** alih-alih file `.txt`. Website ini memungkinkan pendaftaran siswa baru melalui form berbasis HTML yang diproses menggunakan PHP dan disimpan ke dalam tabel MySQL.

---

## 🚀 Fitur Utama

✅ Formulir Pendaftaran: Input seperti nama, alamat, jenis kelamin, agama, asal sekolah, email, dan no. telepon.
✅ Penyimpanan MySQL: Data disimpan ke dalam database `db_pendaftaran`, tabel `pendaftar`.
✅ Konfirmasi Pendaftaran: Setelah pengisian form, ditampilkan pesan sukses.
✅ Desain Bersih: Tampilan sederhana namun rapi dan responsif.

---

## 📁 Struktur Folder

```
/
├── index.html           # Halaman form pendaftaran siswa
├── style.css            # Styling halaman dengan tema biru pastel
├── proses_simpan.php    # Script PHP untuk koneksi dan penyimpanan ke database MySQL
```

---

## ⚙️ Cara Menjalankan Proyek

1. **Install XAMPP:** [Download XAMPP](https://www.apachefriends.org/index.html)
2. **Buat Database:**

   * Buka `phpMyAdmin`
   * Buat database `db_pendaftaran`
   * Jalankan SQL berikut:

```sql
CREATE TABLE pendaftar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    jenis_kelamin VARCHAR(20) NOT NULL,
    agama VARCHAR(50) NOT NULL,
    asal_sekolah VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    no_telepon VARCHAR(20) NOT NULL,
    tanggal_pendaftaran TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

3. **Letakkan Folder Proyek:** Pindahkan folder ke `htdocs/Tugas9/`
4. **Aktifkan Apache & MySQL di XAMPP**
5. **Akses Web di Browser:** `http://localhost/Tugas9/index.html`

---

## 🖥️ Preview Tampilan

### Form Pendaftaran:

![image](https://github.com/user-attachments/assets/d426c1d9-90de-4b34-850a-a8664704890c)

### Konfirmasi Sukses:

![image](https://github.com/user-attachments/assets/4d2b43d3-d6e3-48c9-980f-175dd752f92b)

### Hasil Submit di database
![image](https://github.com/user-attachments/assets/0f85ea2a-2a58-421f-b4e1-4de54fbe63c2)

---

## 🧩 Penjelasan File

### 🔹 `index.html`

Form HTML untuk input data siswa.

```html
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Formulir Pendaftaran Siswa Baru</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="background">
    <ul class="bubbles">
      <li></li><li></li><li></li><li></li><li></li>
      <li></li><li></li><li></li><li></li><li></li>
    </ul>
  </div>
  <div class="container">
    <h1>Formulir Pendaftaran Siswa Baru</h1>
    <p>Silakan lengkapi informasi berikut secara benar.</p>
    <form action="proses_simpan.php" method="post">
      <label>Nama Lengkap</label>
      <input type="text" name="nama" required>
      
      <label>Alamat Rumah</label>
      <textarea name="alamat" required></textarea>
      
      <label>Jenis Kelamin</label>
      <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
      <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
      
      <label>Agama</label>
      <select name="agama" required>
        <option value="">-- Pilih Agama --</option>
        <option>Islam</option>
        <option>Kristen</option>
        <option>Hindu</option>
        <option>Budha</option>
        <option>Katolik</option>
      </select>
      
      <label>Asal Sekolah</label>
      <input type="text" name="asal_sekolah" required>
      
      <label>Email</label>
      <input type="email" name="email" required>
      
      <label>No. Telepon</label>
      <input type="tel" name="no_telepon" required>
      
      <button type="submit">Daftar Sekarang</button>
    </form>
  </div>
</body>
</html>

```

### 🔹 `style.css`

CSS dengan warna pastel biru, memberikan tampilan ringan dan profesional.
![carbon (8)](https://github.com/user-attachments/assets/be6e24a8-d7ef-4c56-8308-7ff62eb133e4)


### 🔹 `proses_simpan.php`

PHP script yang:

* Mengambil data dari form
* Terkoneksi ke database MySQL
* Menyimpan data ke tabel `pendaftar`
* Menampilkan konfirmasi sukses atau gagal

```php
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

```

---

> 📌 Tugas ini tidak menggunakan file `.txt` lagi seperti Tugas 8. Seluruh data tersimpan ke database MySQL secara langsung.

---

© Dhafin Kurniawan - 5054231016
