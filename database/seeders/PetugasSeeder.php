<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        for ($i=0 ; $i < 5 ; $i++ ) {
            User::create([
                'NIK' => str_pad(random_int(1,999999999999999), 16, '0'),
                'jenis_kelamin' => 'Laki-laki',
                'no_telp' => 628 . str_pad(random_int(1,999999999), 13, '0'),
                'alamat' => $faker->address,
                'nama_lengkap' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('petugas12345'),
                'role' => 'Petugas',
            ]);
        }

    }
}
