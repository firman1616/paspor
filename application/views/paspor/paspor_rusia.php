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
            font-family: Calibri, sans-serif;
        }

        .nama-belakang {
            position: absolute;
            top: 668px;
            /* atur sesuai posisi kotak biru */
            left: 251px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
        }

        .nama-depan {
            position: absolute;
            top: 725px;
            /* atur sesuai posisi kotak biru */
            left: 251px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
        }

        .tgl_lahir {
            position: absolute;
            top: 812px;
            /* atur sesuai posisi kotak biru */
            left: 251px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
        }

        .gender {
            position: absolute;
            top: 845px;
            /* atur sesuai posisi kotak biru */
            left: 251px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
        }

        .tempat_lahir {
            position: absolute;
            top: 845px;
            /* atur sesuai posisi kotak biru */
            left: 343px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
        }

        .kode_omc {
            position: absolute;
            top: 877px;
            /* atur sesuai posisi kotak biru */
            left: 518px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
        }

        .no_paspor {
            position: absolute;
            top: 627px;
            /* atur sesuai posisi kotak biru */
            left: 517px;
            /* geser kanan sesuai kotak biru */
            font-size: 23px;
            font-weight: bold;
            /* color: #000; */
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

        .signature-img,
        .signature-img-dup {
            width: 155px;
            height: auto;
            filter: contrast(300%) brightness(0.8);
        }


        .foto {
            position: absolute;
            top: 660px;
            /* sesuaikan agar pas dengan kotak foto */
            left: 50px;
            /* geser ke kanan */
        }

        .foto-img {
            width: 180px;
            /* ukuran foto paspor */
            height: 270px;
            object-fit: cover;
            border-radius: 10px;
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

        .mrz-line1,
        .mrz-line2 {
            font-family: 'Calibri', monospace;
            font-size: 23px;
            font-weight: bold;
            letter-spacing: 0px;
            text-align: justify;
        }

        .mrz-line1 {
            position: absolute;
            top: 995px;
            /* atur sesuai posisi kotak biru */
            left: 65px;
            font-size: 21px;
            text-align: justify;
        }

        .mrz-line2 {
            position: absolute;
            bottom: 65px;
            /* atur sesuai posisi kotak biru */
            left: 65px;
            font-size: 21px;
            text-align: justify;
        }

        .lt {
            font-size: 24px;
            /* lebih besar dari huruf biasa */
        }

        .tgl_dibuat {
            position: absolute;
            top: 879px;
            /* atur sesuai posisi kotak biru */
            left: 250px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #000;
        }

        .tgl_exp {
            position: absolute;
            top: 925px;
            /* atur sesuai posisi kotak biru */
            left: 250px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
        }

        .nama-belakang,
        .nama-depan,
        .tempat_lahir {
            text-transform: uppercase;
        }

        .nama-belakang,
        .nama-depan,
        .tgl_lahir,
        .gender,
        .tempat_lahir,
        .kode_omc,
        .no_paspor,
        .tgl_dibuat,
        .tgl_exp,
        .mrz-line1,
        .mrz-line2 {
            filter: blur(1px);
            /* angka kecil biar ga terlalu buram */
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
        <?= $paspor->gender ?> / <?= $paspor->gender ?>
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

    <div class="tgl_dibuat">
        <?= $paspor->tgl_dibuat ?>
    </div>

    <div class="tgl_exp">
        <?= $paspor->tgl_exp ?>
    </div>

    <div class="mrz-line1">
        P<span class="lt">&lt;</span><?= strtoupper($paspor->nama_belakang_trans) ?><span class="lt">&lt;</span><span class="lt">&lt;</span><?= strtoupper($paspor->nama_depan_trans) ?><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</span>
        <!-- teruskan sesuai jumlah < yang kamu butuhkan -->
    </div>
    <?php
    // generate MRZ Line 2 dengan panjang fix 44 karakter
    $line2 = str_replace(' ', '', $noPaspor) . $noFooter1digit . 'RUS' . $noFooter;

    $totalLength = 44;
    // sisakan space buat digit terakhir ($noFooter1digit)
    $remaining = $totalLength - strlen($line2) - strlen($noFooter1digit);

    $fill = str_repeat('<span class="lt">&lt;</span>', max(0, $remaining));

    $mrzLine2 = $line2 . $fill . '<span class="lt">&lt;</span>' . $noFooter1digit;
    ?>

    <div class="mrz-line2">
        <?= $mrzLine2 ?>
    </div>



    <!-- <?= $paspor->nama_belakang_trans ?><<<?= $paspor->nama_depan_trans ?><<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<br>
        <?= $noPaspor ?>0RUS<?= $noFooter ?><<<<<<<<<<<<<<<<<<<<<<<<<?= '06' ?> -->
</body>

</html>