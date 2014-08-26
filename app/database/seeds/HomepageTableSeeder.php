<?php 

class HomepageTableSeeder extends Seeder {

    public function run()
    {
        DB::table('homepage')->delete();

        Homepage::create(array(

        		'id'			=> 1,
				'first_name' 	=> 'Rick',
				'last_name' 	=> 'Bennett',
				'email' 		=> 'RBennett1106@gmail.com',
				'phone' 		=> '(270) 300-4202',
				'location' 		=> 'Elizabethtown, KY',
				'headline'		=> 'A developer focusing on PHP'
		));
    }

}