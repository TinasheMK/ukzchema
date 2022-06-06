<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ImportDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:import';

    protected $db_exists = false;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import the latest .sql database - Not Working 😭';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $arr = [];
        $files = collect(File::allFiles(storage_path('backups')))
            ->sortBy(function ($file) {
                return $file->getCTime();
            });
        $latest = $files->last();
        if(isset($latest)){
            $this->db_exists = true;
            // mysql> use your_db_name;
            // mysql> source /opt/file.sql;
            //mysql -hlocalhost -uroot -e"TRUNCATE dba.log_customer; TRUNCATE dba.log_quote; TRUNCATE dba.log_summary;"
            $code = sprintf(
                'mysql --login-path=local -e "use %s"; -e "source %s";',
                config('database.connections.mysql.database'),
                $files->first()->getRealpath()
            );
            // dd($code);
            $arr = explode(" ", $code);
        }
        parent::__construct();
        $this->process = new Process($arr);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo "Importing...\nThis might take more than 2 minutes.\n";
        try {
            $this->process->mustRun();
            $this->info('The import has been proceed successfully.');
        } catch (ProcessFailedException $exception) {
            dd($exception->getMessage());
            $this->error("The backup process has been failed. Reason: {$exception->getMessage()}");
        }
    }
}
