<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo basename(__DIR__); ?> - Pemrograman PHP</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      width: 100%;
      margin: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      color: #ecf0f1;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }

    .container {
      width: 100%;
      max-width: 960px;
      margin: 40px auto;
      background: #1e272e;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .back-button {
      display: inline-block;
      margin-bottom: 25px;
      padding: 10px 16px;
      background-color: #34495e;
      color: white;
      border-radius: 6px;
      text-decoration: none;
      transition: background 0.3s;
    }

    .back-button:hover {
      background-color: #2c3e50;
    }

    h1 {
      text-align: center;
      font-size: 2rem;
      color: #f1c40f;
      margin-bottom: 10px;
    }

    .directory-info {
      text-align: center;
      color: #95a5a6;
      font-size: 0.9rem;
      margin-bottom: 25px;
      word-wrap: break-word;
    }

    .table-wrapper {
      overflow-x: auto;
    }

    table {
      width: 100%;
      min-width: 600px;
      border-collapse: collapse;
      background: #2f3640;
      border-radius: 10px;
      overflow: hidden;
    }

    thead {
      background: #353b48;
    }

    th, td {
      padding: 15px;
      text-align: left;
      white-space: nowrap;
    }

    th {
      color: #00cec9;
      font-weight: 600;
    }

    td a {
      color: #74b9ff;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    td a:hover {
      color: #81ecec;
    }

    tr {
      transition: background 0.3s;
    }

    tr:hover {
      background: #3d566e;
    }

    .icon {
      font-size: 1.1rem;
    }

    .footer {
      text-align: center;
      margin-top: 30px;
      color: #95a5a6;
      font-size: 0.85rem;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
      h1 {
        font-size: 1.6rem;
      }

      th, td {
        padding: 12px;
        font-size: 0.95rem;
      }

      .back-button {
        font-size: 0.9rem;
        padding: 8px 14px;
      }
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 1.4rem;
      }

      .directory-info {
        font-size: 0.8rem;
      }

      .back-button {
        font-size: 0.85rem;
      }

      th, td {
        font-size: 0.85rem;
        padding: 10px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="../" class="back-button">&#11013; Kembali ke Direktori Utama</a>

    <h1>
      <?php 
        $folderName = basename(__DIR__);
        $formattedName = ucfirst(str_replace(['modul', '_'], ['Modul ', ' '], $folderName));
        echo $formattedName . " - Pemrograman PHP"; 
      ?>
    </h1>

    <div class="directory-info">
      Direktori: <code><?php echo $_SERVER['REQUEST_URI']; ?></code>
    </div>

    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>Nama File</th>
            <th>Terakhir Diubah</th>
            <th>Ukuran</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $exclude = ['.', '..', 'index.php', '.htaccess'];
          $files = scandir('.');
          foreach ($files as $file) {
            if (!in_array($file, $exclude)) {
              $icon = is_dir($file) ? "&#128193;" : "&#128196;";
              $lastModified = date("Y-m-d H:i", filemtime($file));
              $size = is_dir($file) ? '-' : formatSize(filesize($file));
              echo "<tr>
                <td><a href='$file'><span class='icon'>$icon</span>$file</a></td>
                <td>$lastModified</td>
                <td>$size</td>
              </tr>";
            }
          }

          function formatSize($bytes) {
            if ($bytes >= 1048576) return round($bytes/1048576, 1) . ' MB';
            elseif ($bytes >= 1024) return round($bytes/1024, 1) . ' KB';
            else return $bytes . ' B';
          }
          ?>
        </tbody>
      </table>
    </div>

    <div class="footer">
      &copy; 2025 TKJ Senja | Server Apache
    </div>
  </div>
</body>
</html>
