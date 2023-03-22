<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css\style.css') }}" media="all" /> -->
    <style>
        @page {
            size: 7in 9.25in;
            margin: 27mm 16mm 27mm 16mm;
        }

        hr {
            margin-bottom: 1rem;
            border: 1;
            border-top: 2px solid black;
        }

        * {
            box-sizing: border-box;
            font-size: 14px;
            padding-left: 10px;
            padding-right: 10px;
        }

        /* Create three equal columns that floats next to each other */
        .col {
            float: left;
            padding-left: 50px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* table#data,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        } */

        table.center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
    <title>Cetak Surat Jalan</title>
</head>

<body>
    <div class="container-fluid">
        <div class="header">
            <div style="text-align: center;">
                <h4>DINAS PEMUDA DAN OLAHRAGA</h4>
                <p>Komp sor Jalak Harupat kecamatan Kutawaringin Kab. Bandung</p>
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-md-12">
                <table style="border-collapse: collapse;width: 100%;">
                    <tr>
                        <td>No. Faktur .................</td>
                        <td>&nbsp;</td>
                        <td style="text-align: right;"><strong></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Soreang, <?php echo date("d-m-Y"); ?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Kepada Yth,</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong></strong></td>
                        <td>&nbsp;</td>
                        <td style="text-align: right;"><strong></strong></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>{{$header->desa_kelurahan}}</td>
                    </tr>
                    <tr>
                        <td><strong></strong></td>
                        <td>&nbsp;</td>
                        <td style="text-align: right;"><strong></strong></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>{{$header->kecamatan}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br><br>
        <div class="row ml-2 mr-2">
            <div class="col-md-12">
                <table style="border: 1px solid black;border-collapse: collapse;width: 100%;">
                    <thead>
                        <tr style="border: 1px solid black;border-collapse: collapse;">
                            <th style="border: 1px solid black;border-collapse: collapse;">No</th>
                            <th style="border: 1px solid black;border-collapse: collapse;">NAMA BARANG</th>
                            <th style="border: 1px solid black;border-collapse: collapse;">QTY</th>
                        </tr>
                    </thead>
                    <tbod>
                        <?php $i = 1; ?>
                        @foreach($details as $item)
                        <tr style="border: 1px solid black;border-collapse: collapse;">
                            <td style="border: 1px solid black;border-collapse: collapse; text-align: center;"><?php echo $i++ ?></td>
                            <td style="border: 1px solid black;border-collapse: collapse;">{{$item->nama_prasarana}}</td>
                            <td style="border: 1px solid black;border-collapse: collapse;text-align: center;">{{$item->jumlah}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br><br><br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table style="border-collapse: collapse;width: 100%;">
                    <tr>
                        <td><strong>Yang Menerima</strong></td>
                        <td>&nbsp;</td>
                        <td style="text-align: right;"><strong>Verifikator</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><strong></strong></td>
                        <td>&nbsp;</td>
                        <td style="text-align: right;"><strong></strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
