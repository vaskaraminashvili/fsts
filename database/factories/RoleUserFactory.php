<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;

class RoleUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RoleUser::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'role_id' => Role::factory(),
            'user_id' => User::factory(),
        ];
    }
}
