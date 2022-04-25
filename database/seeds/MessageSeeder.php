<?php

use App\Message;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $emails = ['ykkb16@oduyzrp.com', 'dcq13pj@24hinbox.com', 'happycpl33@goldinbox.net', 'keat1905@superhostformula.com', 'crisgo01@hasevo.com', 'clydite@eetieg.com', 'rgtoy@uhpanel.com'];
        $strangers = ['Caio', 'Angioletto', 'Abighele', 'Jeredahia', 'Abenizio', 'Aronne', 'Pissio', 'Tulio', 'Edo', 'Antea', 'Algisio'];

        for ($i = 0; $i < 20; $i++) {
            $fake_email = new Message();
            $fake_email->email = $emails[rand(0, count($emails) - 1)];
            $fake_email->content = $faker->text();
            $fake_email->user_id = rand(1, 10);
            $fake_email->name = $strangers[rand(0, count($strangers) - 1)];
            $fake_email->surname = $strangers[rand(0, count($strangers) - 1)];
            $fake_email->save();
        }
    }
}
