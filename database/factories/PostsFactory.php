<?php

namespace Database\Factories;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{   
    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = Posts::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        return [
            'categorie_id' => rand(1,4),
            'title' => $this->faker->title(),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(),
            'featured_image' => $this->faker->image('public/storage/images',640,480, null, false),
            
            
        ];
    }
}
