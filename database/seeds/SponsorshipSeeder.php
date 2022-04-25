<?php

use App\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            [
                "type" => "sponsor24",
                "duration" => 24,
                "price" => "2.99",
                "description" => "cheap but effective"
            ],
            [
                "type" => "sponsor72",
                "duration" => 72,
                "price" => "5.99",
                "description" => "not that cheap but more effective"
            ],
            [
                "type" => "sponsor144",
                "duration" => 144,
                "price" => "9.99",
                "description" => "aint cheap at all, but rocks"
            ],

        ];


        foreach ($sponsorships as $element) {
            $new_sponsorship = new Sponsorship();
            $new_sponsorship->type = $element["type"];
            $new_sponsorship->duration = $element["duration"];
            $new_sponsorship->price = $element["price"];
            $new_sponsorship->description = $element["description"];
            $new_sponsorship->save();
        }
    }
}
