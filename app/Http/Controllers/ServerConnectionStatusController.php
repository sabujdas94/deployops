<?php

namespace App\Http\Controllers;

use App\Models\Servers;
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


        // SSH connection parameters
        $host = $server->ip;
        $username = $server->username;
        $password = $server->passkey; // or use SSH key instead
        $port = $server->port; // or use SSH key instead

        // SSH command to execute
        $command = sprintf(
            'ssh %s@%s -p %s',
           $username,
           $host,
            $port
        );

        // dd($command);

        // Create a new Process instance
        $process = new Process(['ssh', '-v']);

        // Run the command
        $process->run();

        // Check if the process was successful
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Output of the command
        dump($process->getOutput());




        // $process = Ssh::create($server->username, $server->ip, $server->port)
        //     ->execute(['pwd']);

        // dump($process->isSuccessful());
        // echo $process->getOutput();

        // return response()->json([
        //     'message' => $process->getOutput(),
        // ]);
    }
}
