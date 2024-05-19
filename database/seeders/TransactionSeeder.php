<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\User;
use App\Models\Board;
use App\Models\CardList;
use App\Models\Ministry;
use App\Models\BoardList;
use App\Models\BoardLabel;
use App\Models\BoardMember;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ministry = Ministry::get();
        $faker = Faker::create('id_ID');
        foreach($ministry as $ministryData) {
            $board = Board::create([
                'ministry_id' => $ministryData->id,
                'title' => 'Papan Informasi ' . $ministryData->name,
                'budget' => '0',
                'start_date' => '2025-01-01',
                'end_date' => '2025-12-31',
                'status_id' => 3,
                'is_public' => 1,
                'created_by' => 2,
            ]);
            $user = User::where('ministry_id', $ministryData->id)->get();
            foreach($user as $userData) {
                BoardMember::create([
                    'user_id' => $userData->id,
                    'board_id' => $board->id,
                ]);
            }
            $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            for($i = 0; $i < 12; $i++) {
                $boardLabel = BoardLabel::create([
                    'board_id' => $board->id,
                    'name' => $bulan[$i],
                    'color' => $faker->hexColor(),
                ]);
                $boardList = BoardList::create([
                    'board_id' => $board->id,
                    'name' => $bulan[$i],
                    'position' => $i,
                ]);
                $totalHari = cal_days_in_month(CAL_GREGORIAN, $i + 1, 2025);
                for($j = 1; $j <= $totalHari; $j++) {
                    $card = Card::create([
                        'board_list_id' => $boardList->id,
                        'title' => 'Hari ke-' . $j,
                        'is_active' => 1,
                        'due_at' => '2025-' . ($i + 1) . '-' . $j,
                        'reminder_at' => '2025-' . ($i + 1) . '-' . $j,
                    ]);
                    # pekerjaan tiap card masing-masing 10 card list
                    for($k = 1; $k <= 10; $k++) {
                        $cardList = CardList::create([
                            'card_id' => $card->id,
                            'name' => 'Pekerjaan ke-' . $k,
                            'position' => $k,
                        ]);
                    }
                }
            }
        }
    }
}
