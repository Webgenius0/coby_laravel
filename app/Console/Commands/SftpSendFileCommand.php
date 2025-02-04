<?php

namespace App\Console\Commands;

use Illuminate\Auth\Events\Login;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use phpseclib3\Net\SFTP;

class SftpSendFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coby:sftp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sftp = new SFTP(env('SFTP_HOST'), env('SFTP_PORT'));
        if ($sftp->login(env('SFTP_USER'), env('SFTP_PASS'))) {
            Log::info('Connected');
            $directory = storage_path('app/file/'); 
            $files = File::allFiles($directory); 
            foreach ($files as $file) {
                $localPath = $file->getPathname(); 
                $remotePath = env('SFTP_PATH') . $file->getFilename(); 
                Log::info('Uploading ' . $file->getFilename());
                Log::info($localPath);
                if ($sftp->put($remotePath, $localPath)) {
                    Log::info($file->getFilename() . ' uploaded to ' . $remotePath);
                } else {
                    Log::error('Failed to upload ' . $file->getFilename());
                }
            }
        } else {
            Log::error('Failed to connect');
        }
        $sftp->disconnect();
    }
}
