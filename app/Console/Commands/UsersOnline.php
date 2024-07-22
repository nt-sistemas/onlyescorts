<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UsersOnline extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'users:online';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Give online some users';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $users = User::query()
      ->where('online', false)
      ->inRandomOrder()
      ->limit(20)
      ->get();

    foreach ($users as $user) {
      $user->online = true;
      $user->save();
    }
  }
}
