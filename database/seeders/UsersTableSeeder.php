<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'over_name' => 'テスト',
            'under_name' => 'ユーザー',
            'over_name_kana' => 'テスト',
            'under_name_kana' => 'ユーザー',
            'mail_address' => 'test@mail.com',
            'sex' => 1,
            'birth_day' => '2000-01-01',
            'role' => 1,
            'password' => Hash::make('test'),
        ]);
    }
}
