<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Room::truncate();

        $rooms = [
            ['number' => 311, 'monthly_rent' => 5500],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }

        Schema::enableForeignKeyConstraints();
    }
}
