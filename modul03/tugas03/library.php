<?php
function GET($key, $value) {
    $res = $value;
    $res = isset($_SESSION[$key]) && $_SESSION[$key] != '' ? $_SESSION[$key] : $res;
    $res = isset($_POST[$key]) && $_POST[$key] != '' ? $_POST[$key] : $res;
    $res = isset($_GET[$key]) && $_GET[$key] != '' ? $_GET[$key] : $res;
    return $res;
}

function SetSession($key, $value) {
    $_SESSION[$key] = $value;
}

function Login() {
    include 'variable.php';
    
    $unam = GET('unam', '');
    $pswd = GET('pswd', '');
    $login_message = '';
    
    if ($unam != '' && $pswd != '') {
        $login_success = false;
        for ($i = 0; $i < sizeof($user); $i++) {
            $dat1 = $user[$i][0]; 
            $dat2 = $user[$i][1]; 
            $dat3 = $user[$i][2]; 
            if ($unam == $dat1 && $pswd == $dat2) {
                SetSession('login', $dat1);
                SetSession('rank', $dat3);
                echo '<script>window.location.href = "?";</script>';
                exit;
            }
        }
        
        $login_message = '<div class="alert alert-danger">Login gagal. Periksa kembali <a href="#" style="color:white;text-decoration:underline;">Username</a> dan <a href="#" style="color:white;text-decoration:underline;">Password</a> anda.</div>';
    }
    if (!empty($login_message)) {
        echo $login_message;
    }
    
    echo '<form method="post" class="login-form">';
    echo '<label>Username</label>';
    echo '<input type="text" name="unam" placeholder="Username Anda">';
    
    echo '<label>Password</label>';
    echo '<input type="password" name="pswd" placeholder="Password Anda">';
    
    echo '<div style="text-align: left; margin-top: 10px;">';
    echo '<button type="submit" class="btn btn-login">Login</button>';
    echo '</div>';
    echo '</form>';
}

function AddFile() {
    include 'variable.php';
    
    $fnam = GET('fnam', '');
    $cntn = GET('cntn', '');
    
    if ($fnam != '' && $cntn != '') {
        @mkdir($folder, 0755, true);
        $file = fopen($folder . '/' . $fnam, 'w');
        fwrite($file, $cntn);
        fclose($file);
        echo '<script>window.location.href = "?";</script>';
        exit;
    }
    
    echo '<form method="post" class="add-file-form">';
    echo '<label>Nama File</label>';
    echo '<input type="text" name="fnam" placeholder="Nama File Anda">';
    
    echo '<label>Konten</label>';
    echo '<textarea name="cntn" rows="3" placeholder="Isi File Anda"></textarea>';
    
    echo '<button type="submit" class="btn btn-add">Tambah</button>';
    echo '</form>';
}

function FileList() {
    include 'variable.php';
    
    $delete_file = GET('delete', '');
    $login = GET('login', '');
    
    if ($delete_file != '' && $login != '') {
        $file_path = $folder . '/' . $delete_file;
        if (file_exists($file_path)) {
            unlink($file_path);
            echo '<div class="alert alert-success">' . htmlspecialchars($delete_file) . ' berhasil dihapus.</div>';
        }
    }
    
    $files = glob($folder . '/*');
    
    if (empty($files)) {
        echo '<div class="empty-data">Data kosong</div>';
    } else {
        echo '<ol class="file-list">';
        foreach ($files as $index => $file) {
            $filename = basename($file);
            echo '<li>' . htmlspecialchars($filename);
            
            echo ' <a href="' . htmlspecialchars($file) . '" target="_blank" class="file-action view-file">👁</a>';
            
            if ($login != '') {
                echo ' <a href="?delete=' . urlencode($filename) . '" class="file-action delete-file">×</a>';
            }
            
            echo '</li>';
        }
        echo '</ol>';
    }
}
?>