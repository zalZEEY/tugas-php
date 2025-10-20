<?php header('Content-Type: text/html; charset=UTF-8'); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tugas Coding - TKJ Senja</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      color: #ecf0f1;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    .container {
      background: #1e272e;
      width: 100%;
      max-width: 960px;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6);
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h1 {
      text-align: center;
      font-size: 2.5rem;
      color: #f1c40f;
      margin-bottom: 10px;
    }

    .path {
      text-align: center;
      font-size: 0.9rem;
      color: #95a5a6;
      margin-bottom: 25px;
      word-wrap: break-word;
    }

    .table-wrapper {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #2f3640;
      border-radius: 12px;
      overflow: hidden;
      min-width: 600px;
    }

    thead {
      background: #353b48;
    }

    th, td {
      padding: 16px;
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
      gap: 8px;
      transition: color 0.3s;
    }

    td a:hover {
      color: #81ecec;
    }

    tr {
      transition: background 0.3s;
    }

    tr:hover {
      background: #3c4451;
    }

    .icon {
      font-size: 1.2rem;
    }

    .footer {
      text-align: center;
      margin-top: 30px;
      color: #95a5a6;
      font-size: 0.85rem;
    }

    .portfolio-link {
      margin-top: 10px;
      display: block;
      text-align: center;
    }

    .portfolio-link a {
      color: #00cec9;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .portfolio-link a:hover {
      color: #81ecec;
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      h1 {
        font-size: 2rem;
      }
      th, td {
        padding: 12px;
        font-size: 0.95rem;
      }
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 1.6rem;
      }
      th, td {
        padding: 10px;
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>&#128193; Tugas Coding</h1>
    <div class="path">Direktori: <code><?php echo $_SERVER['REQUEST_URI']; ?></code></div>

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
          $hidden_files = ['.bash_logout', '.bashrc', '.htaccess', '.profile', 'index.php', 'ROOT_32_RIZAL_BAGUS_PUTRA_AGUSTA'];
          $files = scandir('.');
          foreach ($files as $file) {
            if ($file != "." && $file != ".." && !in_array($file, $hidden_files)) {
              $isDir = is_dir($file);
              $icon = $isDir ? "&#128193;" : "&#128196;";
              $lastModified = date("Y-m-d", filemtime($file));
              $size = $isDir ? "-" : formatSize(filesize($file));

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
      Server: Apache | &copy; 2025 TKJ Senja <br> <blockquote class="tiktok-embed" cite="https://www.tiktok.com/@kagi.men/video/7560642123071016204" data-video-id="7560642123071016204" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@kagi.men" href="https://www.tiktok.com/@kagi.men?refer=embed">@kagi.men</a> agit era😟 <a title="agit" target="_blank" href="https://www.tiktok.com/tag/agit?refer=embed">#agit</a> <a title="snbp" target="_blank" href="https://www.tiktok.com/tag/snbp?refer=embed">#snbp</a> <a title="snbt" target="_blank" href="https://www.tiktok.com/tag/snbt?refer=embed">#snbt</a> <a title="kerja" target="_blank" href="https://www.tiktok.com/tag/kerja?refer=embed">#kerja</a> <a title="fyp" target="_blank" href="https://www.tiktok.com/tag/fyp?refer=embed">#fyp</a> <a target="_blank" title="♬ suara asli  - zal." href="https://www.tiktok.com/music/suara-asli-zal-7560642129437969164?refer=embed">♬ suara asli  - zal.</a> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>
      <div class="portfolio-link">
        &#127760; Portofolio saya:
        <a href="https://www.kagimen.my.id/" target="_blank">kagimen</a>
      </div>
      <div class="portfolio-link">
        &#127786; Penyimpanan Cloud:
        <a href="https://thanvere.biz.id/" target="_blank">ThanvereCloud</a>
      </div>
    </div>
  </div>
</body>
</html>
