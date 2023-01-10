<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Roles extends Seeder
{
    public function run()
    {
        //
        $keyValues = [
            'name' => 'Administrator',
            'creatorId' => 1
        ];
        $this->db->table('roles')->insert($keyValues);
    }
}
