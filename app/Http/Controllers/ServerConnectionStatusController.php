<?php

namespace App\Http\Controllers;

use App\Models\Servers;
use DivineOmega\SSHConnection\SSHConnection;
use Illuminate\Http\Request;
use Spatie\Ssh\Ssh;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ServerConnectionStatusController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, int $server)
    {
        $server = Servers::find($server);

        $error = \App\Helpers\Ssh::checkConnection($server);

        return response()->json([
            'status' => $error === '' ? "Connected" : 'Disconnected',
            'message' => $error,
        ]);
    }
}
