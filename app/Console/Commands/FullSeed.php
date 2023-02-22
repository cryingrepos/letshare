<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FullSeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prepare:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It Will Seed Whole Database.From External File';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = base_path('prepare/seed.sql');
        DB::unprepared(file_get_contents($path));
    }
}
