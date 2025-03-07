<?php
echo '<h2>Perulangan Bersyarat</h2>';
$nilai=array(2,5,4,7,9,3,1,6,8);

for ($i=0; $i <sizeof($nilai) ; $i++)
{ 
	if ($nilai[$i]>=5)
	{
		echo $nilai[$i].'<br>';
	}
}
echo '<br><i>Coded by Rizal Bagus Putra Agusta</i>';
?>