<?php
function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.') . ",00";
}

function hitungSubtotal($jumlah, $harga) {
    return $jumlah * $harga;
}

function hitungDiskon($subtotal) {
    if ($subtotal >= 100000) return $subtotal * 0.05;
    elseif ($subtotal >= 50000) return $subtotal * 0.03;
    else return $subtotal * 0.02;
}

function hitungTotal($subtotal, $diskon) {
    return $subtotal - $diskon;
}
?>
