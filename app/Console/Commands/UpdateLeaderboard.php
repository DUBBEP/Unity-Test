<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\GameObject;
use Illuminate\Support\Facades\Cache;

class UpdateLeaderboard extends Command
{
    // The name you'd use to run it manually: php artisan app:update-leaderboard
    protected $signature = 'app:update-leaderboard';
    protected $description = 'Recalculate game object stats for the leaderboard';

    public function handle()
    {
        GameObject::refreshLeaderboardCache();
        $this->info('Leaderboard updated in Cache!');
    }
}