<?php

use App\AdminDocument;
use Illuminate\Database\Seeder;

class adminDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminDocument::create([
            'document'=>'Proposal_Template.pdf',
            'name'=>'Proposal Template',
            'type'=>1
        ]);
    }
}
