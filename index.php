<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tugas Coding - TKJ Senja</title>
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
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
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
        a:hover {
            text-decoration: underline;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #7f8c8d;
            font-size: 0.8em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📁 Tugas Coding</h1>
        <p>Direktori: <code><?php echo $_SERVER['REQUEST_URI']; ?></code></p>
        
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
                $hidden_files = array('.bash_logout', '.bashrc', '.htaccess', '.profile', 'index.php');
                $files = scandir('.');
                foreach ($files as $file) {
                    if ($file != "." && $file != ".." && !in_array($file, $hidden_files)) {
                        $icon = is_dir($file) ? "📂" : "📄";
                        $lastModified = date("Y-m-d", filemtime($file));
                        $size = is_dir($file) ? "-" : formatSize(filesize($file));
                        
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
            <p>Server: Apache | © 2025 TKJ Senja</p>
        </div>
    </div>
</body>
</html>