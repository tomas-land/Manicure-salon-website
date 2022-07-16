<?php

namespace App\Console\Commands;

use Ifsnop\Mysqldump as IMysqldump;
use Illuminate\Console\Command;

class dumpDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to dump database';

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
     * @return int
     */
    public function handle()
    {
        $db_user = getenv('DB_USERNAME');
        $db_pass = getenv('DB_PASSWORD');
        
        try {
            $dump = new IMysqldump\Mysqldump('mysql:host=127.0.0.1;dbname=vb-studija', $db_user, $db_pass);
            $dump->start('/Volumes/Users/Public/virmante-shared/vb-dbBackup.sql');
        } catch (\Exception $e) {
            echo 'mysqldump-php error: ' . $e->getMessage();
        }
    }
}
