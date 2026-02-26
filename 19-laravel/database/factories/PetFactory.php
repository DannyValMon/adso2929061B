<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
      $petNames = ["Max", "Luna", "Rocky", "Nala", "Bella", "Milo", "Lola", "Simba", "Kira", "Thor", "Chico", "Oso", "Toby"];

    $dogBreeds = ["Labrador Retriever", "Golden Retriever", "German Shepherd", "French Bulldog", "Poodle"];

    $catBreeds = ["Persian", "Siamese", "Maine Coon", "British Shorthair", "Bengal"];

    $pigBreeds = ["Juliana", "Vietnamese", "Kunekune", "Göttingen Minipig", "Yucatan Minipig"];

    $birdBreeds = ["Budgerigar", "Cockatiel", "Lovebird", "Canary", "Hummingbird"];

    $kind = fake()->randomElement(["Dog", "Cat", "Pig", "Bird"]);

    switch ($kind) {
        case "Dog":
            $breed = fake()->randomElement($dogBreeds);
            break;

        case "Cat":
            $breed = fake()->randomElement($catBreeds);
            break;

        case "Pig":
            $breed = fake()->randomElement($pigBreeds);
            break;

        default:
            $breed = fake()->randomElement($birdBreeds);
            break;
    }
   return [
            'name' => fake()->ColortName(),
            'kind' => fake()->randomElement(['Dog', 'Cat', 'Rabbit', 'Bird']),
            'weight' => fake()->numerify('#.#'), 
            'age' => fake()->numberBetween(1, 15),
            'breed' => fake()->randomElement(['Type1', 'Type2', 'Type3']),
            'location' => fake()->city(),
            'description' => fake()->sentence(5),
        ];
    }
}