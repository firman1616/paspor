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
}
