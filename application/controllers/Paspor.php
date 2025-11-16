<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Paspor extends CI_Controller

{



    public function __construct()

    {

        parent::__construct();

        if (!$this->session->userdata('logged_in')) {

            redirect('login');
        }
    }

    public function index()

    {

        $data = [

            'title'        => 'Paspor',

            'conten'       => 'paspor/index.php',

            'footer_js' => array('assets/js/paspor.js'),

            'get_country' =>  $this->getNegaraList(),

        ];

        $this->load->view('template/conten', $data);
    }



    function tablePaspor()

    {

        $data['paspor'] = $this->m_data->get_data('tbl_paspor')->result();



        echo json_encode($this->load->view('paspor/paspor-table', $data, false));
    }



    private function getNegaraList()

    {

        return [

            'ru_RU' => 'Rusia',

            'tk_TM' => 'Turkmenistan',

            'uz_UZ' => 'Uzbekistan',

            've_VE' => 'Venezuela',

            // 'ca_CA' => 'Kanada',

            // 'id_ID' => 'Indonesia',

            // 'en_US' => 'Amerika Serikat',

            // 'fr_FR' => 'Perancis',

            // 'ja_JP' => 'Jepang',

            // 'de_DE' => 'Jerman',

            // 'es_ES' => 'Spanyol',

            // 'zh_CN' => 'China',

        ];
    }



    private function fakerFirstAvailable(\Faker\Generator $faker, array $formatters)

    {

        foreach ($formatters as $fmt) {

            try {

                // panggil formatter apa pun (city, state, dst.)

                return $faker->format($fmt);   // setara dengan $faker->{$fmt}()

            } catch (\InvalidArgumentException $e) {

                continue;
            }
        }

        return 'Tidak diketahui';
    }



    private function transliterateRussian($text)

    {

        $converter = [

            'А' => 'A',

            'Б' => 'B',

            'В' => 'V',

            'Г' => 'G',

            'Д' => 'D',

            'Е' => 'E',

            'Ё' => 'Yo',

            'Ж' => 'Zh',

            'З' => 'Z',

            'И' => 'I',

            'Й' => 'Y',

            'К' => 'K',

            'Л' => 'L',

            'М' => 'M',

            'Н' => 'N',

            'О' => 'O',

            'П' => 'P',

            'Р' => 'R',

            'С' => 'S',

            'Т' => 'T',

            'У' => 'U',

            'Ф' => 'F',

            'Х' => 'Kh',

            'Ц' => 'Ts',

            'Ч' => 'Ch',

            'Ш' => 'Sh',

            'Щ' => 'Shch',

            'Ъ' => '',

            'Ы' => 'Y',

            'Ь' => '',

            'Э' => 'E',

            'Ю' => 'Yu',

            'Я' => 'Ya',

            'а' => 'a',

            'б' => 'b',

            'в' => 'v',

            'г' => 'g',

            'д' => 'd',

            'е' => 'e',

            'ё' => 'yo',

            'ж' => 'zh',

            'з' => 'z',

            'и' => 'i',

            'й' => 'y',

            'к' => 'k',

            'л' => 'l',

            'м' => 'm',

            'н' => 'n',

            'о' => 'o',

            'п' => 'p',

            'р' => 'r',

            'с' => 's',

            'т' => 't',

            'у' => 'u',

            'ф' => 'f',

            'х' => 'kh',

            'ц' => 'ts',

            'ч' => 'ch',

            'ш' => 'sh',

            'щ' => 'shch',

            'ъ' => '',

            'ы' => 'y',

            'ь' => '',

            'э' => 'e',

            'ю' => 'yu',

            'я' => 'ya',

        ];

        return strtr($text, $converter);
    }





    public function generateNama()

    {

        $locale = $this->input->post('locale');

        if (!$locale) {

            echo json_encode(['error' => 'Locale tidak ditemukan']);

            return;
        }



        $faker = Faker\Factory::create($locale);



        // generate nama lengkap

        $fullName = $faker->name;

        $parts = explode(" ", $fullName);



        $nama_depan = $parts[0];

        $nama_belakang = count($parts) > 1 ? $parts[count($parts) - 1] : '';



        $nama_tengah = '';

        $nama_tengah_en = '';



        // ✅ Khusus untuk Uzbekistan → generate nama tengah

        if ($locale === "uz_UZ") {

            // Bisa pakai nama depan tambahan dari faker

            $nama_tengah = $faker->firstName;

            $nama_tengah_en = $nama_tengah;
        }



        $nama_depan_en = $nama_depan;

        $nama_belakang_en = $nama_belakang;



        // transliterasi hanya jika locale Rusia

        if ($locale === "ru_RU") {

            $nama_depan_en    = $this->transliterateRussian($nama_depan);

            $nama_belakang_en = $this->transliterateRussian($nama_belakang);
        }



        // generate tempat lahir sesuai locale

        $tempat_lahir = $faker->city;  // faker city sesuai locale

        $tempat_lahir_en = $tempat_lahir;



        // kalau locale rusia → transliterasi nama kota juga

        if ($locale === "ru_RU") {

            $tempat_lahir_en = $this->transliterateRussian($tempat_lahir);
        }



        $tgl_lahir = $faker->dateTimeBetween('1985-01-01', '1992-12-31')->format('Y-m-d');

        $tgl_dibuat = $faker->dateTimeBetween('2020-01-01', '2024-12-31')->format('Y-m-d');

        $gender = $faker->randomElement(['M', 'F']);



        echo json_encode([

            'nama_depan'       => $nama_depan,

            'nama_tengah'      => $nama_tengah,

            'nama_belakang'    => $nama_belakang,

            'nama_depan_en'    => $nama_depan_en,

            'nama_tengah_en'   => $nama_tengah_en,

            'nama_belakang_en' => $nama_belakang_en,

            'tempat_lahir'     => $tempat_lahir,

            'tempat_lahir_en'  => $tempat_lahir_en,

            'tgl_lahir'        => $tgl_lahir,

            'tgl_dibuat'       => $tgl_dibuat,

            'gender'           => $gender

        ]);
    }

    public function bulkGenerate()
    {
        $locale = $this->input->post('locale');
        $jumlah = (int) $this->input->post('jumlah');

        if (!$locale || $jumlah <= 0) {
            echo json_encode(['status' => 'error', 'message' => 'Negara dan jumlah wajib diisi.']);
            return;
        }

        $this->load->model('M_paspor');

        // 🔹 Mapping kode locale ke nama negara
        $locale_map = [
            'ru_RU' => 'Rusia',
            'uz_UZ' => 'Uzbekistan',
            'en_US' => 'Amerika Serikat',
            'id_ID' => 'Indonesia',
            'ja_JP' => 'Jepang',
            'fr_FR' => 'Perancis',
            'de_DE' => 'Jerman',
            'cn_ZH' => 'Tiongkok',
            'tr_TR' => 'Turki',
            'in_IN' => 'India',
            'tk_TM' => 'Turkmenistan',
            've_VE' => 'Venezuela',
            // tambahkan sesuai kebutuhanmu
        ];

        $asal_negara = isset($locale_map[$locale]) ? $locale_map[$locale] : $locale;

        $inserted = 0;
        for ($i = 0; $i < $jumlah; $i++) {
            $_POST['locale'] = $locale;
            ob_start();
            $this->generateNama();
            $json = ob_get_clean();

            $data = json_decode($json, true);
            if (!$data) continue;

            // Hitung tanggal expired (tgl_dibuat + 6 tahun)
            $tgl_dibuat = new DateTime($data['tgl_dibuat']);
            $tgl_exp = clone $tgl_dibuat;
            $tgl_exp->modify('+6 years');
            $tgl_exp_formatted = $tgl_exp->format('Y-m-d');

            $save = [
                'nama_depan'          => $data['nama_depan'],
                'nama_tengah'         => $data['nama_tengah'],
                'nama_belakang'       => $data['nama_belakang'],
                'nama_depan_trans'    => $data['nama_depan_en'],
                'nama_belakang_trans' => $data['nama_belakang_en'],
                'tempat_lahir'        => $data['tempat_lahir'],
                'tempat_lahir_trans'  => $data['tempat_lahir_en'],
                'tgl_lahir'           => $data['tgl_lahir'],
                'tgl_dibuat'          => $data['tgl_dibuat'],
                'tgl_exp'             => $tgl_exp_formatted, // ✅ tambahkan ini
                'gender'              => $data['gender'],
                'kode_negara'         => $locale,
                'asal_negara'         => $asal_negara,
            ];

            if ($this->M_paspor->insertPaspor($save)) {
                $inserted++;
            }
        }

        echo json_encode(['status' => 'success', 'inserted' => $inserted]);
    }

    // bulk delete
    public function bulkDeletePaspor()
    {
        $jumlah = $this->input->post('jumlah_data_dihapus');

        if (!$jumlah || !is_numeric($jumlah)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Jumlah data tidak valid.'
            ]);
            return;
        }

        // load model
        $this->load->model('M_paspor');

        // ambil data paling lama sesuai limit input
        $oldData = $this->M_paspor->getOldestData($jumlah);

        if (empty($oldData)) {
            echo json_encode([
                'status' => 'warning',
                'message' => 'Tidak ada data yang bisa dihapus.'
            ]);
            return;
        }

        // kumpulkan id untuk dihapus
        $ids = array_map(function ($row) {
            return $row->id;
        }, $oldData);

        // hapus data
        $this->M_paspor->deleteByIds($ids);

        echo json_encode([
            'status' => 'success',
            'message' => count($ids) . ' data berhasil dihapus.'
        ]);
    }


    public function simpan()

    {

        $kode_negara  = $this->input->post('negara');

        $nama_depan   = $this->input->post('nama_depan');

        $nama_tengah = $this->input->post('nama_tengah');

        $nama_belakang = $this->input->post('nama_belakang');

        $tempat_lahir = $this->input->post('tempat_lahir');

        $tempat_lahir_en = $this->input->post('tempat_lahir_en');

        $asal_negara  = $this->input->post('asal_negara');

        $tgl_lahir    = $this->input->post('tgl_lahir');

        $gender       = $this->input->post('gender');

        $nama_depan_trans       = $this->input->post('nama_depan_en');

        $nama_belakang_trans       = $this->input->post('nama_belakang_en');

        $tgl_dibuat = $this->input->post('date_create');

        $tgl_exp = null;

        if ($tgl_dibuat) {

            $tgl_exp = date('Y-m-d', strtotime($tgl_dibuat . ' +10 years'));
        }





        // konfigurasi upload

        $config['upload_path']   = './assets/upload/paspor/';

        $config['allowed_types'] = 'jpg|jpeg|png|gif';

        $config['max_size']      = 2048;



        $this->load->library('upload', $config);



        // upload foto

        $filefoto = null;

        if (!empty($_FILES['filefoto']['name'])) {

            $config['file_name'] = time() . '_foto';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('filefoto')) {

                $filefoto = $this->upload->data('file_name');
            } else {

                echo json_encode([

                    'status'  => 'error',

                    'message' => strip_tags($this->upload->display_errors())

                ]);

                return;
            }
        }



        // upload stempel

        $filestempel = null;

        if (!empty($_FILES['filestempel']['name'])) {

            $config['file_name'] = time() . '_stempel';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('filestempel')) {

                $filestempel = $this->upload->data('file_name');
            } else {

                echo json_encode([

                    'status'  => 'error',

                    'message' => strip_tags($this->upload->display_errors())

                ]);

                return;
            }
        }



        $signatureBase64 = $this->input->post('signature');



        $signatureFile = null;

        if ($signatureBase64) {

            $signatureBase64 = str_replace('data:image/png;base64,', '', $signatureBase64);

            $signatureBase64 = str_replace(' ', '+', $signatureBase64);

            $signatureData = base64_decode($signatureBase64);



            $signatureFile = time() . '_signature.png';

            file_put_contents(FCPATH . 'assets/upload/paspor/' . $signatureFile, $signatureData);
        }



        // data yang disimpan

        $data = [

            'kode_negara'  => $kode_negara,

            'nama_depan'   => $nama_depan,

            'nama_belakang' => $nama_belakang,

            'tempat_lahir' => $tempat_lahir,

            'tempat_lahir_trans' => $tempat_lahir_en,

            'asal_negara'  => $asal_negara,

            'tgl_lahir'    => $tgl_lahir,

            'gender'       => $gender,

            'filefoto'     => $filefoto,

            'filestempel'  => $filestempel,

            'nama_depan_trans'  => $nama_depan_trans,

            'nama_belakang_trans'  => $nama_belakang_trans,

            'signature'            => $signatureFile, // simpan nama file

            'tgl_dibuat'    => $tgl_dibuat,

            'tgl_exp'       => $tgl_exp,

            'nama_tengah'   => $nama_tengah

        ];



        $this->db->insert('tbl_paspor', $data);



        echo json_encode([

            'status'  => 'success',

            'message' => 'Data paspor berhasil disimpan!'

        ]);
    }



    private function generateKodeOMC()

    {

        // generate angka random 6 digit

        $angka = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);



        // pecah jadi 3-3 digit, lalu gabungkan pakai "-"

        $angkaFormat = substr($angka, 0, 3) . '-' . substr($angka, 3, 3);



        // gabungkan dengan prefix ΦMC

        return 'ΦMC ' . $angkaFormat;
    }



    private function generateAuthCode(int $length = 4): string

    {

        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $maxIndex = strlen($chars) - 1;

        $result = '';



        for ($i = 0; $i < $length; $i++) {

            $result .= $chars[random_int(0, $maxIndex)];
        }



        return $result;
    }





    // private function generateNoPaspor()

    // {

    //     // 2 angka depan

    //     $depan = str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);



    //     // 7 angka belakang

    //     $belakang = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);



    //     // gabungkan dengan spasi

    //     return $depan . ' ' . $belakang;

    // }



    private function generateNoPaspor($kode_negara = 'ru_RU')

    {

        if ($kode_negara === 'tk_TM') {

            // 🇹🇲 Turkmenistan: DE + 7 digit angka

            $belakang = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);

            return 'DE' . $belakang;
        } elseif ($kode_negara === 'ca_CA') {

            // 🇨🇦 Kanada: UT + 6 digit angka

            $belakang = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

            return 'UT' . $belakang;
        } elseif ($kode_negara === 'uz_UZ') {

            // uzbekistan: UT + 6 digit angka

            $belakang = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

            return 'GF' . $belakang;
        } elseif ($kode_negara === 've_VE') {

            // uzbekistan: UT + 6 digit angka

            $belakang = str_pad(rand(0, 999999), 9, '0', STR_PAD_LEFT);

            return $belakang;
        } else {

            // 🇷🇺 Default (misalnya Rusia): 2 digit angka + spasi + 7 digit angka

            $depan = str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);

            $belakang = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);

            return $depan . ' ' . $belakang;
        }
    }





    private function generatePersonalNumber($kode_negara = 'tm_TM')

    {

        if ($kode_negara === 've_VE') {

            // Venezuela → 7 digit angka acak

            $angka = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);

            return $angka;
        } else {

            // Default / Turkmenistan → DZ + 9 digit angka acak

            $angka = str_pad(rand(0, 999999999), 9, '0', STR_PAD_LEFT);

            return 'DZ' . $angka;
        }
    }





    private function generateNumbFooter($countryCode = 'ru_RU')

    {

        if ($countryCode === 'ru_RU') {

            // 7 digit depan (fixed 7 digit dengan leading zero)

            $depan = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);



            // Huruf random A - Z

            $huruf = chr(rand(65, 90)); // 65-90 = ASCII A-Z



            // Panjang fixed 15 digit angka belakang

            $belakang = '';

            for ($i = 0; $i < 15; $i++) {

                $belakang .= rand(0, 9);
            }



            return $depan . $huruf . $belakang;
        } elseif ($countryCode === 'tk_TM') {

            // 1 digit angka depan

            $depan = rand(0, 9);



            // Huruf TKM

            $middle = 'TKM';



            // 7 digit angka

            $angka7 = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);



            // 1 huruf random

            $huruf = chr(rand(65, 90));



            // 6 digit angka

            $angka6 = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);



            return $depan . $middle . $angka7 . $huruf . $angka6;
        } elseif ($countryCode === 'ca_CA') {

            // 1 digit angka depan

            $depan = rand(0, 9);



            // Huruf TKM

            $middle = 'CAN';



            // 7 digit angka

            $angka7 = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);



            // 1 huruf random

            $huruf = chr(rand(65, 90));



            // 6 digit angka

            $angka6 = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);



            return $depan . $middle . $angka7 . $huruf . $angka6;
        } elseif ($countryCode === 'uz_UZ') {

            // ✅ 7 digit angka random

            $angka7 = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);



            // ✅ 1 huruf random

            $huruf = chr(rand(65, 90));



            // ✅ 29 digit angka random

            $angka29 = '';

            for ($i = 0; $i < 29; $i++) {

                $angka29 .= rand(0, 9);
            }



            return $angka7 . $huruf . $angka29;
        } elseif ($countryCode === 've_VE') {

            // Venezuela → 7 angka + huruf M + 14 angka

            $angka7 = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);

            $huruf = 'M';

            $angka14 = '';

            for ($i = 0; $i < 14; $i++) {

                $angka14 .= rand(0, 9);
            }

            return $angka7 . $huruf . $angka14;
        }



        // fallback kalau kodenya tidak dikenali

        return null;
    }



    private function generateNumbFooterBelakang($countryCode = 'ru_RU')

    {

        if ($countryCode === 'ru_RU') {

            // Rusia → 1 digit angka (1–9)

            return str_pad(rand(1, 9), 1, '0', STR_PAD_LEFT);
        } elseif ($countryCode === 'tk_TM') {

            // Turkmenistan → 2 digit angka (00–99)

            return str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);
        } elseif ($countryCode === 've_VE') {

            // Turkmenistan → 2 digit angka (00–99)

            return str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);
        }



        // Default fallback → 1 digit

        return str_pad(rand(1, 9), 1, '0', STR_PAD_LEFT);
    }

    //Rotasi teks dotted
    public function rotatedText($mpdf, $x, $y, $txt, $angle, $spacing)
    {
        $mpdf->StartTransform();
        $mpdf->Rotate($angle, $x, $y);
        foreach (str_split($txt) as $char) {
            $mpdf->Text($x, $y, $char);
            $x += $spacing;
        }
        $mpdf->StopTransform();
    }

    //update
    public function print($id)
    {
        // ambil data dari database
        $paspor = $this->db->get_where('tbl_paspor', ['id' => $id])->row();
        if (!$paspor) {
            show_error("Data tidak ditemukan");
            return;
        }

        $kodeOMC = $this->generateKodeOMC();
        $noPaspor = $this->generateNoPaspor('ru_RU');
        $noFooter = $this->generateNumbFooter();
        $noFooter1digit = $this->generateNumbFooterBelakang();

        // background image (gunakan absolute URL)
        $background = base_url('assets/img/rusia.png');

        // load view sebagai string
        $html = $this->load->view('paspor/paspor_rusia', [
            'paspor'     => $paspor,
            'background' => $background,
            'kodeOMC'    => $kodeOMC,
            'noPaspor'   => $noPaspor,
            'noFooter'   => $noFooter,
            'noFooter1digit'   => $noFooter1digit,
        ], true);


        // load library Pdf
        $this->load->library('pdf');
        $mpdf = $this->pdf->load();
        $mpdf->AddPage();
        //rubah font codystar
        $mpdf->SetFont('codystar', '', 40);

        //Rotasi No Paspor Rusia
        $this->rotatedText($mpdf, 205, 112, $noPaspor, 90, 8);

        // 👉 taruh di sini biar background scale otomatis
        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);
        // render HTML
        $mpdf->WriteHTML($html);
        $mpdf->Output("paspor_{$paspor->id}.pdf", "I");
    }

    //print() lama
    // public function print($id)

    // {

    //     // ambil data dari database

    //     $paspor = $this->db->get_where('tbl_paspor', ['id' => $id])->row();

    //     if (!$paspor) {

    //         show_error("Data tidak ditemukan");

    //         return;

    //     }



    //     $kodeOMC = $this->generateKodeOMC();

    //     $noPaspor = $this->generateNoPaspor('ru_RU');

    //     $noFooter = $this->generateNumbFooter();

    //     $noFooter1digit = $this->generateNumbFooterBelakang();



    //     // background image (gunakan absolute URL)

    //     $background = base_url('assets/img/rusia.png');



    //     // load view sebagai string

    //     $html = $this->load->view('paspor/paspor_rusia', [

    //         'paspor'     => $paspor,

    //         'background' => $background,

    //         'kodeOMC'    => $kodeOMC,

    //         'noPaspor'   => $noPaspor,

    //         'noFooter'   => $noFooter,

    //         'noFooter1digit'   => $noFooter1digit,

    //     ], true);



    //     // load library Pdf

    //     $this->load->library('pdf');

    //     $mpdf = $this->pdf->load();



    //     // 👉 taruh di sini biar background scale otomatis

    //     $mpdf->SetDefaultBodyCSS('background-image-resize', 6);



    //     // render HTML

    //     $mpdf->WriteHTML($html);

    //     $mpdf->Output("paspor_{$paspor->id}.pdf", "I");

    // }



    public function print_tm($id)

    {

        // ambil data dari database

        $paspor = $this->db->get_where('tbl_paspor', ['id' => $id])->row();

        if (!$paspor) {

            show_error("Data tidak ditemukan");

            return;
        }



        $kodeautentikasi = $this->generateAuthCode(4);

        $noPasporTM    = $this->generateNoPaspor('tk_TM');

        $noFooter = $this->generateNumbFooter('tk_TM');

        $noFooter1digit = $this->generateNumbFooterBelakang('tk_TM');

        $personalNumber = $this->generatePersonalNumber();



        // background image (gunakan absolute URL)

        $background = base_url('assets/img/tm-edit.png');



        // load view sebagai string

        $html = $this->load->view('paspor/paspor_tm', [

            'paspor'     => $paspor,

            'background' => $background,

            'kodeautentikasi'    => $kodeautentikasi,

            'noPasporTM'   => $noPasporTM,

            'noFooter'   => $noFooter,

            'noFooter1digit'   => $noFooter1digit,

            'personalNumber'   => $personalNumber,

        ], true);



        // load library Pdf

        $this->load->library('pdf');

        $mpdf = $this->pdf->load();

        $mpdf->AddPage();
        //rubah font codystar
        $mpdf->SetFont('codystar', '', 40);

        //Rotasi No Paspor Rusia
        $this->rotatedText($mpdf, 20, 130, $noPasporTM, 90, 11);



        // 👉 taruh di sini biar background scale otomatis

        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);



        // render HTML

        $mpdf->WriteHTML($html);

        $mpdf->Output("paspor_{$paspor->id}.pdf", "I");
    }



    public function print_ca($id)

    {

        // ambil data dari database

        $paspor = $this->db->get_where('tbl_paspor', ['id' => $id])->row();

        if (!$paspor) {

            show_error("Data tidak ditemukan");

            return;
        }



        $kodeautentikasi = $this->generateAuthCode(4);

        $noPasporCA    = $this->generateNoPaspor('ca_CA');

        $noFooter = $this->generateNumbFooter('ca_CA');

        $noFooter1digit = $this->generateNumbFooterBelakang('tk_TM');

        $personalNumber = $this->generatePersonalNumber();



        $bulanID = [

            1 => 'JANUARI',

            'FEBUARI',

            'MARET',

            'APRIL',

            'MEI',

            'JUNI',

            'JULI',

            'AGUSTUS',

            'SEPTEMBER',

            'OKTOBER',

            'NOBEMBER',

            'DESEMBER'

        ];

        $tgl_lahir_indo = date('d', strtotime($paspor->tgl_lahir)) . ' ' . $bulanID[date('n', strtotime($paspor->tgl_lahir))];



        // ✅ Format Bulan + Tahun dalam Bahasa Prancis Kanada

        setlocale(LC_TIME, 'fr_CA.UTF-8', 'fr_CA', 'fr_CA.utf8');

        $bulan_tahun_fr = strftime('%B %Y', strtotime($paspor->tgl_lahir));

        // background image (gunakan absolute URL)

        $background = base_url('assets/img/canada.png');



        // load view sebagai string

        $html = $this->load->view('paspor/paspor_ca', [

            'paspor'     => $paspor,

            'background' => $background,

            'noPasporCA'   => $noPasporCA,

            'noFooter'   => $noFooter,

            'noFooter1digit'   => $noFooter1digit,

            'personalNumber'   => $personalNumber,

            'tgl_lahir_indo'    => $tgl_lahir_indo,

            'bulan_tahun_fr'    => $bulan_tahun_fr,

        ], true);



        // load library Pdf

        $this->load->library('pdf');

        $mpdf = $this->pdf->load();



        // 👉 taruh di sini biar background scale otomatis

        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);



        // render HTML

        $mpdf->WriteHTML($html);

        $mpdf->Output("paspor_{$paspor->id}.pdf", "I");
    }



    private function generateUzbekName()

    {

        $faker = Faker\Factory::create('uz_UZ');



        // ambil nama lengkap dari faker

        $fullName = $faker->name;



        // pecah nama jadi bagian-bagian

        $parts = explode(' ', $fullName);



        $nama_depan = $parts[0];

        $nama_tengah = (count($parts) > 2) ? $parts[1] : '';

        $nama_belakang = end($parts);



        return [

            'nama_depan'   => $nama_depan,

            'nama_tengah'  => $nama_tengah,

            'nama_belakang' => $nama_belakang,

            'full_name'    => $fullName

        ];
    }





    public function print_uz($id)

    {

        // ambil data dari database

        $paspor = $this->db->get_where('tbl_paspor', ['id' => $id])->row();

        if (!$paspor) {

            show_error("Data tidak ditemukan");

            return;
        }



        $kodeautentikasi = $this->generateAuthCode(4);

        $noPasporUZ    = $this->generateNoPaspor('uz_UZ');

        $noFooter = $this->generateNumbFooter('uz_UZ');

        // $noFooter1digit = $this->generateNumbFooterBelakang('tk_TM');

        // ✅ generate nama Uzbek random

        $namaUzbek = $this->generateUzbekName();



        // background image (gunakan absolute URL)

        $background = base_url('assets/img/uzbek.png');



        // load view sebagai string

        $html = $this->load->view('paspor/paspor_uz', [

            'paspor'     => $paspor,

            'background' => $background,

            'kodeautentikasi'    => $kodeautentikasi,

            'noPasporUZ'   => $noPasporUZ,

            'noFooter'   => $noFooter,

            // 'noFooter1digit'   => $noFooter1digit,

            'namaUzbek'  => $namaUzbek,

        ], true);



        // load library Pdf

        $this->load->library('pdf');

        $mpdf = $this->pdf->load();
        $mpdf->AddPage();
        $mpdf->SetFont('codystar', '', 40);



        // 👉 taruh di sini biar background scale otomatis

        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);
        $this->rotatedText($mpdf, 185, 117, $noPasporUZ, 90, 10);



        // render HTML

        $mpdf->WriteHTML($html);

        $mpdf->Output("paspor_{$paspor->id}.pdf", "I");
    }



    public function print_ve($id)

    {

        // ambil data dari database

        $paspor = $this->db->get_where('tbl_paspor', ['id' => $id])->row();

        if (!$paspor) {

            show_error("Data tidak ditemukan");

            return;
        }



        $kodeautentikasi = $this->generateAuthCode(4);

        $noPasporVE    = $this->generateNoPaspor('ve_VE');

        $noFooter = $this->generateNumbFooter('ve_VE');

        $personalNumberVE = $this->generatePersonalNumber('ve_VE');

        // ✅ generate nama Uzbek random

        $noFooter2digit = $this->generateNumbFooterBelakang('ve_VE');

        $namaUzbek = $this->generateUzbekName();



        // background image (gunakan absolute URL)

        $background = base_url('assets/img/vene.png');



        // load view sebagai string

        $html = $this->load->view('paspor/paspor_ve', [

            'paspor'     => $paspor,

            'background' => $background,

            'kodeautentikasi'    => $kodeautentikasi,

            'noPasporVE'   => $noPasporVE,

            'noFooter'   => $noFooter,

            'personalNumberVE' => $personalNumberVE,

            'noFooter2digit'   => $noFooter2digit,

            'namaUzbek'  => $namaUzbek,

        ], true);



        // load library Pdf

        $this->load->library('pdf');

        $mpdf = $this->pdf->load();
        $mpdf->AddPage();
        $mpdf->SetFont('codystar', '', 40);



        // 👉 taruh di sini biar background scale otomatis

        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);
        $this->rotatedText($mpdf, 32, 115, $noPasporVE, 90, 10);



        // render HTML

        $mpdf->WriteHTML($html);

        $mpdf->Output("paspor_{$paspor->id}.pdf", "I");
    }

    public function deletePaspor()
    {
        $id = $this->input->post('id');

        if (!$id) {
            echo json_encode(['status' => 'error', 'message' => 'ID tidak ditemukan.']);
            return;
        }

        $this->load->model('M_paspor');

        $deleted = $this->M_paspor->deletePaspor($id);

        if ($deleted) {
            echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Data gagal dihapus atau tidak ditemukan.']);
        }
    }
}
