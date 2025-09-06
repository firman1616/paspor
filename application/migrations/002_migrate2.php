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
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'kode_negara' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'asal_negara' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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

    }

    public function down()
    {
        $this->dbforge->drop_table('tbl_faker', TRUE);
        $this->dbforge->drop_table('tbl_paspor', TRUE);
    }
}
