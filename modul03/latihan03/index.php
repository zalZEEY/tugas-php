<?php
session_start();
require_once 'library.php';

$login=GET ('login', '');

echo '<h1>Manajemen File</h1>';
if($login=='')
{
    FileList();
    Login();
}
else
{
    if(GET('logout', ''))
    {
        SetSession('login','');
        SetSession('rank','');
        header('Location: ?');
    }
    echo 'Login sebagai: ' . $login . ' (<a href="?logout=1">Logout</a>)';
    FileList();
    AddFile();
}
?>