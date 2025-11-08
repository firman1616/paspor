<?php
class M_paspor extends CI_Model
{
    public function insertPaspor($data)
    {
        return $this->db->insert('tbl_paspor', $data);
    }
}
