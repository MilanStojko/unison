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
        foreach ($emails as $email) {
            $fake_email = new Message();
            $fake_email->email = $email;
            $fake_email->content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam porttitor gravida enim, eget semper odio consequat in. Vestibulum efficitur blandit mi at accumsan. Curabitur nibh elit, finibus rhoncus dui vitae, egestas iaculis mi. Donec aliquam elementum turpis, vel egestas dui. Praesent nec enim eleifend, iaculis urna vel, dictum ipsum. Proin sit amet dictum ipsum, nec dapibus enim. Nulla facilisi. Praesent id tortor ex. Nulla eget purus eget dolor condimentum vestibulum. Mauris vestibulum dapibus augue, sit amet iaculis leo scelerisque sed. Integer at ex felis. Suspendisse ipsum nibh, suscipit mattis diam sit amet, consectetur consectetur ligula. Mauris sit amet ligula semper, vestibulum neque eu, blandit lorem. Integer ornare elit et nisi sollicitudin volutpat. Phasellus tempus finibus efficitur.';
            $fake_email->user_id = 1;
            $fake_email->name = "wewe";
            $fake_email->surname = "ciao";
            $fake_email->save();
        }
    }
}
