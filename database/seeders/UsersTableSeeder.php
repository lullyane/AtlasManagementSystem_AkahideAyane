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
            'over_name' => '国語教師',
            'under_name' => '猫',
            'over_name_kana' => 'コクゴキョウシ',
            'under_name_kana' => 'ネコ',
            'mail_address' => 'cat@mail.com',
            'sex' => 1,
            'birth_day' => '2001-01-01',
            'role' => 1,
            'password' => Hash::make('catcatcat'),
        ]);
    }
}
