<?php

    namespace Database\Seeders;

    use App\Models\User;
    use Illuminate\Database\Seeder;

//    use Illuminate\Database\Console\Seeds\WithoutModelEvents;

    class UserTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            User::factory()->create([
                'first_name' => 'John',
                'last_name' => 'Doe van',
                'email' => 'johnvandoe@example.com',
                'is_active' => true,
            ]);

            User::factory()->create([
                'first_name' => 'Jenna',
                'last_name' => 'Doe van',
                'email' => 'jennavandoe@example.com',
                'is_active' => false,
            ]);

            // User::factory(10)->create();
        }
    }
