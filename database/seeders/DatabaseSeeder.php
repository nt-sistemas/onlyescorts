<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Image;
use App\Models\Profile;
use App\Models\User;
use Faker\Core\Uuid;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Ramsey\Uuid\Rfc4122\UuidV4;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Category::factory()->count(4)->sequence(
            [
                'category' => 'MEN'
            ],
            [
                'category' => 'WOMEN'
            ],
            [
                'category' => 'COUPLE'
            ],
            [
                'category' => 'BISEXUAL'
            ],
        )->create();

        User::factory(1000)->create()
            ->each(function ($u) {
                $u->profile()->save(Profile::factory()->create(['user_id' => $u->id]));
            });

        $users = User::all();

        $images = [
            'only-escorts/images/image-1.png',
            'only-escorts/images/image-2.png',
            'only-escorts/images/image-3.png',
            'only-escorts/images/image-4.png',
            'only-escorts/images/image-5.png',
            'only-escorts/images/image-6.png',
            'only-escorts/images/image-7.png',
            'only-escorts/images/image-8.png',
            'only-escorts/images/image-9.png',
            'only-escorts/images/image-10.png',
            'only-escorts/images/image-11.png',
            'only-escorts/images/image-12.png',
            'only-escorts/images/image-13.png',
            'only-escorts/images/image-14.png',
            'only-escorts/images/image-15.png',
        ];

        foreach ($users as $user) {
            foreach ($images as $image) {
                Image::factory()->create([
                    'user_id' => $user->id,
                    'path' => $image
                ]);
            }

        }
    }
}
