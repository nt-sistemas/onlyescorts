<?php

namespace App\Console\Commands;

use App\Jobs\OfflineJob;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UsersOffline extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'users:offline';

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
    $users = User::query()
      ->where('online', true)
      ->where('updated_at', '<', Carbon::now()->subMinutes(5))->get();



    foreach ($users as $user) {

      OfflineJob::dispatch($user);
    }
  }
}
