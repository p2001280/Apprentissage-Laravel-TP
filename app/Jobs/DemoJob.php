<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Property;

class DemoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $deleteWhereMissingModels = true;

    /**
     * Create a new job instance.
     */
    public function __construct(private Property $property)
    {
        $this->property = $property->withoutRelations();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $property = $this->property->refresh();
        echo $this->property->title;
    }
}
