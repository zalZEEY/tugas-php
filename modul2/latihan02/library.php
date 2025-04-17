<?php
function CetakHTML($tag, $text)
{
    echo "<$tag>$text</$tag>";
}
function GetList($nama, $jml, $harga)
{
    $total = $jml * $harga;
    $list="<tr>
            <td>$nama</td>
            <td>$jml</td>
            <td>$harga</td>
            <td>$total</td>
          </tr>";
    return $list;
}
?>