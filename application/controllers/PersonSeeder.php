<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PersonSeeder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function generate($country = 'id_ID', $jumlah = 10)
    {
        // Inisialisasi Faker sesuai negara
        $faker = Faker\Factory::create($country);

        $data = [];
        for ($i = 0; $i < $jumlah; $i++) {
            $data[] = [
                'nama'        => $faker->name,
                'asal_negara' => $this->getCountryName($country),
                'tempat_lahir'=> $faker->city,
                'tgl_lahir'   => $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
            ];
        }

        // Simpan ke tabel (misalnya tbl_faker)
        $this->db->insert_batch('tbl_faker', $data);

        echo "Berhasil generate $jumlah data orang dari {$this->getCountryName($country)}.";
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
}
