<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = htmlspecialchars($_POST['nama']);
  $nim = htmlspecialchars($_POST['nim']);
  $program_studi = htmlspecialchars($_POST['program_studi']);
  $judul_penelitian = htmlspecialchars($_POST['judul_penelitian']);
  $tema_penelitian = htmlspecialchars($_POST['tema_penelitian']);
  $ta_option = isset($_POST['ta_option']) ? implode(", ", $_POST['ta_option']) : "Tidak dipilih";
  $dosen_pembimbing_1 = htmlspecialchars($_POST['dosen_pembimbing_1']);
  $dosen_pembimbing_2 = htmlspecialchars($_POST['dosen_pembimbing_2']);

  echo "<h1>Data yang Dikirim</h1>";
  echo "<p>Nama: $nama</p>";
  echo "<p>NIM: $nim</p>";
  echo "<p>Program Studi: $program_studi</p>";
  echo "<p>Judul Penelitian: $judul_penelitian</p>";
  echo "<p>Tema Penelitian: $tema_penelitian</p>";
  echo "<p>Pilihan Tugas Akhir: $ta_option</p>";
  echo "<p>Dosen Pembimbing 1: $dosen_pembimbing_1</p>";
  echo "<p>Dosen Pembimbing 2: $dosen_pembimbing_2</p>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <title>Pendaftaran Tugas Akhir</title>
  <style>
  body {
    background: #f0f4f8;
    font-family: 'Poppins', sans-serif;
    margin: 0;
  }

  .header {
    background-color: #4CAF50;
    color: white;
    padding: 20px 0;
    text-align: center;
    font-size: 24px;
    font-weight: 600;
    width: 100%;
  }

  .form-container {
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px 30px;
    margin: 30px auto;
    width: 80%;
    max-width: 900px;
  }

  .form-container h1 {
    font-size: 24px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 20px;
  }

  .form-group label {
    font-weight: 500;
  }

  .checkbox-group {
    gap: 10px;
  }

  .form-group .checkbox-group input {
    width: auto;
  }

  button {
    background-color: #4CAF50;
    border: none;
    color: white;
    font-weight: 600;
    padding: 10px 15px;
    width: 100%;
    border-radius: 5px;
  }

  button:hover {
    background-color: #45a049;
  }

  .footer {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #888;
  }
  </style>
</head>

<body>
  <!-- Header -->
  <div class="header">
    Form Pendaftaran Tugas Akhir
  </div>

  <!-- Form Container -->
  <div class="container">
    <div class="form-container">
      <form action="index.php" method="post">
        <h1>Lengkapi Data</h1>
        <div class="form-group mb-3">
          <label for="nama">Nama Mahasiswa</label>
          <input type="text" id="nama" name="nama" class="form-control" required>
        </div>
        <div class="form-group mb-3">
          <label for="nim">NIM</label>
          <input type="text" id="nim" name="nim" class="form-control" required>
        </div>
        <div class="form-group mb-3">
          <label for="program_studi">Program Studi</label>
          <input type="text" id="program_studi" name="program_studi" class="form-control" required>
        </div>
        <div class="form-group mb-3">
          <label for="judul_penelitian">Judul Penelitian</label>
          <input type="text" id="judul_penelitian" name="judul_penelitian" class="form-control" required>
        </div>
        <div class="form-group mb-3">
          <label for="tema_penelitian">Tema Penelitian</label>
          <input type="text" id="tema_penelitian" name="tema_penelitian" class="form-control" required>
        </div>
        <div class="form-group mb-3">
          <label>Pilihan Tugas Akhir</label>
          <div class="checkbox-group d-flex">
            <label class="me-3"><input type="checkbox" name="ta_option[]" value="TA1"> TA1</label>
            <label><input type="checkbox" name="ta_option[]" value="TA2"> TA2</label>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="dosen_pembimbing_1">Dosen Pembimbing 1</label>
          <select id="dosen_pembimbing_1" name="dosen_pembimbing_1" class="form-select" required>
            <option value="">-- Pilih Dosen --</option>
            <option value="dosen1">Dr. Dosen 1</option>
            <option value="dosen2">Dr. Dosen 2</option>
            <option value="dosen3">Dr. Dosen 3</option>
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="dosen_pembimbing_2">Dosen Pembimbing 2</label>
          <select id="dosen_pembimbing_2" name="dosen_pembimbing_2" class="form-select" required>
            <option value="">-- Pilih Dosen --</option>
            <option value="dosen1">Dr. Dosen 1</option>
            <option value="dosen2">Dr. Dosen 2</option>
            <option value="dosen3">Dr. Dosen 3</option>
          </select>
        </div>
        <button type="submit">Kirim</button>
      </form>
    </div>
    <div class="footer">
      © 2024 Form Pendaftaran Tugas Akhir
    </div>
  </div>
</body>

</html>