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

        $this->load->view('templates/header');
        $this->load->view('install/home');
        $this->load->view('templates/footer');
    }
}
