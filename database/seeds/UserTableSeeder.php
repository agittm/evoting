<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new App\User;
        $administrator->name = 'AGIT';
        $administrator->email = 'agit@evoting.com';
        $administrator->password = \Hash::make('admin');
        $administrator->nik = '1234567891111111';
        $administrator->address = 'Padalarang, Bandung Barat';
        $administrator->phone ='085085085085';
        $administrator->roles =json_encode(['ADMIN']);
        $administrator->status = 'SUDAH';

        $administrator->save();

        $this->command->info('User Admin sudah diinsert');
    }
}
