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

        .nama-belakang-atas {
            position: absolute;
            top: 208px;
            /* atur sesuai posisi kotak biru */
            left: 75px;
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

        .nama-depan-atas {
            position: absolute;
            top: 253px;
            /* atur sesuai posisi kotak biru */
            left: 75px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .nama-tengah {
            position: absolute;
            top: 305px;
            /* atur sesuai posisi kotak biru */
            left: 75px;
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

        .negara-atas {
            position: absolute;
            top: 373px;
            /* atur sesuai posisi kotak biru */
            left: 75px;
            /* geser kanan sesuai kotak biru */
            font-size: 14px;
            font-weight: bold;
            color: #6b6b6bff;
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
            top: 798px;
            /* atur sesuai posisi kotak biru */
            left: 273px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .tgl_lahir_atas {
            position: absolute;
            top: 350px;
            /* atur sesuai posisi kotak biru */
            left: 75px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            color: #6b6b6bff;
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

        .gender_atas {
            position: absolute;
            top: 255px;
            /* atur sesuai posisi kotak biru */
            right: 145px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
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

        .tempat_lahir_atas {
            position: absolute;
            top: 348px;
            /* atur sesuai posisi kotak biru */
            left: 305px;
            /* geser kanan sesuai kotak biru */
            font-size: 16px;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .no_paspor {
            position: absolute;
            top: 605px;
            /* atur sesuai posisi kotak biru */
            left: 583px;
            /* geser kanan sesuai kotak biru */
            font-size: 18px;
            font-weight: bold;
            color: #6b6b6bff;
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
            bottom: 185px;
            /* sesuaikan agar pas dengan kotak foto */
            left: 65px;
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
            top: 995px;
            /* atur sesuai posisi kotak biru */
            left: 65px;
            font-size: 18px;
            text-align: justify;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .mrz-line2 {
            position: absolute;
            bottom: 75px;
            /* atur sesuai posisi kotak biru */
            left: 65px;
            font-size: 18px;
            text-align: justify;
            font-weight: bold;
            color: #6b6b6bff;
        }

        .lt {
            font-size: 21px;
            font-weight: bold;
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
        .nama-belakang-atas,
        .nama-depan,
        .nama-depan-atas,
        .nama-tengah,
        .tempat_lahir,
        .tempat_lahir_atas,
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
    <div class="nama-belakang">
        <?= $paspor->nama_belakang ?>
    </div>
    <div class="nama-belakang-atas">
        <?= $paspor->nama_belakang ?>
    </div>
    <div class="nama-depan">
        <?= $paspor->nama_depan ?>
    </div>
    <div class="nama-depan-atas">
        <?= $paspor->nama_depan ?>
    </div>
    <div class="nama-tengah">
        <?= $paspor->nama_tengah ?>
    </div>
    <div class="negara">
        <p>O'ZBEKISTON RESPUBLIKASI FUQAROSI</p>
    </div>
    <div class="negara-atas">
        <p>O'ZBEKISTON RESPUBLIKASI FUQAROSI</p>
    </div>
    <div class="lembaga">
        <p>TOSHKENT VILOYATI <BR>O'RTACHIRCHIQ TUMANI IIB</p>
    </div>
    <div class="tgl_lahir">
        <?= date('d m Y', strtotime($paspor->tgl_lahir)) ?>
    </div>
    <div class="tgl_lahir_atas">
        <?= date('d m Y', strtotime($paspor->tgl_lahir)) ?>
    </div>
    <div class="gender">
        <?= $paspor->gender ?>
    </div>
    <div class="gender_atas">
        <?= ($paspor->gender == 'F') ? 'A Y O L' : 'O D A M' ?>
    </div>
    <div class="tempat_lahir">
        <?= $paspor->tempat_lahir ?>
    </div>

    <div class="tempat_lahir_atas">
        <?= $paspor->tempat_lahir ?>
    </div>

    <div class="no_paspor">
        <?= $noPasporUZ ?>
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
        <?= date('d m y', strtotime($paspor->tgl_dibuat)) ?>
    </div>

    <div class="tgl_exp">
        <?= date('d m y', strtotime($paspor->tgl_exp)) ?>
    </div>

    <div class="otorisasi">
        <!-- <?= $namaUzbek['full_name']; ?> -->
        FARG'0NA SH. ADLIYA<BR>BO'LIMI
    </div>

    <div class="dot-serial"><?= $noPasporUZ ?></div>

    <div class="mrz-line1">
        P <span class="lt">&lt;</span> UZB<?= strtoupper($paspor->nama_belakang_trans) ?><span class="lt">&lt;</span><span class="lt">&lt;</span><?= strtoupper($paspor->nama_depan_trans) ?><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span><span class="lt">&lt;</span>
        <!-- teruskan sesuai jumlah < yang kamu butuhkan -->
    </div>

    <div class="mrz-line2">
        <?= $noPasporUZ ?>UZB<?= $noFooter ?>
        <!-- <?= $mrzLine2 ?> -->
    </div>

</body>

</html>