<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigratingInPhase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'KoperasiPro Migrate Init';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        shell_exec('php artisan migrate --path=database/migrations/1_territorial');
        shell_exec('php artisan migrate --path=database/migrations/2_immigration');
        shell_exec('php artisan migrate --path=database/migrations/3_pengajuankredit');
        shell_exec('php artisan migrate --path=database/migrations/4_surveikredit');
        shell_exec('php artisan migrate --path=database/migrations/5_kasir');
    }
}
