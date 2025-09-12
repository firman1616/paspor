<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Migrate2 extends CI_Migration
{

    public function up()
    {
        /**
         * Tabel: tbl_modul
         */
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'asal_negara' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'tempat_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'tgl_lahir' => [
                'type'       => 'DATE',
                'null'       => FALSE
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_faker', TRUE);

        // tbl_paspor
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_depan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'nama_depan_trans' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'nama_belakang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'nama_belakang_trans' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'tgl_lahir' => [
                'type'       => 'DATE',
                'null'       => FALSE
            ],
            'gender' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => FALSE
            ],
            'kode_negara' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'tempat_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'tempat_lahir_trans' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'asal_negara' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'tgl_dibuat' => [
                'type'       => 'DATE',
                'null'       => FALSE
            ],
            'tgl_exp' => [
                'type'       => 'DATE',
                'null'       => FALSE
            ],
            'filefoto' => [
                'type'       => 'text',
                'null'       => FALSE
            ],
            'filestempel' => [
                'type'       => 'text',
                'null'       => FALSE
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_paspor', TRUE);

        // insert modul
        $this->db->insert('tbl_modul', [
            'nama'      => 'Paspor',
            'icon'      => 'fas fa-passport',
            'url_modul' => 'Paspor'
        ]);
        $modul_id = $this->db->insert_id();

        // insert user
        $this->db->insert('tbl_user', [
            'name'       => 'User Demo',
            'username'   => 'demo',
            'password'   => password_hash('demo', PASSWORD_BCRYPT), // hash password
            'status'     => 1,
            'nik'        => '12345',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $user_id = $this->db->insert_id();

        // insert role
        $this->db->insert('tbl_role', [
            'nama_role' => 'Demo'
        ]);
        $role_id = $this->db->insert_id();

        // insert role akses (1–9)
        $dataAkses = [];
        for ($i = 1; $i <= 9; $i++) {
            $dataAkses[] = [
                'akses'   => $i,
                'role_id' => $role_id
            ];
        }
        $this->db->insert_batch('tbl_role_akses', $dataAkses);

        // insert user modul akses
        $this->db->insert('tbl_user_modul_akses', [
            'user_id'  => $user_id,
            'modul_id' => $modul_id,
            'role_id'  => $role_id
        ]);
    }

    public function down()
    {
        $this->dbforge->drop_table('tbl_faker', TRUE);
        $this->dbforge->drop_table('tbl_paspor', TRUE);
    }
}
