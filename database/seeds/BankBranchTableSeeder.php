<?php

use Illuminate\Database\Seeder;
use Flynsarmy\CsvSeeder\CsvSeeder;

class BankBranchTableSeeder extends CsvSeeder
{

    public function __construct()
    {
        $this->table = 'bank_branches';
        $this->filename = base_path(). '/database/seeds/csv/bank_branch.csv';
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
        DB::table($this->table)->truncate();

        parent::run();
    }
}
