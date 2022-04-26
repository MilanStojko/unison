<?php

use App\Availability;
use App\Category;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    protected function slug($name = "", $id = "")
    {
        $tmp = Str::slug($name);
        $count = 1;
        while (User::where('slug', $tmp)->where('id', '!=', $id)->first()) {
            $tmp = Str::slug($name) . "-" . $count;
            $count++;
        }
        return $tmp;
    }
    //'slug' => $this->slug($data['name']),
    public function run(Faker $faker)
    {
        // array per avere degli user un minimo sensati, pur sempre memando un poco :)

        $names = ['Leonardo', 'Francesco', 'Alessandro', 'Lorenzo', 'Mattia', 'Tommaso', 'Sofia', 'Giulia', 'Aurora', 'Ginevra', 'Alice', 'Beatrice', 'Simone', 'Giacomo', 'Aldo', 'Sam', 'Sonia', 'Lodovica', 'Federica', 'Jeredahia', 'Mario'];
        $surnames = ['Massaro', 'Abbrita', 'Bouzid', 'Pompei', 'Osnago', 'Bernardini', 'Salvalaggio', 'Tomei', 'Stojkovic', 'Napoli', 'Rossi', 'Bianchi', 'Brambilla', 'Fachinetti', 'Poggi', 'Micheli', 'Fogliani', 'Fiumescu', 'Romanov', 'Smith'];
        $usernames = ['Zucchino Padawan', 'PYROMONKEY', 'BioJack', 'Lor_Para_Lisi', 'Xizzan', 'Beatrix', 'Mirage', 'Frasca16', 'Kiraks76', 'Napoli', 'potatochips', 'crackers', 'gonegirl', 'snake', 'rocky', 'ludwig', 'vega', 'ikiru', 'icecream', 'nectarinesingerbeat', 'plutograntorinocat', 'starshipfluteeagle', 'asteroidpioneer10fox', 'chocolatebarlyrics', 'theapartmentscarface', 'teafogpancakesleoi', 'wheatbreadwinepepper', 'thedude', 'eggmementoseaglove', 'operativoMen'];
        $emails = ['Zucchino@example.it', 'PYROMOKEY@example.it', 'BioJack@example.it', 'ParaLor@example.it', 'xizzan@example.it', 'Beatrix@example.it', 'ErMirage@example.it', 'Frasca16@example.it', 'Kiraks@example.it', 'Napoli@napoli.com', 'russmi03@eeetivsc.com', 'tatari1998@heepclla.com', 'exgymnast@gmailpro.cf', '2001ups@santonicrotone.it', 'nadyschagirl@mumbama.com', 'rhaat5im@piftir.com',  'kwikenz@icenhl.com', 'nucule@nalsci.com', 'successwork@literk.site', 'ellis88@ezybarber.com', 'lecasta@btcmod.com', 'bruno1871@iseovels.com', 'rz4jbk@cbarato.vip', 'krash448@appsmail.us', 'bighorn@wpdork.com', 'ingoramme@sharyndoll.com', 'msuguy@boranora.com', 'poslugakievua@samaltour.site', 'byyfp@adaov.com', 'disscontent@wpdork.com', 'virtume99@athdn.com', 'raykemp@nonise.com'];
        $adresses = ['Via Andreotti', 'Via Ciampi', 'Via Prodi', 'Viale Sgarbi', 'Corso Craxi', 'Viale del Cavaliere', 'Corso Berlinguer', 'Viale Aldo Moro', 'Via Napolitano', 'Piazza Napli', 'Via del Tutto Eccezionale', 'Via Dante Alighieri', 'Piazza delle Erbe', 'Corso Garibaldi', 'Via Statuto', 'Corso Bernardini', 'Viale Mazzini', 'Piazza Cavour', 'Via del Popolo', 'Via Ragazzi del 99', 'Via Lodi'];


        for ($i = 0; $i < 30; $i++) {

            $user = new User();

            $user->name = $names[rand(0, count($names) - 1)];
            $user->surname = $surnames[rand(0, count($surnames) - 1)];
            $user->username = array_shift($usernames);
            $user->email = array_shift($emails);
            $user->slug = $this->slug($user->name, $user->id);
            $user->address = $adresses[rand(0, count($adresses) - 1)];
            $user->password = Hash::make(Str::of($user->name) . Str::of($user->name));
            $user->save();

            //per syncare una categoria all'user perché boh la consegna non ha senso e mentre crei l'account devi scegliere la categoria
            //sta roba sotto randomizza una categoria a caso, perciò serve lanciare prima il seeder delle categorie
            //non capisco perchè si faccia dopo il il save(), forse perché l'user deve essere definito prima di synacrsi
            $category = Category::inRandomOrder()->first()->id;
            $user->categories()->sync([$category]);

            $availability = Availability::inRandomOrder()->first()->id;
            $user->availabilities()->sync([$availability]);
        }
    }
}
