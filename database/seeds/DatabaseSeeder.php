<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//TABLE MIGRATION FOR VERSI II CONST
		// $this->call(IndonesiaTableSeeder::class);
		// $this->call(InitPengajuanTableSeeder::class);
		// $this->call(InitLanjutSurveiTableSeeder::class);
		$this->call(InitSurveiTableSeeder::class);

		//TABLE MIGRATION FOR API
		// $this->call(InitAPITestTableSeeder::class);

		//TABLE MIGRATION FOR ANY USER
		// $this->call(InitTestTableSeeder::class);
		// $this->call(IndonesiaTableSeeder::class);
		
		//ONLY FOR INTERNAL USER, USE IT AND REGRET IT
		// $this->call(StressTestTableSeeder::class);
	}
}
