<?php
$nama=array("Bunda Rahma","Nisan","Kakangku","Apundi","Haikal");
$nilai=array(
	array(60,80,78),
	array(89,74,72),
	array(65,92,83),
	array(94,77,81),
	array(88,72,85)
);

echo "<h1>Daftar Nilai Kelas XII-TKJ 1</h1>";
echo '<table border="1" cellpadding="7" cellspacing="0" style="border-collapse: collapse; text-align: center;">';
echo '<tr style="background-color: #aaa; color: black;">
		<th rowspan="2">No</th>
		<th rowspan="2">Nama</th>
		<th colspan="3">Nilai</th>
		<th rowspan="2">Rerata</th>
		<th rowspan="2">Keterangan</th>
	</tr>';
echo '<tr style="background-color: #aaa; color: black;">
		<th>Matk</th>
		<th>B.Ind</th>
		<th>B.Ing</th>
	</tr>';

// echo "<h1>Daftar Nilai Kelas 6</h1>";
// echo '<table border="2" cellpadding="7" cellspacing="0" style="border-collapse: collapse; text-align: center;">';
// echo '<tr style="background-color: #aaa; color: black;">
//         <th rowspan="2">No</th>
//         <th rowspan="2">Nama</th>
//         <th colspan="3">Nilai</th>
//         <th rowspan="2">Rerata</th>
//         <th rowspan="2">Keterangan</th>
//       </tr>';
// echo '<tr style="background-color: #aaa; color: black;">
//         <th>Matk</th>
//         <th>B.Ind</th>
//         <th>B.Ing</th>
//       </tr>';


// echo "<tr>
// 	<th>No</th>
// 	<th>Nama</th>
// 	<th>Matk</th>
// 	<th>B.Ind</th>
// 	<th>B.Ing</th>
// 	<th>Rerata</th>
// 	<th>Keterangan</th>
// 	</tr>";

for ($i = 0; $i < count($nama); $i++) {
    $rataRata = array_sum($nilai[$i]) / count($nilai[$i]);
    $keterangan = $rataRata >= 75 ? "L" : "TL";
    $rataRataFormatted = fmod($rataRata, 1) == 0 ? intval($rataRata) : number_format($rataRata, 12);
    $style = ($rataRataFormatted == 80 || $rataRataFormatted == 84) ? 'style="text-align: left;"' : '';

    echo "<tr>
            <td>" . ($i + 1) . "</td>
            <td>" . $nama[$i] . "</td>
            <td>" . $nilai[$i][0] . "</td>
            <td>" . $nilai[$i][1] . "</td>
            <td>" . $nilai[$i][2] . "</td>
            <td $style>" . $rataRataFormatted . "</td>
            <td>" . $keterangan . "</td>
          </tr>";
}

// for ($i = 0; $i < count($nama); $i++) {
//     $rataRata = array_sum($nilai[$i]) / count($nilai[$i]);
//     $keterangan = $rataRata >= 75 ? "L" : "TL";
//     $rataRataFormatted = fmod($rataRata, 1) == 0 ? intval($rataRata) : number_format($rataRata, 12);

//     echo "<tr>
//             <td>" . ($i + 1) . "</td>
//             <td>" . $nama[$i] . "</td>
//             <td>" . $nilai[$i][0] . "</td>
//             <td>" . $nilai[$i][1] . "</td>
//             <td>" . $nilai[$i][2] . "</td>
//             <td>" . $rataRataFormatted . "</td>
//             <td>" . $keterangan . "</td>
//           </tr>";
// }
// for ($i = 0; $i < count($nama); $i++) {
//     $rataRata = array_sum($nilai[$i]) / count($nilai[$i]);
//     $keterangan = $rataRata >= 75 ? "L" : "TL";
// echo "<tr>
//             <td>" . ($i + 1) . "</td>
//             <td>" . $nama[$i] . "</td>
//             <td>" . $nilai[$i][0] . "</td>
//             <td>" . $nilai[$i][1] . "</td>
//             <td>" . $nilai[$i][2] . "</td>
//             <td>" . number_format($rataRata, 12) . "</td>
//             <td>" . $keterangan . "</td>
//           </tr>";
// }
echo '<br><i>Coded by Rizal Bagus Putra Agusta</i>';
echo "</table>";
?>