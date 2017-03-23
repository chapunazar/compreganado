<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class initializeData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		DB::table('breeds')->insert([
		            'id' => 1,
		            'name' => 'Shorthorn',
		            'type' => 'Británicas',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('breeds')->insert([
		            'id' => 2,
		            'name' => 'Hereford',
		            'type' => 'Británicas',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);


		 DB::table('breeds')->insert([
		            'id' => 3,
		            'name' => 'Aberdeen Angus',
		            'type' => 'Británicas',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('breeds')->insert([
		            'id' => 4,
		            'name' => 'Nerole',
		            'type' => 'Carne Cebú',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);
				
		DB::table('breeds')->insert([
		            'id' => 5,
		            'name' => 'Brahman',
		            'type' => 'Carne Cebú',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);
				
		DB::table('breeds')->insert([
		            'id' => 6,
		            'name' => 'Charolais',
		            'type' => 'Continentales',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('breeds')->insert([
		            'id' => 7,
		            'name' => 'Limousin',
		            'type' => 'Continentales',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);
				
		DB::table('breeds')->insert([
		            'id' => 8,
		            'name' => 'Pardo',
		            'type' => 'Continentales',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('breeds')->insert([
		            'id' => 9,
		            'name' => 'Fleckvieh - Simmental',
		            'type' => 'Continentales',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('breeds')->insert([
		            'id' => 10,
		            'name' => 'Santa Gertrudis',
		            'type' => 'Carne Cebuína',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('breeds')->insert([
		            'id' => 11,
		            'name' => 'Brangus',
		            'type' => 'Carne Cebuína',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('breeds')->insert([
		            'id' => 12,
		            'name' => 'Bradford',
		            'type' => 'Carne Cebuína',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('breeds')->insert([
		            'id' => 13,
		            'name' => 'Criolla',
		            'type' => 'Carne Argentina',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);
				
		DB::table('breeds')->insert([
		            'id' => 14,
		            'name' => 'Holando Argentino',
		            'type' => 'Lechera',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('breeds')->insert([
		            'id' => 15,
		            'name' => 'Jersey',
		            'type' => 'Lechera',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);		

				///////////////////////////
				
		DB::table('categories')->insert([
		            'id' => 1,
		            'name' => 'Vaquillonas',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);	

		DB::table('categories')->insert([
		            'id' => 2,
		            'name' => 'Vaquillonas Preñadas',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);	

		DB::table('categories')->insert([
		            'id' => 3,
		            'name' => 'Novillos',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);	

		DB::table('categories')->insert([
		            'id' => 4,
		            'name' => 'Novillos Joven',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);		
				
		DB::table('categories')->insert([
		            'id' => 5,
		            'name' => 'Vacas',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);	
				
		DB::table('categories')->insert([
		            'id' => 6,
		            'name' => 'Vacas 6 dientes',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);	
				
		DB::table('categories')->insert([
		            'id' => 7,
		            'name' => 'Terneros',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('categories')->insert([
		            'id' => 8,
		            'name' => 'Terneras',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);
				
		DB::table('categories')->insert([
		            'id' => 9,
		            'name' => 'Toros',
					'description' => 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

// PAYMENT METHODS
		DB::table('paymentmethods')->insert([
		            'id' => 1,
		            'name' => 'Acordar con vendedor',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('paymentmethods')->insert([
		            'id' => 2,
		            'name' => 'Efectivo',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('paymentmethods')->insert([
		            'id' => 3,
		            'name' => 'Tarjeta Credito/Debito',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('paymentmethods')->insert([
		            'id' => 4,
		            'name' => 'Cheque 30d',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('paymentmethods')->insert([
		            'id' => 5,
		            'name' => 'Cheque 60d',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('paymentmethods')->insert([
		            'id' => 6,
		            'name' => 'Cheque 90d',
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

// USERS

		DB::table('users')->insert([
		            'id' => 1,
		            'name' => 'admin',
					'email' => 'manuel@nazaranchorena.com.ar',
					'password' => bcrypt('admin'),
					'admin' => 1,
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);

		DB::table('users')->insert([
		            'id' => 2,
		            'name' => 'Usuario Ejemplo',
					'email' => 'chapunazar@gmail.com',
					'password' => bcrypt('1234'),
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
		        ]);
    }
}
