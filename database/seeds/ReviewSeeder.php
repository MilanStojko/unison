<?php

use App\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $strangers = ['bernardini', 'pompei', 'milan', 'lorenzo', 'pippo', 'jammja'];
        foreach ($strangers as $stranger) {
            $fake_review = new Review();
            $fake_review->user_id = 1;
            $fake_review->content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam porttitor gravida enim, eget semper odio consequat in. Vestibulum efficitur blandit mi at accumsan. Curabitur nibh elit, finibus rhoncus dui vitae, egestas iaculis mi. Donec aliquam elementum turpis, vel egestas dui. Praesent nec enim eleifend, iaculis urna vel, dictum ipsum. Proin sit amet dictum ipsum, nec dapibus enim. Nulla facilisi. Praesent id tortor ex. Nulla eget purus eget dolor condimentum vestibulum. Mauris vestibulum dapibus augue, sit amet iaculis leo scelerisque sed. Integer at ex felis. Suspendisse ipsum nibh, suscipit mattis diam sit amet, consectetur consectetur ligula. Mauris sit amet ligula semper, vestibulum neque eu, blandit lorem. Integer ornare elit et nisi sollicitudin volutpat. Phasellus tempus finibus efficitur.';
            $fake_review->vote = 3;
            $fake_review->username = $stranger;
            $fake_review->save();
        }
    }
}
