<?php

namespace Database\Factories;

use App\Models\Category;
use Faker\Generator;
use Faker\Provider\pt_PT\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_PT');
        $avatar = [
            'only-escorts/avatar/female-1.png',
            'only-escorts/avatar/female-2.png',
            'only-escorts/avatar/female-3.png',
            'only-escorts/avatar/male-1.png',
            'only-escorts/avatar/male-2.png',
            'only-escorts/avatar/male-3.png',
            'only-escorts/avatar/trans-1.png',
            'only-escorts/avatar/trans-2.png',
            'only-escorts/avatar/trans-3.png',
        ];

        $slide = [
            'only-escorts/slider/slide-1.png',
            'only-escorts/slider/slide-2.png',
            'only-escorts/slider/slide-3.png',
            'only-escorts/slider/slide-4.png',
            'only-escorts/slider/slide-5.png',
            'only-escorts/slider/slide-6.png',
        ];
        $name = fake()->name();

        $category = Category::query()->select('id')->get();

        return [
            'name' => $name,
            'about_me' => fake()->text(1024),
            'phone' => fake()->phoneNumber(),
            'birth' => fake()->dateTimeBetween('-50 years','-18 years'),
            'gender' => fake()->randomElement(['male','female','trans']),
            'category_id' => fake()->randomElement($category),
            'city' => $faker->city,
            'avatar' => fake()->randomElement($avatar),
            'slide' => fake()->randomElement($slide),
            'slug' => Str::slug($name),
            'country' => 'Portugal'
        ];
    }
}
