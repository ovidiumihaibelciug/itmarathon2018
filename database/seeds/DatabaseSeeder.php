<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
        factory(\App\User::class, 4)->create();
        factory(App\User::class)->create([
            'first_name' => 'Alex',
            'last_name' => 'Cambose',
            'username' => 'alexcambose',
            'email' => 'alexcambose@yahoo.com',
            'role' => 2,
            'image_id' => function() {
                return factory(App\Media::class)->create(['filename' => 'userdata/images/11.jpg',])->id;
            }
        ]);
    }
}
