<?php
session_start () ;
require_once 'library.php';

$login=GET ('login','');

echo '<h1>manajemen file</h1>';
if ($login=='')
{
    filelist ();
    login ();
} 
else
{
    if (GET('logout',''))
    {
      setsession ('login','');
      setsession ('rank','');
      header ('location: ?');
    }
    echo 'login sebagai: '.$login.' (<a href="?logout=1">logout</a>)';
    filelist ();
    addfile ();
}
?>