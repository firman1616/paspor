<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// panggil autoload composer
require_once APPPATH.'../vendor/autoload.php';

class Pdf {
    public function __construct($params = [])
    {
        return new \Mpdf\Mpdf($params);
    }

    public function load($params = [])
    {
        return new \Mpdf\Mpdf($params);
    }
}
