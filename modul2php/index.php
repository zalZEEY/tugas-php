<?php
require_once 'library.php';
include 'variable.php';

// CetakHTML('h1', 'Latihan Fungsi / Prosedur <br>');
// CetakHTML('h2', 'Latihan Fungsi / Prosedur <br>');
// CetakHTML('h3', 'Latihan Fungsi / Prosedur <br>');
// CetakHTML('marquee', 'Latihan Fungsi / Prosedur <br>');
// CetakHTML('i', 'Latihan Fungsi / Prosedur <br>');
// CetakHTML('u', 'Latihan Fungsi / Prosedur <br>');
// CetakHTML('textarea', 'Latihan Fungsi / Prosedur <br>');
// CetakHTML('button', 'Latihan Fungsi / Prosedur <br>');

CetakHTML('h1 style="color:black;"', 'Latihan Fungsi / Prosedur');
echo '<table border="1">';
echo '<tr>
        <th>Nama Brg</th>
        <th>Jml Beli</th>
        <th>Hrg Satuan</th>
        <th>Total</th>
      </tr>';
for($i=0;$i<sizeof($barang);$i++)
{
    $text=GetList ($barang[$i] [0],$barang[$i] [1],$barang[$i] [2]);
    echo $text;
}
echo '</table>';
?>