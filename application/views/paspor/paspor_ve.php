<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        @font-face {
            font-family: 'DotMatrix';
            src: url('<?= base_url("assets/fonts/DotMatrix.ttf") ?>') format('truetype');
        }

        body {
            margin: 0;
            padding: 0;
            background-image: url('<?= $background ?>');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            /* font-family: Arial, Helvetica, sans-serif; */
        }

        .p {
            position: absolute;
            top: 617px;
            /* atur sesuai posisi kotak biru */
            left: 260px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #404040ff;
        }

        .ven {
            position: absolute;
            top: 617px;
            /* atur sesuai posisi kotak biru */
            left: 345px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #404040ff;
        }

        .nama-belakang {
            position: absolute;
            top: 669px;
            /* atur sesuai posisi kotak biru */
            left: 260px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #404040ff;
        }

        .nama-depan {
            position: absolute;
            top: 708px;
            /* atur sesuai posisi kotak biru */
            left: 260px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #404040ff;
        }

        .negara {
            position: absolute;
            top: 730px;
            /* atur sesuai posisi kotak biru */
            left: 260px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #404040ff;
        }

        .personalNumber {
            position: absolute;
            top: 745px;
            /* atur sesuai posisi kotak biru */
            right: 275px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #404040ff;
        }

        .lembaga {
            position: absolute;
            top: 412px;
            /* atur sesuai posisi kotak biru */
            left: 75px;
            /* geser kanan sesuai kotak biru */
            font-size: 14px;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .tgl_lahir {
            position: absolute;
            top: 787px;
            /* atur sesuai posisi kotak biru */
            left: 260px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #404040ff;
        }

        .gender {
            position: absolute;
            top: 787px;
            /* atur sesuai posisi kotak biru */
            left: 453px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #404040ff;
        }

        .tempat_lahir {
            position: absolute;
            top: 832px;
            /* atur sesuai posisi kotak biru */
            left: 453px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #404040ff;
        }

        .no_paspor {
            position: absolute;
            top: 633px;
            /* atur sesuai posisi kotak biru */
            right: 210px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #404040ff;
        }

        .signature {
            position: absolute;
            bottom: 150px;
            /* atur jarak dari bawah halaman */
            left: 225px;
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
            bottom: 160px;
            /* sesuaikan agar pas dengan kotak foto */
            left: 50px;
            /* geser ke kanan */
        }

        .foto-img {
            width: 190px;
            /* ukuran foto paspor */
            height: 280px;
            object-fit: cover;
            border-radius: 10px;
        }

        .mrz-line1 {
            position: absolute;
            bottom: 75px;
            /* atur sesuai posisi kotak biru */
            left: 35px;
            font-size: 20px;
            text-align: justify;
            font-weight: bold;
            color: #404040ff;
        }

        .mrz-line2 {
            position: absolute;
            bottom: 40px;
            /* atur sesuai posisi kotak biru */
            left: 35px;
            font-size: 20px;
            text-align: justify;
            font-weight: bold;
            color: #404040ff;
        }

        .lt {
            font-size: 24px;
            font-weight: bold;
            color: #404040ff;
            /* lebih besar dari huruf biasa */
        }

        .tgl_dibuat {
            position: absolute;
            top: 832px;
            /* atur sesuai posisi kotak biru */
            left: 253px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #404040ff;
        }

        .tgl_exp {
            position: absolute;
            top: 872px;
            /* atur sesuai posisi kotak biru */
            left: 253px;
            /* geser kanan sesuai kotak biru */
            font-size: 15px;
            font-weight: bold;
            color: #404040ff;
        }

        .otorisasi {
            position: absolute;
            bottom: 185px;
            /* atur sesuai posisi kotak biru */
            left: 495px;
            /* geser kanan sesuai kotak biru */
            font-size: 18px;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .nama-belakang,
        .nama-depan,
        .tempat_lahir,
        .otorisasi {
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

        .dot-serial {
            font-family: 'DotMatrix', monospace;
            font-size: 26px;
            letter-spacing: 4px;
            transform: rotate(-90deg);
            transform-origin: left top;
            position: absolute;
            right: 30px;
            /* sesuaikan posisi kanan */
            top: 200px;
            /* sesuaikan posisi vertikal */
            white-space: nowrap;
        }
    </style>
</head>

<body>

    <!-- tampilkan data -->
    <div class="p">
        <p>P</p>
    </div>
    <div class="ven">
        <p>VEN</p>
    </div>
    <div class="nama-belakang">
        <?= $paspor->nama_belakang ?>
    </div>
    <div class="nama-depan">
        <?= $paspor->nama_depan ?>
    </div>
    <div class="negara">
        <p>VENEZOLANA</p>
    </div>
    <div class="lembaga">
        <p>TOSHKENT VILOYATI <BR>O'RTACHIRCHIQ TUMANI IIB</p>
    </div>
    <div class="tgl_lahir">
        <?= date('d / M / M / Y', strtotime($paspor->tgl_lahir)) ?>
    </div>
    <div class="gender">
        <?= $paspor->gender ?>
    </div>
    <div class="tempat_lahir">
        <?= $paspor->tempat_lahir ?>
    </div>

    <div class="no_paspor">
        <?= $noPasporVE ?>
    </div>
    <div class="personalNumber">
        <?= $personalNumberVE ?>
    </div>
    <div class="signature">
        <img src="<?= base_url('assets/upload/paspor/' . $paspor->signature) ?>"
            alt="Tanda Tangan" class="signature-img">
    </div>

    <div class="foto">
        <img src="<?= base_url('assets/upload/paspor/' . $paspor->filefoto) ?>"
            alt="Foto Paspor" class="foto-img">
    </div>

    <div class="tgl_dibuat">
        <?= date('d / M / M / y', strtotime($paspor->tgl_dibuat)) ?>
    </div>

    <div class="tgl_exp">
        <?= date('d / M / M / y', strtotime($paspor->tgl_exp)) ?>
    </div>

    <div class="dot-serial"><?= $noPasporVE ?></div>

    <div class="mrz-line1">
        P<span class="lt">&lt;</span>VEN<?= strtoupper($paspor->nama_belakang_trans) ?><span class="lt">&lt;</span><span class="lt">&lt;</span><?= strtoupper($paspor->nama_depan_trans) ?><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span>
        <!-- teruskan sesuai jumlah < yang kamu butuhkan -->
    </div>

    <div class="mrz-line2">
        <?= $noPasporVE ?>4VEN<?= $noFooter ?><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><?= $noFooter2digit ?>
        <!-- <?= $mrzLine2 ?> -->
    </div>

</body>

</html>