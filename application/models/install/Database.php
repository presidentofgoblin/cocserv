<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Model
{
    public function run()
    {
        $this->load->dbforge();
        $db = $this->dbforge;

        /*
         * MAKE USERS TABLE WITH ALL FIELDS
         */

        $usersFields = [
            'id'            => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],

            'username'      => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],

            'password'     => [
                'type'              => 'VARCHAR',
                'constraint'        => 500,
            ],

            'email'         => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],

            'apikey'        => [
                'type'              => 'VARCHAR',
                'constraint'        => 200,
            ],
            'maxservers'    => [
                'type'              => 'INT',
                'constraint'        => 10,
                'unsigned'          => true,
            ]
        ];

        $db->add_key('id', true);
        $db->add_field($usersFields);
        $db->create_table('users', true);

        /*
         * MAKE SERVERS TABLE WITH ALL FIELDS
         */

        $serverFields = [
            'id'            => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],

            'owner'         => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],

            'ownername'     => [
                'type'              => 'VARCHAR',
                'constraint'        => 100
            ],

            'ip'            => [
                'type'              => 'INT',
                'constraint'        => 25,
                'unsigned'          => true,
            ],

            'port'          => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
            ],

            'name'          => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],

            'description'   => [
                'type'              => 'VARCHAR',
                'constraint'        => 500,
            ],

            'votes'         => [
                'type'              => 'INT',
                'constraint'        => 12,
            ],
        ];

        $db->add_key('id',true);
        $db->add_field($serverFields);
        $db->create_table('servers', true);

        /*
         * MAKE NOTICE TABLE WITH ALL REQUIRED FIELDS
         */
        $notice = [
            'id'            => [
                'type'              => 'INT',
                'constraint'        => 20,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],

            'heading'       => [
                'type'              => 'VARCHAR',
                'constraint'        => 100,
            ],

            'description'   => [
                'type'              => 'VARCHAR',
                'constraint'        => 500,
            ],

            'linkone'       => [
                'type'              => 'VARCHAR',
                'constraint'        => 500,
            ],

            'linktwo'       => [
                'type'              => 'VARCHAR',
                'constraint'        => 500,
            ],
        ];

        $db->add_key('id',true);
        $db->add_field($notice);
        $db->create_table('notice', true);

        $this->load->view('templates/header');
        $this->load->view('install/home');
        $this->load->view('templates/footer');
    }
}
