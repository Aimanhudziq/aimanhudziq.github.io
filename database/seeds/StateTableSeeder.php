<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class StateTableSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->table = 'states';
        $this->filename = base_path(). '/database/seeds/csv/states.csv';
        $this->should_trim = true;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::disableQueryLog();
        //DB::table($this->table)->truncate();
        DB::table('bank_branches')->delete();


        parent::run();
    }
}
