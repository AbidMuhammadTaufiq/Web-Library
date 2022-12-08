<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;

class OrangSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'nama'          => 'abid muhammad taufiq',
        //         'alamat'        => 'Solo',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now(),
        //     ],
        //     [
        //         'nama'          => 'aida safira',
        //         'alamat'        => 'jogja',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now(),
        //     ],
        //     [
        //         'nama'          => 'yana',
        //         'alamat'        => 'klaten',
        //         'created_at'    => Time::now(),
        //         'updated_at'    => Time::now(),
        //     ]
        // ];
        $faker = \Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'nama'          => $faker->name,
                'alamat'        => $faker->address,
                'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('Orang')->insert($data);
        }

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO Orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)",
        //     $data
        // );

        // Using Query Builder
        // $this->db->table('Orang')->insert($data);
    }
}
