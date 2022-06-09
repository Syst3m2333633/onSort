<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(User::class, 2)->create()->each(function($user) {
            $user->sortie()->saveMany(\App\Models\User::factory(Sortie::class, 10)->create([
                'user_id' => $user->id,
                'user_pseudo' => $user->pseudo,
                'user_name' => $user->name,
                'user_firstname' => $user->firstname,
                'user_phone' => $user->phone,
                'user_email' => $user->email,
                'user_password' => $user->password,
                'user_admin' => $user->admin,
                'user_actif' => $user->actif,
                'user_photo' => $user->photo,
                'user_campus_id' => $user->campus_id,
            ])->each(function($sortie){
                $sortie->participant()->attach([
                    rand(1,20),
                    rand(1,20),
                ]);
            }));
        });
    }
}
