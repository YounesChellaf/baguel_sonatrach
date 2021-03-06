<?php

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Room::class, 50)->create()->each(function ($room) {
            $room->instance->save(factory(\App\Models\EquipementInstance::class)->make());
        });
    }
}
