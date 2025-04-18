<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo basename(__DIR__); ?> - Pemrograman PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #34495e;
            color: white;
        }
        tr:hover {
            background: #f1f1f1;
        }
        a {
            color: #3498db;
            text-decoration: none;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #7f8c8d;
            font-size: 0.9em;
        }
        .back-button {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 15px;
            background-color: #34495e;
            color: white;
            border-radius: 4px;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #2c3e50;
        }
        .directory-info {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="../" class="back-button">⬅ Kembali ke Direktori Utama</a>
        <h1>📂 <?php 
            $folderName = basename(__DIR__);
            $formattedName = ucfirst(str_replace(['modul', '_'], ['Modul ', ' '], $folderName));
            echo $formattedName . " - Pemrograman PHP"; 
        ?></h1>
        <div class="directory-info">
            <p>Direktori: <code><?php echo $_SERVER['REQUEST_URI']; ?></code></p>
        </div>
        
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
                        $icon = is_dir($file) ? '📁' : '📄';
                        $lastModified = date("Y-m-d H:i", filemtime($file));
                        $size = is_dir($file) ? '-' : formatSize(filesize($file));
                        
                        echo "<tr>
                            <td><a href='$file'>$icon $file</a></td>
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
        
        <div class="footer">
            <p>© 2025 TKJ Senja | Server Apache</p>
        </div>
    </div>
</body>
</html>