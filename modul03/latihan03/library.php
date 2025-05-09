<?php
function Login()
{
    include 'variable.php';
    echo '<fieldset><legend>Login</legend>';
    $unam = GET('unam','');
    $pswd = GET('pswd','');
    if($unam!='' && $pswd!='')
    {
        for($i=0;$i<sizeof($user);$i++)
        {
            $data1 = $user[$i][0];
            $data2 = $user[$i][1];
            $data3 = $user[$i][2];
            if($unam==$data1 && $pswd==$data2)
            {
                SetSession('login',$data1);
                SetSession('rank',$data3);
                header('Location: ?');
            }
        }
    }
    echo '<form name="form1" method="post">';
    echo '<table>';
    echo '<tr><th>Username</th><td><input type="text" name="unam"></td></tr>';
    echo '<tr><th>Password</th><td><input type="password" name="pswd"></td></tr>';
    echo '<tr><th></th><td><input type="submit" value="login"></td></tr>';
    echo '</table>';
    echo '</form>';
    echo '</fieldset>';
}
function GET($key, $value)
{
    $res = isset($_SESSION[$key]) && $_SESSION[$key] != '' ? $_SESSION[$key] : $value;
    $res = isset($_POST[$key]) && $_POST[$key] != '' ? $_POST[$key] : $res;
    $res = isset($_GET[$key]) && $_GET[$key] != '' ? $_GET[$key] : $res;
    return $res;
}
function SetSession($key, $value)
{
    $_SESSION[$key] = $value;
}
function AddFile()
{
    include 'variable.php';
    echo '<fieldset><legend>Tambah File</legend>';
    $fnam = GET('fnam', '');
    $cntn = GET('cntn', '');
    if ($fnam != '' && $cntn != '') {
        @mkdir($folder, 0755);
        $file = fopen($folder . '/' . $fnam, 'w');
        fwrite($file, $cntn);
        fclose($file);
        header('Location: ?');
    }
    echo '<form name="form1" method="post">';
    echo '<table>';
    echo '<tr><th>Nama File</th><td><input type="text" name="fnam"></td></tr>';
    echo '<tr><th>Konten</th><td><textarea name="cntn"></textarea></td></tr>';
    echo '<tr><th></th><td><input type="submit" value="Tambah"></td></tr>';
    echo '</table>';
    echo '</form>';
    echo '</fieldset>';
}
function FileList()
{
    include 'variable.php';
    echo '<fieldset><legend>Daftar File</legend>';
    echo '<ol>';
    $file = glob($folder . '/*');
    for ($i = 0; $i < sizeof($file); $i++) {
        $item = basename($file[$i]);
        echo '<li>' . $item . ' &bull; <a href="' . $file[$i] . '" target="_blank">Lihat</a></li>';
    }
    echo '</ol>';
    echo '</fieldset>';
}
?>
