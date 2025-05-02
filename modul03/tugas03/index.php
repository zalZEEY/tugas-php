<?php
session_start();
require_once 'library.php';

$login = GET('login', '');
$logout = GET('logout', '');

if ($logout) {
    SetSession('login', '');
    SetSession('rank', '');
    header('Location: ?');
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
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            text-align: center;
            color: #2196F3;
            font-size: 36px;
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        .panel {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }
        .panel-header {
            background-color: #2196F3;
            color: white;
            padding: 12px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px 5px 0 0;
        }
        .panel-body {
            padding: 20px;
        }
        .login-form label, .add-file-form label {
            display: block;
            margin-bottom: 5px;
            color: #FF9800;
            font-weight: bold;
        }
        .login-form input[type="text"], 
        .login-form input[type="password"],
        .add-file-form input[type="text"],
        .add-file-form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .btn {
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
        }
        .btn-login, .btn-add {
            background-color: #4CAF50;
            color: white;
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
            width: 18px;
            height: 18px;
            border-radius: 50%;
            text-align: center;
            line-height: 18px;
            margin-left: 5px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 12px;
        }
        .view-file {
            background-color: #2196F3;
        }
        .delete-file {
            background-color: #F44336;
        }
        .alert {
            padding: 12px 15px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .alert-danger {
            background-color: #dc3545;
            color: white;
        }
        .alert-success {
            background-color: #5bc0de;
            color: white;
        }
        .empty-data {
            background-color: #dc3545;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            display: inline-block;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <h1>Manajemen File</h1>
    
    <?php if ($login != ''): ?>
    <p>Login sebagai: <strong><?php echo htmlspecialchars($login); ?></strong> 
        <a href="?logout=1" class="file-action delete-file" title="Logout">×</a>
    </p>
    <?php endif; ?>
    
    <!-- Daftar File Section -->
    <div class="panel">
        <div class="panel-header">Daftar File</div>
        <div class="panel-body">
            <?php FileList(); ?>
        </div>
    </div>
    
    <?php if ($login == ''): ?>
    <!-- Login Section -->
    <div class="panel">
        <div class="panel-header">Login</div>
        <div class="panel-body">
            <?php Login(); ?>
        </div>
    </div>
    <?php else: ?>
    <!-- Tambah File Section -->
    <div class="panel">
        <div class="panel-header">Tambah File</div>
        <div class="panel-body">
            <?php AddFile(); ?>
        </div>
    </div>
    <?php endif; ?>
</body>
</html>