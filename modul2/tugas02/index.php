<?php
include 'variable.php';
include 'library.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Latihan Fungsi / Prosedur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #1E90FF;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #007399;
            color: white;
        }
        tfoot td {
            font-weight: bold;
            background-color: #FFF3E0;
        }
    </style>
</head>
<body>
    <h1>Latihan Fungsi / Prosedur</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Brg</th>
                <th>Jml Beli</th>
                <th>Hrg Satuan</th>
                <th>Sub Total</th>
                <th>Diskon</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $totalJumlah = 0;
        $totalHarga = 0;
        $totalSubtotal = 0;
        $totalDiskon = 0;
        $totalTotal = 0;

        foreach ($barang as $i => $item) {
            $subtotal = hitungSubtotal($item['jumlah'], $item['harga']);
            $diskon = hitungDiskon($subtotal);
            $total = hitungTotal($subtotal, $diskon);

            $totalJumlah += $item['jumlah'];
            $totalHarga += $item['harga'];
            $totalSubtotal += $subtotal;
            $totalDiskon += $diskon;
            $totalTotal += $total;

            echo "<tr>
                <td>" . ($i + 1) . "</td>
                <td>{$item['nama']}</td>
                <td>{$item['jumlah']}</td>
                <td>" . formatRupiah($item['harga']) . "</td>
                <td>" . formatRupiah($subtotal) . "</td>
                <td>" . formatRupiah($diskon) . "</td>
                <td>" . formatRupiah($total) . "</td>
            </tr>";
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">TOTAL</td>
                <td><?= $totalJumlah ?></td>
                <td><?= formatRupiah($totalHarga) ?></td>
                <td><?= formatRupiah($totalSubtotal) ?></td>
                <td><?= formatRupiah($totalDiskon) ?></td>
                <td><?= formatRupiah($totalTotal) ?></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
