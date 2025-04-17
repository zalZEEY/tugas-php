<?php
include "variable.php";
include "library.php";
include "styles.php";
?>

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
        // echo '<br><i>Coded by Rizal Bagus Putra Agusta</i>';
        // $no = 1;
        // $totalJumlah = 0;
        // $totalHarga = 0;
        // $grandSubTotal = 0;
        // $grandDiskon = 0;
        // $grandTotal = 0;

        // foreach ($barang as $item) {
        //     $jumlah = $item['Jumlah'];
        //     $harga = $item['Harga'];
        //     $subTotal = hitungSubTotal($jumlah, $harga);
        //     $diskon = hitungDiskon($subTotal, $jumlah);
        //     $total = hitungTotal($subTotal, $diskon);

        //     $totalJumlah += $jumlah;
        //     $totalHarga += $harga;
        //     $grandSubTotal += $subTotal;
        //     $grandDiskon += $diskon;
        //     $grandTotal += $total;

        //     echo "<tr>
        //         <td>{$no}</td>
        //         <td>{$item['Nama']}</td>
        //         <td>{$jumlah}</td>
        //         <td>" . Rupiah($harga) . "</td>
        //         <td>" . Rupiah($subTotal) . "</td>
        //         <td>" . Rupiah($diskon) . "</td>
        //         <td>" . Rupiah($total) . "</td>
        //       </tr>";
        //     $no++;

        $no = 1;
        $total_jumlah = 0;
        $total_harga = 0;
        $total_subtotal = 0;
        $total_diskon = 0;
        $total_semua = 0;

        foreach ($barang as $b) {
            $subtotal = hitungSubtotal($b['jumlah'], $b['harga']);
            $diskon = hitungDiskon($subtotal, $b['jumlah']);
            // $diskon = hitungDiskon($subtotal);
            // $diskon = hitungDiskon($subtotal, $b['jumlah']);
            // $diskon = hitungDiskon($subtotal) $b['jumlah'];
            $total = hitungTotal($subtotal, $diskon);

            $total_jumlah += $b['jumlah'];
            $total_harga += $b['harga'];
            $total_subtotal += $subtotal;
            $total_diskon += $diskon;
            $total_semua += $total;

            echo "<tr>
                <td>{$no}</td>
                <td class='text-left'>{$b['nama']}</td>
                <td>{$b['jumlah']}</td>
                <td>" . rupiah($b['harga']) . "</td>
                <td>" . rupiah($subtotal) . "</td>
                <td>" . rupiah($diskon) . "</td>
                <td>" . rupiah($total) . "</td>
            </tr>";
            $no++;
        }
        ?>
    </tbody>
    <tfoot>
        <tr class="total-row">
            <td style="text-align: left;" colspan='2'>T O T A L</td>
            <td><?= $total_jumlah ?></td>
            <td><?= rupiah($total_harga) ?></td>
            <td><?= rupiah($total_subtotal) ?></td>
            <td><?= rupiah($total_diskon) ?></td>
            <td><?= rupiah($total_semua) ?></td>
        </tr>
    </tfoot>
</table>