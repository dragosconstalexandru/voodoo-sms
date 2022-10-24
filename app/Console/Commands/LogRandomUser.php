<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\LogUser;
use App\Models\User;
use Exception;

class LogRandomUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Picks a random user and pushes an instance of the App\Jobs\LogUser job, to the queue';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(LogUser $logUser)
    {
        try {
            $pickedUser = User::inRandomOrder()->limit(1)->get()->first();
            LogUser::dispatch($pickedUser);
            return Command::SUCCESS;
        } catch (Exception $exception) {
            return Command::FAILURE;
        }
    }
}
