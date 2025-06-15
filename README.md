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

---

## 🧩 Penjelasan File

### 🔹 `index.html`

Form HTML untuk input data siswa.

```html
<form action="proses_simpan.php" method="POST">
  <!-- input nama, alamat, jenis kelamin, dsb -->
</form>
```

### 🔹 `style.css`

CSS dengan warna pastel biru, memberikan tampilan ringan dan profesional.

### 🔹 `proses_simpan.php`

PHP script yang:

* Mengambil data dari form
* Terkoneksi ke database MySQL
* Menyimpan data ke tabel `pendaftar`
* Menampilkan konfirmasi sukses atau gagal

```php
$koneksi = mysqli_connect("localhost", "root", "", "db_pendaftaran");
$sql = "INSERT INTO pendaftar (...) VALUES (...)";
```

---

> 📌 Tugas ini tidak menggunakan file `.txt` lagi seperti Tugas 8. Seluruh data tersimpan ke database MySQL secara langsung.

---

© Dhafin Kurniawan - 5054231016
