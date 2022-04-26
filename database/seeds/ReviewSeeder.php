<?php

use App\Review;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $strangers = ['Caio', 'Angioletto', 'Abighele', 'Jeredahia', 'Abenizio', 'Aronne', 'Pissio', 'Tulio', 'Edo', 'Antea', 'Algisio', 'Egidio', 'Elisa', 'Debhora', 'Rocco', 'Adolfo', 'Aquilino', 'Gertrude', 'Arborio', 'Amedeo', 'Egmondo', 'Gregorio', 'Cesare', 'Leonida', 'Paride', 'Enea', 'Ettore', 'Agamennone', 'Menelao', 'Odoacre', 'Achille', 'Poppea', 'Elena', 'Eracle', 'Amilcare', 'Amos', 'Portos', "Ortos", 'Anacleto', 'Tancredi', 'Tobia', 'Archimede', 'Vasco', 'Galilelo', 'Jago'];

        for ($i = 0; $i < 50; $i++) {
            $fake_review = new Review();
            $fake_review->user_id = rand(1, 30);
            $fake_review->content = $faker->text();
            $fake_review->vote = rand(1, 5);
            $fake_review->username = $strangers[rand(0, count($strangers) - 1)];
            $fake_review->save();
        }
    }
}
