<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => 'Naufal Chautsar',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('admin123'),
        ];
    }
}
