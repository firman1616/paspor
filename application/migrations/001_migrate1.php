<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Migrate1 extends CI_Migration
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
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'icon' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'url_modul' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_modul', TRUE);

        $this->db->insert('tbl_modul', [
            'name'      => 'Setting',
            'icon'      => 'fas fa-wrench',
            'url_modul' => 'Setting',
        ]);
        $modul_id = $this->db->insert_id();

        /**
         * Tabel: tbl_menu
         */
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'modul_id' => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'url' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => TRUE
            ]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_menu', TRUE);

        $menus = [
            ['modul_id' => $modul_id, 'name' => 'Modul', 'url' => 'Modul'],
            ['modul_id' => $modul_id, 'name' => 'Menu',  'url' => 'Menu'],
            ['modul_id' => $modul_id, 'name' => 'Role',  'url' => 'Role'],
            ['modul_id' => $modul_id, 'name' => 'User',  'url' => 'User'],
        ];
        $this->db->insert_batch('tbl_menu', $menus);

        /**
         * Tabel: tbl_role
         */
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_role' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ]
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_role', TRUE);

        $this->db->insert('tbl_role', ['nama_role' => 'Super User']);
        $role_id = $this->db->insert_id();

        /**
         * Tabel: tbl_role_akses
         */
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'akses' => [
                'type' => 'INT',
                'null' => FALSE
            ],
            'role_id' => [
                'type' => 'INT',
                'null' => FALSE
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_role_akses', TRUE);

        $dataAkses = [];
        for ($i = 1; $i <= 9; $i++) {
            $dataAkses[] = ['akses' => $i, 'role_id' => $role_id];
        }
        $this->db->insert_batch('tbl_role_akses', $dataAkses);

        /**
         * Tabel: tbl_user
         */
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => FALSE
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => FALSE
            ],
            'password' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'status' => [
                'type'     => 'INT',
                'unsigned' => TRUE
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => TRUE
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_user', TRUE);

        $this->db->insert('tbl_user', [
            'name'       => 'Administrator',
            'username'   => 'admin',
            'password'   => password_hash('blackrock', PASSWORD_BCRYPT),
            'status'     => 1,
            'nik'        => '12345678',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $user_id = $this->db->insert_id();

        /**
         * Tabel: tbl_user_modul_akses
         */
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => TRUE
            ],
            'user_id' => ['type' => 'INT', 'null' => FALSE],
            'modul_id' => ['type' => 'INT', 'null' => FALSE],
            'role_id' => ['type' => 'INT', 'null' => FALSE],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_user_modul_akses', TRUE);

        $this->db->insert('tbl_user_modul_akses', [
            'user_id'  => $user_id,
            'modul_id' => $modul_id,
            'role_id'  => $role_id,
        ]);

        /**
         * Tabel: tbl_user_menu_akses
         */
        $this->dbforge->add_field([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => TRUE
            ],
            'user_id' => ['type' => 'INT', 'null' => FALSE],
            'menu_id' => ['type' => 'INT', 'null' => FALSE],
            'role_id' => ['type' => 'INT', 'null' => FALSE],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_user_menu_akses', TRUE);

        $dataUserMenu = [];
        for ($i = 1; $i <= 4; $i++) {
            $dataUserMenu[] = [
                'user_id' => $user_id,
                'menu_id' => $i,
                'role_id' => $role_id,
            ];
        }
        $this->db->insert_batch('tbl_user_menu_akses', $dataUserMenu);

        /**
         * Tabel: tbl_status
         */
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 75,
                'null'       => FALSE,
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_status', TRUE);

        $statuses = [
            ['name' => 'Draft'],
            ['name' => 'In Progress'],
            ['name' => 'Review'],
            ['name' => 'Approve'],
            ['name' => 'Done'],
            ['name' => 'Cancel'],
            ['name' => 'Reject'],
        ];
        $this->db->insert_batch('tbl_status', $statuses);

        /**
         * Tabel: tbl_akses
         */
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 75,
                'null'       => FALSE,
            ],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_akses', TRUE);

        $akseses = [
            ['name' => 'Create'],
            ['name' => 'Read'],
            ['name' => 'Update'],
            ['name' => 'Delete'],
            ['name' => 'Approve'],
            ['name' => 'Print'],
            ['name' => 'Cancel'],
            ['name' => 'Reject'],
            ['name' => 'Re-Open'],
        ];
        $this->db->insert_batch('tbl_akses', $akseses);

        /**
         * Tabel: tbl_approve_level
         */
        $this->dbforge->add_field([
            'id' => ['type' => 'INT', 'auto_increment' => TRUE],
            'role_id' => ['type' => 'INT', 'null' => TRUE],
            'akses_id' => ['type' => 'INT', 'null' => TRUE],
            'level' => ['type' => 'INT', 'null' => TRUE],
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('tbl_approve_level', TRUE);
    }

    public function down()
    {
        $this->dbforge->drop_table('tbl_user', TRUE);
        $this->dbforge->drop_table('tbl_role', TRUE);
        $this->dbforge->drop_table('tbl_menu', TRUE);
        $this->dbforge->drop_table('tbl_modul', TRUE);
        $this->dbforge->drop_table('tbl_role_akses', TRUE);
        $this->dbforge->drop_table('tbl_user_modul_akses', TRUE);
        $this->dbforge->drop_table('tbl_user_menu_akses', TRUE);
        $this->dbforge->drop_table('tbl_status', TRUE);
        $this->dbforge->drop_table('tbl_akses', TRUE);
        $this->dbforge->drop_table('tbl_approve_level', TRUE);
    }
}
