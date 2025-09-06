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
        // $data['modul'] = $this->m_data->get_data('tbl_modul')->result();

        echo json_encode($this->load->view('paspor/paspor-table', false));
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

    public function generateNama()
    {
        $locale = $this->input->post('locale'); // misal ru_RU, id_ID, dll

        if (!$locale) {
            echo json_encode(['error' => 'Locale tidak ditemukan']);
            return;
        }

        // load faker
        require_once FCPATH . 'vendor/autoload.php';
        $faker = Faker\Factory::create($locale);

        $data = [
            'nama' => $faker->name,
        ];

        echo json_encode($data);
    }

    public function simpan()
    {
        $nama        = $this->input->post('nama');
        $kode_negara = $this->input->post('negara');
        $asal_negara = $this->input->post('asal_negara');

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

        $data = [
            'nama'        => $nama,
            'kode_negara' => $kode_negara,
            'asal_negara' => $asal_negara,
            'filefoto'    => $filefoto,
            'filestempel' => $filestempel
        ];

        $this->db->insert('tbl_paspor', $data);

        echo json_encode([
            'status'  => 'success',
            'message' => 'Data paspor berhasil disimpan!'
        ]);
    }
}
