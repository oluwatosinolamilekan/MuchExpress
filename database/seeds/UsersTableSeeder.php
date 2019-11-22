<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'name' => 'luqman',
            'email' => 'oluwatosinolamilekan@gmail.com',
            'password' => bcrypt('olamilekan11'),
        ]);

        $user->restaurants()->create([
            'name' => 'Ajayi Nurudeen',
            'location' => 'Yaba Lagos Nigeria',
        ]);

        $user->restaurants()->create([
            'name' => 'Ajayi Kunle',
            'location' => 'Lekki Lagos Nigeria',
        ]);
    }
}
