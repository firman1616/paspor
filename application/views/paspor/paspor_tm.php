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
            top: 672px;
            /* atur sesuai posisi kotak biru */
            left: 256px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
        }

        .nama-depan {
            position: absolute;
            top: 710px;
            /* atur sesuai posisi kotak biru */
            left: 256px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
        }

        .negara {
            position: absolute;
            top: 730px;
            /* atur sesuai posisi kotak biru */
            left: 256px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
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
            top: 785px;
            /* atur sesuai posisi kotak biru */
            left: 256px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
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
            top: 825px;
            /* atur sesuai posisi kotak biru */
            left: 257px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
        }

        .tempat_lahir {
            position: absolute;
            top: 808px;
            /* atur sesuai posisi kotak biru */
            left: 348px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            /* color: #000; */
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

        .p {
            position: absolute;
            top: 615px;
            /* atur sesuai posisi kotak biru */
            left: 255px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            /* color: #000; */
        }

        .tkm {
            position: absolute;
            top: 615px;
            /* atur sesuai posisi kotak biru */
            left: 347px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            /* color: #000; */
        }

        .signature {
            position: absolute;
            bottom: 162px;
            /* atur jarak dari bawah halaman */
            left: 500px;
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
            font-size: 24px;
            /* lebih besar dari huruf biasa */
        }

        .tgl_dibuat {
            position: absolute;
            top: 863px;
            /* atur sesuai posisi kotak biru */
            left: 256px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #000;
        }

        .tgl_exp {
            position: absolute;
            top: 900px;
            /* atur sesuai posisi kotak biru */
            left: 256px;
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
        <p>TURKMENIST</p>
    </div>
    <div class="personalNumber">
        <?= $personalNumber ?>
    </div>
    <div class="tgl_lahir">
        <?= date('d.m.Y', strtotime($paspor->tgl_lahir)) ?>
    </div>
    <div class="autentikasi">
        <?= $kodeautentikasi ?>
    </div>
    <div class="gender">
        <?= ($paspor->gender === 'F') ? 'FEMALE' : 'MALE' ?>
    </div>
    <div class="tempat_lahir">
        <P>TKM</P>
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
        <?= date('d.m.y', strtotime($paspor->tgl_dibuat)) ?>
    </div>

    <div class="tgl_exp">
        <?= date('d.m.y', strtotime($paspor->tgl_exp)) ?>
    </div>

    <div class="p">
        <p>P</p>
    </div>

    <div class="tkm">
        <p>TKM</p>
    </div>

    <div class="mrz-line1">
        P<span class="lt">&lt;</span>TKM<?= strtoupper($paspor->nama_belakang_trans) ?><span class="lt">&lt;</span><?= strtoupper($paspor->nama_depan_trans) ?><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;</span>
        <!-- teruskan sesuai jumlah < yang kamu butuhkan -->
    </div>

    <div class="mrz-line2">
        <?= $noPasporTM ?><span class="lt">&lt;</span><?= $noFooter ?><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><?= $noFooter1digit ?>
        <!-- <?= $mrzLine2 ?> -->
    </div>

    <!-- <div class="mrz-line2">
        <?= $mrzLine2 ?>
    </div> -->

</body>

</html>