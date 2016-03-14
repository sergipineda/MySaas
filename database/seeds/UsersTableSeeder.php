<?php
use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 5000)->create()->each(
            function($user) {
                $user->subscriptions()->save(
                    factory(\Laravel\Cashier\Subscription::class, 1)->make()
                );
            }
        );
    }
}