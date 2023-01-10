<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    /**
     * AddFields
     * AddKey
     * CreateTable
     */
    public function up()
    {
        //
        $fields = [
            'id' => [
                'type' => 'INT', 
                'constraint' => 11,
                'auto_increment' => true
            ],
            'email' => [
                'type' => 'VARCHAR',
                'unique' => true,
                'constraint' => 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'firstname' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'middlename' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'creatorId' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'updatorId' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'roleId' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'createdAt datetime default current_timestamp',
            'updatedAt datetime'
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
        $this->forge->dropTable('users');
    }
}
