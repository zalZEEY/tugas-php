<!-- Perulangan ke 1 -->
<!-- <?php
echo '<h2>Perulangan</h2>';
$nilai=array(2,5,4,7,9,3,1,6,8);

for($i=0;$i<sizeof($nilai);$i++)
{
    echo $nilai[$i].'<br>';
}
?> -->

<!-- Perulangan ke 2 -->
<?php
echo '<h2>Perulangan</h2>';
$nilai=array(2,5,4,7,9,3,1,6,8);

for($i=0;$i<sizeof($nilai);$i++)
{
    if($nilai[$i]>=5)
    {
        echo $nilai[$i].'<br>';
    }
}
?>