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
        $emails = ['ykkb16@oduyzrp.com', 'dcq13pj@24hinbox.com', 'happycpl33@goldinbox.net', 'keat1905@superhostformula.com', 'crisgo01@hasevo.com', 'clydite@eetieg.com', 'rgtoy@uhpanel.com', 'russmi03@eeetivsc.com', 'tatari1998@heepclla.com', 'exgymnast@gmailpro.cf', '2001ups@santonicrotone.it', 'nadyschagirl@mumbama.com', 'rhaat5im@piftir.com',  'kwikenz@icenhl.com', 'nucule@nalsci.com', 'successwork@literk.site', 'ellis88@ezybarber.com', 'lecasta@btcmod.com', 'bruno1871@iseovels.com', 'rz4jbk@cbarato.vip', 'krash448@appsmail.us', 'bighorn@wpdork.com', 'ingoramme@sharyndoll.com', 'msuguy@boranora.com', 'poslugakievua@samaltour.site', 'byyfp@adaov.com', 'disscontent@wpdork.com', 'virtume99@athdn.com', 'raykemp@nonise.com'];
        $strangers = ['Caio', 'Angioletto', 'Abighele', 'Jeredahia', 'Abenizio', 'Aronne', 'Pissio', 'Tulio', 'Edo', 'Antea', 'Algisio'];

        for ($i = 0; $i < 40; $i++) {
            $fake_email = new Message();
            $fake_email->email = $emails[rand(0, count($emails) - 1)];
            $fake_email->content = $faker->text();
            $fake_email->user_id = rand(1, 30);
            $fake_email->name = $strangers[rand(0, count($strangers) - 1)];
            $fake_email->surname = $strangers[rand(0, count($strangers) - 1)];
            $fake_email->save();
        }
    }
}
