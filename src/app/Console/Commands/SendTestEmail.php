<?php

namespace App\Console\Commands;

use App\Mail\UserRegisteredAdmin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-test-email';

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
        $testUser = \App\Models\User::find(1);
        Mail::to('deniss9oo@gmail.com')->send(new UserRegisteredAdmin($testUser));
    }
}
