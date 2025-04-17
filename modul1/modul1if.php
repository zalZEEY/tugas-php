<?php
$angka = -5;
if ($angka > 0) {
    echo "Angka $angka adalah bilangan positif.";
} elseif ($angka < 0) {
    echo "Angka $angka adalah bilangan negatif.";
} else {
    echo "Angka $angka adalah nol.";
}


$nilai = 75;
if ($nilai >= 80) {
    echo "Nilai Anda $nilai. Anda mendapatkan predikat A.";
} elseif ($nilai >= 70) {
    echo "Nilai Anda $nilai. Anda mendapatkan predikat B.";
} elseif ($nilai >= 60) {
    echo "Nilai Anda $nilai. Anda mendapatkan predikat C.";
} else {
    echo "Nilai Anda $nilai. Anda tidak lulus.";
}


$angka = 10;
if ($angka % 2 == 0) {
    echo "Angka $angka adalah bilangan genap.";
} else {
    echo "Angka $angka adalah bilangan ganjil.";
}
echo '<br><br><i>Coded by Rizal Bagus Putra Agusta</i>';
?>
