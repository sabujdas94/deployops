<?php

namespace App\Jobs;

use App\Helpers\Ssh;
use App\Models\Servers;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class StatusUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $server;

    /**
     * Create a new job instance.
     */
    public function __construct(Servers $server)
    {
        $this->server = $server;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $error = Ssh::checkConnection($this->server);

        $this->server->timestamps = false;

        if ($error === '') {
            $this->server->status = 'connected';
        } else {
            $this->server->status = 'disconnected';
        }

        $this->server->last_check = Carbon::now();

        $this->server->save();
    }
}
