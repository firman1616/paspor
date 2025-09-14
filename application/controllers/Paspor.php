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

    private function getCountryName($locale)
    {
        $map = [
            'id_ID' => 'Indonesia',
            'ru_RU' => 'Rusia',
            'en_US' => 'Amerika Serikat',
            'fr_FR' => 'Perancis',
            'ja_JP' => 'Jepang',
            'de_DE' => 'Jerman',
            'es_ES' => 'Spanyol',
            'zh_CN' => 'China',
        ];
        return $map[$locale] ?? 'Tidak Dikenal';
    }

    private function getNegaraList()
    {
        return [
            'id_ID' => 'Indonesia',
            'ru_RU' => 'Rusia',
            'en_US' => 'Amerika Serikat',
            'fr_FR' => 'Perancis',
            'ja_JP' => 'Jepang',
            'de_DE' => 'Jerman',
            'es_ES' => 'Spanyol',
            'zh_CN' => 'China',
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
        $tempat_lahir = $parts[0];

        $nama_depan_en = $nama_depan;
        $nama_belakang_en = $nama_belakang;

        // transliterasi hanya jika locale Rusia
        if ($locale === "ru_RU") {
            $nama_depan_en = $this->transliterateRussian($nama_depan);
            $nama_belakang_en = $this->transliterateRussian($nama_belakang);
            $tempat_lahir_en = $this->transliterateRussian($tempat_lahir);
        }

        $tempat_lahir = $this->fakerFirstAvailable($faker, ['city', 'state', 'region', 'county', 'country']);
        $tgl_lahir = $faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d');
        $gender = $faker->randomElement(['M', 'F']);

        echo json_encode([
            'nama_depan'       => $nama_depan,
            'nama_belakang'    => $nama_belakang,
            'nama_depan_en'    => $nama_depan_en,
            'nama_belakang_en' => $nama_belakang_en,
            'tempat_lahir'     => $tempat_lahir,
            'tempat_lahir_en'        => $tempat_lahir_en,
            'tgl_lahir'        => $tgl_lahir,
            'gender'           => $gender
        ]);
    }



    public function simpan()
    {
        $kode_negara  = $this->input->post('negara');
        $nama_depan   = $this->input->post('nama_depan');
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
            'tgl_exp'       => $tgl_exp
        ];

        $this->db->insert('tbl_paspor', $data);

        echo json_encode([
            'status'  => 'success',
            'message' => 'Data paspor berhasil disimpan!'
        ]);
    }

    private function generateKodeOMC()
    {
        // generate angka random 4 digit
        $angka = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        // gabungkan dengan prefix OMC
        return 'OMC' . $angka;
    }

    private function generateNoPaspor()
    {
        // 2 angka depan
        $depan = str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT);

        // 7 angka belakang
        $belakang = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);

        // gabungkan dengan spasi
        return $depan . ' ' . $belakang;
    }

    private function generateNumbFooter()
    {
        // 7 digit depan (fixed 7 digit dengan leading zero)
        $depan = str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);

        // Huruf random A - Z
        $huruf = chr(rand(65, 90)); // 65-90 = ASCII A-Z

        // Tentukan panjang acak antara 7 - 22
        $panjang = rand(15, 15);

        // Generate angka belakang sesuai panjang acak
        $belakang = '';
        for ($i = 0; $i < $panjang; $i++) {
            $belakang .= rand(0, 9);
        }

        // gabungkan
        return $depan . $huruf . $belakang;
    }


    private function generateNumbFooterBelakang()
    {
        // 2 angka depan
        $depan = str_pad(rand(1, 9), 1, '0', STR_PAD_LEFT);

        // gabungkan dengan spasi
        return $depan;
    }



    public function print($id)
    {
        // ambil data dari database
        $paspor = $this->db->get_where('tbl_paspor', ['id' => $id])->row();
        if (!$paspor) {
            show_error("Data tidak ditemukan");
            return;
        }

        $kodeOMC = $this->generateKodeOMC();
        $noPaspor = $this->generateNoPaspor();
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

        // 👉 taruh di sini biar background scale otomatis
        $mpdf->SetDefaultBodyCSS('background-image-resize', 6);

        // render HTML
        $mpdf->WriteHTML($html);
        $mpdf->Output("paspor_{$paspor->id}.pdf", "I");
    }
}
