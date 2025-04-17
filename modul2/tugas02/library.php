<?php
function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.') . ',00';
}

function hitungSubtotal($jumlah, $harga) {
    return $jumlah * $harga;
}

function hitungDiskon($subtotal) {
    return $subtotal * 0.03;
}

function hitungTotal($subtotal, $diskon) {
    return $subtotal - $diskon;
}
?>
