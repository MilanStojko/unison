<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->pluck('id')->toArray();
        $sponsorship = DB::table('sponsorships')->pluck('id')->toArray();
        $duration = DB::table('sponsorships')->pluck('duration')->toArray();

        $plans = [];

        $random = rand(1, 10);
        for ($i = 0; $i < $random; $i++) {
            $randomUser = $user;
            shuffle($randomUser);

            $randomSpon = $sponsorship;
            shuffle($randomSpon);

            $randPlans = rand(1, count($sponsorship));
            for ($t = 0; $t < $randPlans; $t++) {
                $userId = array_shift($randomUser);
                $sponId = array_shift($randomSpon);
                $date = Carbon::now();
                $dateStart = $date;

                foreach ($plans as $plan) {
                    if ($plan['user_id'] == $userId && $plan['expiration'] > $dateStart) {
                        $dateStart = $plan['expiration'];
                    }
                }
                $hours = $duration[$sponId - 1];
                $expiration = (clone $dateStart)->add(new DateInterval("PT{$hours}H"));

                $plans[] = [
                    'user_id' => $userId,
                    'sponsorship_id' => $sponId,
                    'start_date' => $dateStart,
                    'expiration' => $expiration
                ];
            }
        }
        $idUsers = array_column($plans, 'user_id');
        $idsponsorships = array_column($plans, 'sponsorship_id');

        array_multisort($idUsers, SORT_NUMERIC, SORT_ASC, $idsponsorships, SORT_NUMERIC, SORT_ASC, $plans);

        DB::table('sponsorship_user')->insert($plans);
    }
}
