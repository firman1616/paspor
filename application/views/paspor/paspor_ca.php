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
            top: 652px;
            /* atur sesuai posisi kotak biru */
            left: 322px;
            /* geser kanan sesuai kotak biru */
            font-size: 13px;
            /* font-weight: bold; */
            /* color: #000; */
        }

        .nama-depan {
            position: absolute;
            top: 683px;
            /* atur sesuai posisi kotak biru */
            left: 322px;
            /* geser kanan sesuai kotak biru */
            font-size: 13px;
            /* font-weight: bold; */
            /* color: #000; */
        }

        .negara {
            position: absolute;
            top: 699px;
            /* atur sesuai posisi kotak biru */
            left: 322px;
            /* geser kanan sesuai kotak biru */
            font-size: 13px;
            /* font-weight: bold; */
            /* color: #000; */
        }

        .tgl_lahir {
            position: absolute;
            top: 743px;
            /* atur sesuai posisi kotak biru */
            left: 322px;
            /* geser kanan sesuai kotak biru */
            font-size: 13px;
            /* font-weight: bold; */
            /* color: #000; */
        }

        .gender {
            position: absolute;
            top: 772px;
            /* atur sesuai posisi kotak biru */
            left: 322px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            /* font-weight: bold; */
            /* color: #000; */
        }

        .tempat_lahir {
            position: absolute;
            top: 760px;
            /* atur sesuai posisi kotak biru */
            left: 369px;
            /* geser kanan sesuai kotak biru */
            font-size: 13px;
            /* font-weight: bold; */
            /* color: #000; */
        }

        .no_paspor {
            position: absolute;
            top: 619px;
            /* atur sesuai posisi kotak biru */
            left: 545px;
            /* geser kanan sesuai kotak biru */
            font-size: 14px;
            font-weight: bold;
            color: #383737ff;
        }

        .no_paspor_bawah {
            position: absolute;
            top: 822px;
            /* atur sesuai posisi kotak biru */
            left: 528px;
            /* geser kanan sesuai kotak biru */
            font-size: 13px;
            font-weight: bold;
            /* color: #000; */
        }

        .p {
            position: absolute;
            top: 602px;
            /* atur sesuai posisi kotak biru */
            left: 333px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            /* font-weight: bold; */
            /* color: #000; */
        }

        .can {
            position: absolute;
            top: 602px;
            /* atur sesuai posisi kotak biru */
            left: 410px;
            /* geser kanan sesuai kotak biru */
            font-size: 14px;
            /* font-weight: bold; */
            /* color: #000; */
        }

        .signature {
            position: absolute;
            top: 240px;
            /* atur jarak dari bawah halaman */
            left: 345px;
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
            top: 637px;
            /* sesuaikan agar pas dengan kotak foto */
            left: 205px;
            /* geser ke kanan */
        }

        .foto-img {
            width: 120px;
            /* sesuaikan ukuran */
            height: 140px;
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
            font-size: 16px;
            /* font-weight: bold; */
            letter-spacing: 0px;
            text-align: justify;
        }

        .mrz-line1 {
            position: absolute;
            top: 943px;
            /* atur sesuai posisi kotak biru */
            left: 205px;
        }

        .mrz-line2 {
            position: absolute;
            top: 965px;
            /* atur sesuai posisi kotak biru */
            left: 205px;
        }

        .lt {
            font-size: 18px;
            /* lebih besar dari huruf biasa */
        }

        .tgl_dibuat {
            position: absolute;
            top: 807px;
            /* atur sesuai posisi kotak biru */
            left: 322px;
            /* geser kanan sesuai kotak biru */
            font-size: 13px;
            /* font-weight: bold; */
            color: #000;
        }

        .tgl_exp {
            position: absolute;
            top: 838px;
            /* atur sesuai posisi kotak biru */
            left: 322px;
            /* geser kanan sesuai kotak biru */
            font-size: 13px;
            /* font-weight: bold; */
            /* color: #000; */
        }

        .ircc {
            position: absolute;
            top: 855px;
            /* atur sesuai posisi kotak biru */
            left: 322px;
            /* geser kanan sesuai kotak biru */
            font-size: 13px;
            /* font-weight: bold; */
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
        <p>CANADIAN</p>
    </div>
    <div class="tgl_lahir">
        <?= $tgl_lahir_indo ?> / <?= strtoupper($bulan_tahun_fr) ?>
    </div>
    <div class="gender">
        <?= $paspor->gender ?>
    </div>
    <div class="tempat_lahir">
        <P><?= $paspor->tempat_lahir ?></P>
    </div>

    <div class="no_paspor">
        <?= $noPasporCA ?>
    </div>

    <div class="no_paspor_bawah">
        <?= $noPasporCA ?>
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
        <?= date('d.m.y', strtotime($paspor->tgl_dibuat)) ?>
    </div>

    <div class="tgl_exp">
        <?= date('d.m.y', strtotime($paspor->tgl_exp)) ?>
    </div>

    <div class="p">
        <p>P</p>
    </div>

    <div class="can">
        <p>CAN</p>
    </div>

    <div class="ircc">
        <p>IRCC</p>
    </div>

    <div class="mrz-line1">
        P<span class="lt">&lt;</span>CAN<?= strtoupper($paspor->nama_belakang_trans) ?><span class="lt">&lt;&lt;</span><?= strtoupper($paspor->nama_depan_trans) ?><span class="lt">&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</span>
        <!-- teruskan sesuai jumlah < yang kamu butuhkan -->
    </div>
    <?php
    // generate MRZ Line 2 dengan panjang fix 44 karakter
    $line2 = str_replace(' ', '', $noPasporCA) . '<span class="lt">&lt;</span>' . $noFooter;

    $totalLength = 44;
    // sisakan space buat digit terakhir ($noFooter1digit)
    $remaining = $totalLength - strlen($line2) - strlen($noFooter1digit);

    // $fill = str_repeat(, max(0, $remaining));

    $mrzLine2 = $line2 . '<span class="lt">&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</span>' . $noFooter1digit;
    ?>

    <div class="mrz-line2">
        <?= $mrzLine2 ?>
    </div>

</body>

</html>