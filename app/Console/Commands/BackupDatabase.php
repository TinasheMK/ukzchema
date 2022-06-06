<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class BackupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $code = sprintf(
            'mysqldump --login-path=local %s --result-file=%s',
            config('database.connections.mysql.database'),
            storage_path('backups/backup-' . time() . '.sql')
        );
        $files = collect(File::allFiles(storage_path('backups')))
            ->sortBy(function ($file) {
                return $file->getCTime();
            });
        if(count($files) > 5){
            unlink($files->first()->getRealpath());
        }
        $arr = explode(" ", $code);
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
        if(env('DB_CONNECTION') !== 'mysql'){
            return $this->error("This scrips works with mysql database connection only");
        }
        try {
            $this->process->mustRun();
            $this->info('The backup has been proceed successfully.');
        } catch (ProcessFailedException $exception) {
            $this->error("The backup process has been failed. Reason: {$exception->getMessage()}");
        }
    }
}
