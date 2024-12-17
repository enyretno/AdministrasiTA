<?php
session_start();

// Inisialisasi data default jika sesi kosong
if (!isset($_SESSION['proposals'])) {
    $_SESSION['proposals'] = [
        ["id" => 1, "judul" => "Implementasi AI dalam Industri", "mahasiswa" => "Andi Setiawan", "status" => "Pending"],
        ["id" => 2, "judul" => "Analisis Data Keuangan", "mahasiswa" => "Siti Aisyah", "status" => "Pending"],
    ];
}

if (!isset($_SESSION['jadwals'])) {
    $_SESSION['jadwals'] = [
        ["id" => 1, "judul" => "Implementasi AI dalam Industri", "mahasiswa" => "Andi Setiawan", "jadwal" => ""],
        ["id" => 2, "judul" => "Analisis Data Keuangan", "mahasiswa" => "Siti Aisyah", "jadwal" => ""],
    ];
}

if (!isset($_SESSION['pengujis'])) {
    $_SESSION['pengujis'] = [
        ["id" => 1, "judul" => "Implementasi AI dalam Industri", "mahasiswa" => "Andi Setiawan", "penguji" => ""],
        ["id" => 2, "judul" => "Analisis Data Keuangan", "mahasiswa" => "Siti Aisyah", "penguji" => ""],
    ];
}

// Proses form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['approve_proposal'])) {
        $id = $_POST['approve_proposal'];
        foreach ($_SESSION['proposals'] as &$proposal) {
            if ($proposal['id'] == $id) {
                $proposal['status'] = "Disetujui";
            }
        }
    }

    if (isset($_POST['set_jadwal'])) {
        $id = $_POST['set_jadwal'];
        $jadwal = $_POST['jadwal'];
        foreach ($_SESSION['jadwals'] as &$data) {
            if ($data['id'] == $id) {
                $data['jadwal'] = $jadwal;
            }
        }
    }

    if (isset($_POST['assign_penguji'])) {
        $id = $_POST['assign_penguji'];
        $penguji = $_POST['penguji'];
        foreach ($_SESSION['pengujis'] as &$data) {
            if ($data['id'] == $id) {
                $data['penguji'] = $penguji;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Koordinator TA</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 20px;
    line-height: 1.6;
  }

  h2,
  h3 {
    color: #333;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  table,
  th,
  td {
    border: 1px solid #ddd;
  }

  th,
  td {
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: #f4f4f4;
  }

  button {
    padding: 5px 10px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button:hover {
    background-color: #218838;
  }

  input[type="text"],
  input[type="date"] {
    padding: 5px;
    width: calc(100% - 20px);
    margin: 0 10px 0 0;
  }

  .navbar {
    display: flex;
    justify-content: space-between;
    background-color: #007bff;
    padding: 10px 20px;
    color: white;
    margin-bottom: 20px;
  }

  .navbar a {
    color: white;
    text-decoration: none;
    margin: 0 15px;
  }

  .navbar a:hover {
    text-decoration: underline;
  }

  .navbar .brand {
    font-weight: bold;
  }

  .navbar .links {
    display: flex;
  }
  </style>
</head>

<body>
  <div class="navbar">
    <div class="brand">Dashboard Koordinator TA</div>
    <div class="links">
      <a href="#">Home</a>
      <a href="#proposal">Proposal</a>
      <a href="#jadwal">Jadwal Seminar</a>
      <a href="#penguji">Penguji</a>
      <a href="logout.php">Logout</a>
    </div>
  </div>

  <!-- Proposal -->
  <h3 id="proposal">Daftar Proposal</h3>
  <table border="1">
    <thead>
      <tr>
        <th>Judul Proposal</th>
        <th>Mahasiswa</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['proposals'] as $proposal) : ?>
      <tr>
        <td><?= htmlspecialchars($proposal['judul']); ?></td>
        <td><?= htmlspecialchars($proposal['mahasiswa']); ?></td>
        <td id="status-<?= $proposal['id']; ?>"><?= htmlspecialchars($proposal['status']); ?></td>
        <td>
          <?php if ($proposal['status'] === 'Pending') : ?>
          <button onclick="approveProposal(<?= $proposal['id']; ?>)">Setujui</button>
          <?php else : ?>
          Disetujui
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Jadwal Seminar -->
  <h3 id="jadwal">Atur Jadwal Seminar</h3>
  <table border="1">
    <thead>
      <tr>
        <th>Judul Proposal</th>
        <th>Mahasiswa</th>
        <th>Jadwal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['jadwals'] as $jadwal) : ?>
      <tr>
        <td><?= htmlspecialchars($jadwal['judul']); ?></td>
        <td><?= htmlspecialchars($jadwal['mahasiswa']); ?></td>
        <td id="jadwal-<?= $jadwal['id']; ?>">
          <?= $jadwal['jadwal'] ? htmlspecialchars($jadwal['jadwal']) : 'Belum diatur'; ?></td>
        <td>
          <input type="date" id="jadwalInput-<?= $jadwal['id']; ?>">
          <button onclick="setJadwal(<?= $jadwal['id']; ?>)">Atur Jadwal</button>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <!-- Tunjuk Penguji -->
  <h3 id="penguji">Tunjuk Penguji</h3>
  <table border="1">
    <thead>
      <tr>
        <th>Judul Proposal</th>
        <th>Mahasiswa</th>
        <th>Penguji</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($_SESSION['pengujis'] as $penguji) : ?>
      <tr>
        <td><?= htmlspecialchars($penguji['judul']); ?></td>
        <td><?= htmlspecialchars($penguji['mahasiswa']); ?></td>
        <td id="penguji-<?= $penguji['id']; ?>">
          <?= $penguji['penguji'] ? htmlspecialchars($penguji['penguji']) : 'Belum ditunjuk'; ?></td>
        <td>
          <input type="text" id="pengujiInput-<?= $penguji['id']; ?>" placeholder="Nama Penguji">
          <button onclick="assignPenguji(<?= $penguji['id']; ?>)">Tunjuk</button>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <script>
  function approveProposal(id) {
    document.getElementById(`status-${id}`).innerText = "Disetujui";
  }

  function setJadwal(id) {
    const jadwal = document.getElementById(`jadwalInput-${id}`).value;
    if (jadwal) {
      document.getElementById(`jadwal-${id}`).innerText = jadwal;
    }
  }

  function assignPenguji(id) {
    const penguji = document.getElementById(`pengujiInput-${id}`).value;
    if (penguji) {
      document.getElementById(`penguji-${id}`).innerText = penguji;
    }
  }
  </script>
</body>

</html>