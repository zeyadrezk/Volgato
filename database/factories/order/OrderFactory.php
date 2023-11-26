<?php
	
	namespace Database\Factories\order;
	
	use Illuminate\Database\Eloquent\Factories\Factory;
	
	/**
	 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order\order>
	 */
	class OrderFactory extends Factory
	{
		/**
		 * Define the model's default state.
		 *
		 * @return array<string, mixed>
		 */
		public function definition(): array
		{
			return [
				'user_id'=>fake()->biasedNumberBetween(1,3),
				'DateOfOrder' => fake()->date,
				'OrderNumber' => 1235,
				'total' => 1,
				'status' => 'previous',
			
			];
		}
	}
