<?php
function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.') . ",00";
}

function hitungSubtotal($jumlah, $harga) {
    return $jumlah * $harga;
}

function hitungDiskon($subtotal, $jumlah) {
    if ($jumlah >= 8) return $subtotal * 0.08;
    elseif ($jumlah >= 5) return $subtotal * 0.05;
    elseif ($jumlah >= 4) return $subtotal * 0.04;
    elseif ($jumlah >= 3) return $subtotal * 0.03;
    else return $subtotal * 0.02;
}


// function hitungDiskon($subtotal) {
//     if ($subtotal >= 100000) return $subtotal * 0.05;
//     elseif ($subtotal >= 50000) return $subtotal * 0.03;
//     else return $subtotal * 0.02;
// }

function hitungTotal($subtotal, $diskon) {
    return $subtotal - $diskon;
}
?>
