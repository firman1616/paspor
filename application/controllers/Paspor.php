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

        // pecah berdasarkan spasi
        $parts = explode(" ", $fullName);

        // ambil nama depan (kata pertama)
        $nama_depan = $parts[0];

        // ambil nama belakang (kata terakhir saja, buang kalau ada nama tengah)
        $nama_belakang = count($parts) > 1 ? $parts[count($parts) - 1] : '';

        // tempat lahir (fallback jika city tidak ada)
        $tempat_lahir = $this->fakerFirstAvailable($faker, ['city', 'state', 'region', 'county', 'country']);

        // generate tanggal lahir (umur antara 18 - 50)
        $tgl_lahir = $faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d');

        // gender hanya M/F
        $genderFull = $faker->randomElement(['male', 'female']);
        $gender = ($genderFull === 'male') ? 'M' : 'F';

        echo json_encode([
            'nama_depan'    => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'tempat_lahir'  => $tempat_lahir,
            'tgl_lahir'     => $tgl_lahir,
            'gender'        => $gender
        ]);
    }


    public function simpan()
    {
        $kode_negara  = $this->input->post('negara');
        $nama_depan   = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $asal_negara  = $this->input->post('asal_negara');
        $tgl_lahir    = $this->input->post('tgl_lahir');
        $gender       = $this->input->post('gender');

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

        // data yang disimpan
        $data = [
            'kode_negara'  => $kode_negara,
            'nama_depan'   => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'tempat_lahir' => $tempat_lahir,
            'asal_negara'  => $asal_negara,
            'tgl_lahir'    => $tgl_lahir,
            'gender'       => $gender,
            'filefoto'     => $filefoto,
            'filestempel'  => $filestempel
        ];

        $this->db->insert('tbl_paspor', $data);

        echo json_encode([
            'status'  => 'success',
            'message' => 'Data paspor berhasil disimpan!'
        ]);
    }
}
