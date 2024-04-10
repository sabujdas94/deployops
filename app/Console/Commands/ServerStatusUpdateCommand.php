<?php

namespace App\Console\Commands;

use App\Jobs\StatusUpdate;
use App\Models\Servers;
use Illuminate\Console\Command;

class ServerStatusUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:server-status-update-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Server Status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Servers::query()
            ->chunkById(10, fn($servers) => $this->dispatchChunk($servers));
    }
    protected function dispatchChunk($servers)
    {
        foreach ($servers as $server) {
            StatusUpdate::dispatch($server);
        }
    }
}
