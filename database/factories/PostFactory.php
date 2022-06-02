<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=$this->faker->words(3,true);
        $categories=Category::all()->pluck('id');
        return [
            'name'=>$name,
            'content'=>$this->faker->paragraphs(3,true),
            'thumbnail'=>$this->faker->imageUrl(),
            'important'=>$this->faker->numberBetween(0,1),
            'price'=>$this->faker->randomFloat(2,1,1000),
            'slug'=>Str::slug($name,'-'),
            'category_id'=>$this->faker->randomElement($categories),
            'created_at'=>$this->faker->dateTime()
        ];
    }
}
