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
            font-family: Arial, Helvetica, sans-serif;
        }

        .nama-belakang {
            position: absolute;
            top: 660px;
            /* atur sesuai posisi kotak biru */
            left: 270px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .nama-depan {
            position: absolute;
            top: 715px;
            /* atur sesuai posisi kotak biru */
            left: 270px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .negara {
            position: absolute;
            top: 750px;
            /* atur sesuai posisi kotak biru */
            left: 273px;
            /* geser kanan sesuai kotak biru */
            font-size: 14px;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .personalNumber {
            position: absolute;
            top: 745px;
            /* atur sesuai posisi kotak biru */
            left: 517px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
        }

        .tgl_lahir {
            position: absolute;
            top: 798px;
            /* atur sesuai posisi kotak biru */
            left: 273px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .autentikasi {
            position: absolute;
            top: 785px;
            /* atur sesuai posisi kotak biru */
            left: 517px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
        }

        .gender {
            position: absolute;
            top: 832px;
            /* atur sesuai posisi kotak biru */
            left: 290px;
            /* geser kanan sesuai kotak biru */
            font-size: 17px;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .tempat_lahir {
            position: absolute;
            top: 832px;
            /* atur sesuai posisi kotak biru */
            left: 375px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .no_paspor {
            position: absolute;
            top: 632px;
            /* atur sesuai posisi kotak biru */
            left: 517px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            /* color: #000; */
        }

        .no_paspor_bawah {
            position: absolute;
            top: 822px;
            /* atur sesuai posisi kotak biru */
            left: 528px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            /* color: #000; */
        }

        .signature {
            position: absolute;
            top: 468px;
            /* atur jarak dari bawah halaman */
            left: 386px;
            /* atur posisi horizontal */
        }

        .signature-img {
            width: 197px;
            /* atur ukuran tanda tangan */
            height: 202px;
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

        .foto-wrapper {
            position: relative;
            width: 120px;
            /* sesuaikan ukuran */
            height: 140px;
            /* sesuaikan ukuran */
            background: url('<?= base_url("assets/img/frame.png") ?>') no-repeat center center;
            background-size: contain;
            /* biar pas */
        }

        .foto-wrapper .foto-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            clip-path: circle(47% at 50% 50%);
            /* opsional, biar tidak keluar frame */
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
            font-size: 23px;
            /* lebih besar dari huruf biasa */
        }

        .tgl_dibuat {
            position: absolute;
            bottom: 210px;
            /* atur sesuai posisi kotak biru */
            left: 273px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .tgl_exp {
            position: absolute;
            bottom: 175px;
            /* atur sesuai posisi kotak biru */
            left: 273px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            color: #6b6b6bff;
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
        <?= $paspor->nama_belakang ?>
    </div>
    <div class="nama-depan">
        <?= $paspor->nama_depan ?>
    </div>
    <div class="negara">
        <p>O'ZBEKISTON RESPUBLIKASI FUQAROSI</p>
    </div>
    <div class="personalNumber">
        <?= $personalNumber ?>
    </div>
    <div class="tgl_lahir">
        <?= date('d m Y', strtotime($paspor->tgl_lahir)) ?>
    </div>
    <div class="autentikasi">
        <?= $kodeautentikasi ?>
    </div>
    <div class="gender">
        <?= $paspor->gender?>
    </div>
    <div class="tempat_lahir">
        <?= $paspor->tempat_lahir ?>
    </div>

    <div class="no_paspor">
        <?= $noPasporTM ?>
    </div>

    <div class="no_paspor_bawah">
        <?= $noPasporTM ?>
    </div>

    <div class="signature">
        <img src="<?= base_url('assets/upload/paspor/' . $paspor->signature) ?>"
            alt="Tanda Tangan" class="signature-img">
    </div>

    <div class="foto">
        <img src="<?= base_url('assets/upload/paspor/' . $paspor->filefoto) ?>"
            alt="Foto Paspor" class="foto-img">
    </div>

    <div class="foto-wrapper">
        <img src="<?= base_url('assets/upload/paspor/' . $paspor->filefoto) ?>"
            alt="Foto Paspor" class="foto-img">
    </div>

    <div class="tgl_dibuat">
        <?= date('d m y', strtotime($paspor->tgl_dibuat)) ?>
    </div>

    <div class="tgl_exp">
        <?= date('d m y', strtotime($paspor->tgl_exp)) ?>
    </div>

    <div class="mrz-line1">
        P<span class="lt">&lt;</span>TKM<?= strtoupper($paspor->nama_belakang_trans) ?><span class="lt">&lt;</span><?= strtoupper($paspor->nama_depan_trans) ?><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</span>
        <!-- teruskan sesuai jumlah < yang kamu butuhkan -->
    </div>
    <?php
    // generate MRZ Line 2 dengan panjang fix 44 karakter
    $line2 = str_replace(' ', '', $noPasporTM) . '<span class="lt">&lt;</span>' . $noFooter;

    $totalLength = 44;
    // sisakan space buat digit terakhir ($noFooter1digit)
    $remaining = $totalLength - strlen($line2) - strlen($noFooter1digit);

    // $fill = str_repeat(, max(0, $remaining));

    $mrzLine2 = $line2 . '<span class="lt">&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</span>' . $noFooter1digit;
    ?>

    <div class="mrz-line2">
        <?= $mrzLine2 ?>
    </div>

</body>

</html>