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
        $availabilities = ['composizione', 'arrangiamento', 'direzione orchestrale', 'cerimonie', 'DJ set', 'didattica', 'canto', 'performance', 'direzione di ensemble', 'virtuosismo', 'polistrumentismo', 'cerimonie religiose', 'repertorio', 'banda', 'complesso strumentale', 'folklore', 'musica lirica', 'turnista', 'concerto', 'jam session', 'festival'];
        foreach ($availabilities as $availability_name) {
            $new_availability = new Availability();
            $new_availability->name = $availability_name;
            $new_availability->save();
        }
    }
}
