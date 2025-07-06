<?php
session_start();
require_once 'library.php';

$login = GET('login', '');
$logout = GET('logout', '');

if ($logout) {
    SetSession('login', '');
    SetSession('rank', '');
    echo '<script>window.location.href = "?";</script>';
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manajemen File</title>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 630px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            color: #39c;
            font-size: 36px;
            margin-top: 15px;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        .panel {
            margin-bottom: 20px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding-bottom: 20px;
        }
        .panel-header {
            background-color: #39c;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            border-radius: 50px;
            margin: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .panel-body {
            padding: 0 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #FF9800;
            font-weight: normal;
            font-size: 14px;
        }
        input[type="text"], 
        input[type="password"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            min-height: 60px;
        }
        .btn {
            padding: 6px 25px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
            color: white;
        }
        .btn-login {
            background-color: #5cb85c;
        }
        .btn-add {
            background-color: #5cb85c;
        }
        .empty-data {
            background-color: #d9534f;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            display: inline-block;
            font-size: 14px;
            margin: 5px 0;
        }
        .login-info {
            margin-bottom: 15px;
        }
        .alert {
            padding: 12px 15px;
            margin: 0 0 15px 0;
            border-radius: 4px;
            color: white;
        }
        .alert-danger {
            background-color: #d9534f;
        }
        .alert-success {
            background-color: #5bc0de;
        }
        .login-info a {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            text-align: center;
            line-height: 18px;
            background-color: #d9534f;
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-left: 5px;
        }
        .file-list {
            list-style-position: inside;
            padding-left: 0;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .file-list li {
            padding: 8px 0;
            border-bottom: 1px dotted #ddd;
        }
        .file-action {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            text-align: center;
            line-height: 20px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-left: 5px;
        }
        .view-file {
            background-color: #39c;
        }
        .delete-file {
            background-color: #d9534f;
        }
        h1 {
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            color: #39c;
            text-shadow: 2px 2px 3px rgba(0,0,0,0.2);
            font-size: 42px;
            letter-spacing: 1px;
            margin-bottom: 30px;
        }
        .panel {
            border-radius: 0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .panel-header {
            border-radius: 50px;
            background: linear-gradient(to bottom, #5bc0de, #2980b9);
            font-size: 20px;
            padding: 12px;
            margin: 10px;
        }
        .empty-data {
            background-color: #d9534f;
            color: white;
            padding: 10px 15px;
            border-radius: 3px;
            font-weight: normal;
        }
        .btn-login {
            background: linear-gradient(to bottom, #5cb85c, #449d44);
            border-radius: 3px;
            padding: 8px 30px;
            text-transform: uppercase;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Manajemen File</h1>
    
    <?php if ($login != ''): ?>
    <div class="login-info">
        Login sebagai: <strong><?php echo htmlspecialchars($login); ?></strong> 
        <a href="?logout=1" title="Logout">×</a>
    </div>
    <?php endif; ?>
    
    <div class="panel">
        <div class="panel-header">Daftar File</div>
        <div class="panel-body">
            <?php FileList(); ?>
        </div>
    </div>
    
    <?php if ($login == ''): ?>
    <div class="panel">
        <div class="panel-header">Login</div>
        <div class="panel-body">
            <?php Login(); ?>
        </div>
    </div>
    <?php else: ?>
    <div class="panel">
        <div class="panel-header">Tambah File</div>
        <div class="panel-body">
            <?php AddFile(); ?>
        </div>
    </div>
    <?php endif; ?>
</body>
</html>