<?php
class M_paspor extends CI_Model
{
    public function insertPaspor($data)
    {
        return $this->db->insert('tbl_paspor', $data);
    }

    public function deletePaspor($id)
    {
        return $this->db->where('id', $id)->delete('tbl_paspor');
    }

    public function getOldestData($limit)
    {
        return $this->db->order_by('id', 'ASC')   // atau created_at jika ada
                        ->limit($limit)
                        ->get('tbl_paspor')
                        ->result();
    }

    // Hapus data berdasarkan array id
    public function deleteByIds($ids)
    {
        return $this->db->where_in('id', $ids)
                        ->delete('tbl_paspor');
    }
}
