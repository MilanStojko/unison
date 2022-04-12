<?php

use Illuminate\Database\Seeder;
use App\Availability;

class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $availabilities = ['composizione', 'arrangiamento', 'direzione orchestrale', 'direzione coro', 'cerimonie', 'DJ set', 'didattica', 'canto', 'performance', 'improvvisazione', 'direzione di ensemble', 'virtuosismo', 'polistrumentismo', 'coro religioso', 'cerimonie religiose', 'repertorio', 'banda', 'complesso strumentale', 'complesso vocale', 'cantautorato', 'musica colta', 'folklore', 'musica lirica', 'turnista', 'concerto', 'jam session', 'membro', 'sideman', 'cover', 'festival'];
        foreach ($availabilities as $availability_name) {
            $new_availability = new Availability();
            $new_availability->name = $availability_name;
            $new_availability->save();
        }
    }
}
