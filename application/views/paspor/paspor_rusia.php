<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('<?= $background ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .nama-belakang {
            position: absolute;
            top: 668px;
            /* atur sesuai posisi kotak biru */
            left: 251px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #000;
        }

        .nama-depan {
            position: absolute;
            top: 725px;
            /* atur sesuai posisi kotak biru */
            left: 251px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #000;
        }

        .tgl_lahir {
            position: absolute;
            top: 812px;
            /* atur sesuai posisi kotak biru */
            left: 251px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #000;
        }

        .gender {
            position: absolute;
            top: 845px;
            /* atur sesuai posisi kotak biru */
            left: 251px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #000;
        }

        .tempat_lahir {
            position: absolute;
            top: 845px;
            /* atur sesuai posisi kotak biru */
            left: 343px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #000;
        }

        .kode_omc {
            position: absolute;
            top: 877px;
            /* atur sesuai posisi kotak biru */
            left: 518px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #000;
        }

        .no_paspor {
            position: absolute;
            top: 627px;
            /* atur sesuai posisi kotak biru */
            left: 517px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #000;
        }
    </style>
</head>

<body>

    <!-- tampilkan data -->
    <div class="nama-belakang">
        <?= $paspor->nama_belakang ?> / <br><?= $paspor->nama_belakang_trans ?>
    </div>
    <div class="nama-depan">
        <?= $paspor->nama_depan ?> / <br><?= $paspor->nama_depan_trans ?>
    </div>
    <div class="tgl_lahir">
        <?= date('d.m.Y', strtotime($paspor->tgl_lahir)) ?>
    </div>
    <div class="gender">
        <?= $paspor->gender ?>
    </div>
    <div class="tempat_lahir">
        <?= $paspor->tempat_lahir ?> / <?= $paspor->tempat_lahir_trans ?>
    </div>
    <div class="kode_omc">
        <?= $kodeOMC ?>
    </div>
    <div class="no_paspor">
        <?= $noPaspor ?>
    </div>

</body>

</html>