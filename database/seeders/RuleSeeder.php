<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RuleDetail;
use App\Models\RuleJurusan;
use App\Models\User;

class RuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rules = [
            ['KodeJurusan' => 'J1', 'Faktas' => ['F1', 'F3', 'F4', 'F5', 'F6', 'F7', 'F8']],
            ['KodeJurusan' => 'J2', 'Faktas' => ['F2', 'F9', 'F10', 'F11', 'F12', 'F13']],
            ['KodeJurusan' => 'J3', 'Faktas' => ['F1', 'F3', 'F14', 'F15', 'F16', 'F17', 'F18']],
            ['KodeJurusan' => 'J4', 'Faktas' => ['F1', 'F19', 'F20', 'F21', 'F22', 'F23']],
            ['KodeJurusan' => 'J5', 'Faktas' => ['F2', 'F9', 'F24', 'F25', 'F26', 'F27', 'F28']],
            ['KodeJurusan' => 'J6', 'Faktas' => ['F1', 'F3', 'F29', 'F30', 'F31', 'F32', 'F33']],
            ['KodeJurusan' => 'J7', 'Faktas' => ['F2', 'F9', 'F34', 'F35', 'F36', 'F37', 'F38']],
        ];

        foreach ($rules as $rule) {
            foreach ($rule['Faktas'] as $fakta) {
                RuleDetail::create([
                    'kode_jurusan' => $rule['KodeJurusan'],
                    'kode_fakta' => $fakta
                ]);
            }
        }

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin');
        $user->save();
    }
}
