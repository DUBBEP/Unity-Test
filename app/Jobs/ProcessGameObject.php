<?php

namespace App\Jobs;

use App\Models\GameObject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessGameObject implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public GameObject $gameObject) {}

    public function handle(): void
    {
        // Expensive logic here (e.g., calculating world physics or stats)
        logger("Processing object: " . $this->gameObject->name);
    }
}