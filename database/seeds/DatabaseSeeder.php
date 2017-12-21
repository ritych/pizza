<?php

use Illuminate\Database\Seeder;
use App\Ingridient;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(IngridientTableSeeder::class);
		
		Ingridient::create(['title' => 'small (5")', 'type' => 'size', 'cost' => '2.09']);
		Ingridient::create(['title' => 'medium (10")', 'type' => 'size', 'cost' => '3.15']);
		Ingridient::create(['title' => 'large (14")', 'type' => 'size', 'cost' => '5.59']);
		Ingridient::create(['title' => 'extralarge (16")', 'type' => 'size', 'cost' => '8.12']);
		Ingridient::create(['title' => 'unbelievable  (18")', 'type' => 'size', 'cost' => '10.15']);
		
		Ingridient::create(['title' => 'mozzarella cheese (60g)', 'type' => 'cheese', 'cost' => '1.10']);
		Ingridient::create(['title' => 'royal cheese (75g)', 'type' => 'cheese', 'cost' => '0.45']);
		Ingridient::create(['title' => 'feta cheese (60g)', 'type' => 'cheese', 'cost' => '0.45']);
		Ingridient::create(['title' => 'dorblue cheese (30g)', 'type' => 'cheese', 'cost' => '0.45']);
		Ingridient::create(['title' => 'mascarpone cheese (60g)', 'type' => 'cheese', 'cost' => '0.45']);
		Ingridient::create(['title' => 'parmesan cheese (35g)', 'type' => 'cheese', 'cost' => '0.35']);
		
		Ingridient::create(['title' => 'royal ham (75g)', 'type' => 'mafi', 'cost' => '1.15']);
		Ingridient::create(['title' => 'EMPIRE SALAMI (75g)', 'type' => 'mafi', 'cost' => '0.95']);
		Ingridient::create(['title' => 'bavarian salami (75g)', 'type' => 'mafi', 'cost' => '0.95']);
		Ingridient::create(['title' => 'HUNTER’S SALAMI (75g)', 'type' => 'mafi', 'cost' => '0.95']);
		Ingridient::create(['title' => 'DEBRECEN FRANKFURTER (75g)', 'type' => 'mafi', 'cost' => '0.95']);
		Ingridient::create(['title' => 'BAVARIAN sausages (75g)', 'type' => 'mafi', 'cost' => '0.95']);
		Ingridient::create(['title' => 'chicken (75g)', 'type' => 'mafi', 'cost' => '0.95']);
		Ingridient::create(['title' => 'veal (75g)', 'type' => 'mafi', 'cost' => '0.95']);
		Ingridient::create(['title' => 'pork (75g)', 'type' => 'mafi', 'cost' => '0.95']);
		Ingridient::create(['title' => 'tuna (97g)', 'type' => 'mafi', 'cost' => '1.13']);
		Ingridient::create(['title' => 'seafood mix (300g)', 'type' => 'mafi', 'cost' => '2.05']);
		
		Ingridient::create(['title' => 'TOMATOES (75g)', 'type' => 'vam', 'cost' => '0.50']);
		Ingridient::create(['title' => 'CORN (75g)', 'type' => 'vam', 'cost' => '0.45']);
		Ingridient::create(['title' => 'SWEET PEPPER (75g)', 'type' => 'vam', 'cost' => '0.45']);
		Ingridient::create(['title' => 'MUSHROOMS (75g)', 'type' => 'vam', 'cost' => '0.45']);
		Ingridient::create(['title' => 'BLACK OLIVES (75g)', 'type' => 'vam', 'cost' => '0.45']);
		Ingridient::create(['title' => 'PICKLED CUCUMBERS (75g)', 'type' => 'vam', 'cost' => '0.35']);
		Ingridient::create(['title' => 'SPINACH (75g)', 'type' => 'vam', 'cost' => '0.45']);
		
    }
}
