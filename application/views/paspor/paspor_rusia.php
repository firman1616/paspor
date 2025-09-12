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

        .signature {
            position: absolute;
            bottom: 140px;
            /* atur jarak dari bawah halaman */
            left: 550px;
            /* atur posisi horizontal */
        }

        .signature-img {
            width: 155px;
            /* atur ukuran tanda tangan */
            height: auto;
        }

        .signature-dup {
            position: absolute;
            top: 475px;
            /* atur jarak dari bawah halaman */
            left: 355px;
            /* atur posisi horizontal */
        }

        .signature-img-dup {
            width: 155px;
            /* atur ukuran tanda tangan */
            height: auto;
        }

        .foto {
            position: absolute;
            top: 720px;
            /* sesuaikan agar pas dengan kotak foto */
            left: 50px;
            /* geser ke kanan */
        }

        .foto-img {
            width: 165px;
            /* ukuran foto paspor */
            height: 205px;
            object-fit: cover;
        }

        .stempel {
            position: absolute;
            top: 870px;
            /* sesuaikan posisi stempel */
            left: 150px;
        }

        .stempel-img {
            width: 125px;
            height: auto;
            opacity: 0.8;
            /* transparan dikit biar mirip stempel asli */
        }

        .mrz-line1 {
            position: absolute;
            bottom: 80px;
            /* jarak dari bawah halaman */
            left: 50px;
            font-family: 'Courier New', monospace;
            /* font monospace biar mirip MRZ */
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .mrz-line2 {
            position: absolute;
            bottom: 60px;
            /* tepat di bawah line 1 */
            left: 50px;
            font-family: 'Courier New', monospace;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 2px;
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
    <div class="signature">
        <img src="<?= base_url('assets/upload/paspor/' . $paspor->signature) ?>"
            alt="Tanda Tangan" class="signature-img">
    </div>
    <div class="signature-dup">
        <img src="<?= base_url('assets/upload/paspor/' . $paspor->signature) ?>"
            alt="Tanda Tangan" class="signature-img-dup">
    </div>

    <div class="foto">
        <img src="<?= base_url('assets/upload/paspor/' . $paspor->filefoto) ?>"
            alt="Foto Paspor" class="foto-img">
    </div>

    <div class="stempel">
        <img src="<?= base_url('assets/upload/paspor/' . $paspor->filestempel) ?>"
            alt="Stempel" class="stempel-img">
    </div>

    <div class="mrz-line1">
        P&lt;<?= strtoupper($paspor->nama_depan_trans) ?>&lt;&lt;<?= strtoupper($paspor->nama_depan_trans) ?>&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;
    </div>
    <br>
    <div class="mrz-line2">
        <?= str_replace(' ', '', $noPaspor) ?>&lt;0RUS<?= $noFooter ?>&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;06
    </div>


                    <!-- <?= $paspor->nama_belakang_trans ?><<<?= $paspor->nama_depan_trans ?><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<br>
        <?= $noPaspor ?>0RUS<?= $noFooter ?><<<<<<<<<<<<<<<<<<<<<<<<<?= '06' ?> -->
</body>

</html>