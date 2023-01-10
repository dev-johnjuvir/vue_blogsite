<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Roles extends Migration
{
    public function up()
    {
        //
        $fields = [
            'id' => [
                'type' => 'INT', 
                'constraint' => 11,
                'auto_increment' => true
            ],
            'name' => [
                'type' => 'VARCHAR', 
                'constraint' => 255
            ],
            'creatorId' => [
                'type' => 'INT', 
                'constraint' => 11
            ],
            'updatorId' => [
                'type' => 'INT', 
                'constraint' => 11
            ],
            'createdAt datetime default current_timestamp',
            'updatedAt datetime'
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('roles');
    }

    public function down()
    {
        //
        $this->forge->dropTable('roles');
    }
}
