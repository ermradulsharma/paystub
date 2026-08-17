<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UserSubscriptionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:subscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Your Subscription is expired';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::whereNotNull('expiryDate')
            ->where('expiryDate', '!=', '')
            ->where('expiryDate', '<=', Carbon::now())
            ->update(['expiryDate' => '']);

        return Command::SUCCESS;
    }
}
