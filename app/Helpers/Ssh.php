<?php
namespace App\Helpers;

use App\Models\Servers;
use DivineOmega\SSHConnection\SSHConnection;

class Ssh
{
    public $connection;

    public function __construct(Servers $server)
    {
        $this->connection = self::getConnection($server);
    }

    public function getVersion(): string
    {
        $command = $this->connection->run("git --version");
        return $this->returnStringOutPut($command);
    }

    public function getDiskSpace(): string
    {
        $command = $this->connection->run("df -h");
        return $this->returnStringOutPut($command);
    }
    public function getComposerVersion(): string
    {
        $command = $this->connection->run("composer -v");
        if ($command->getError()) {
            return $command->getError();
        }
        // Regular expression pattern
        $pattern = '/Composer version ([\d.]+)/';
        // Match the pattern in the output
        preg_match($pattern, $command->getOutput(), $matches);
        // Extract the version number
        $version = isset($matches[1]) ? $matches[1] : null;

        return $version;
    }

    public function showOltBasic()
    {
        $command = $this->connection->run("enable");
        // $command = $this->connection->run("show epon basic-info");
        dd($command);
        return $this->returnStringOutPut($command);
    }

    protected function returnStringOutPut($result): string
    {
        if ($result->getError()) {
            return $result->getError();
        }
        return $result->getOutput();
    }

    public static function getConnection(Servers $server)
    {
        $connection = (new SSHConnection())
            ->to($server->ip)
            ->onPort($server->port)
            ->as($server->username);

        if ($server->key_type === 'password') {
            $connection->withPassword($server->passkey)->timeout(5)->connect();
        } else {
            $privateKeyPath = '';
            $connection->withPrivateKey($privateKeyPath)->timeout(5)->connect();
        }
        return $connection;
    }
    public static function checkConnection(Servers $server)
    {
        $connection = self::getConnection($server);

        $command = $connection->run('pwd');

        $connection->disconnect();

        return $command->getError();
    }

    public function disconnect(): void
    {
        $this->connection->disconnect();
    }

    public static function newUpdateDeploy(Servers $server)
    {
        try {
            $connection = self::getConnection($server);

            $connection->run('cd /home/mytempma/gaapi.mytempmail.xyz');

            $command = $connection->run('git pull');

            $connection->disconnect();

            if ($command->getError()) {
                return $command->getError();
            }
            return $command->getOutput();
            
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
