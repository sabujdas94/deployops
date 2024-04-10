<?php
namespace App\Helpers;

use App\Models\Servers;
use DivineOmega\SSHConnection\SSHConnection;

class Ssh
{
    public static function checkConnection(Servers $server)
    {
        $connection = (new SSHConnection())
            ->to($server->ip)
            ->onPort($server->port)
            ->as($server->username);

        if($server->key_type === 'password'){
            $connection->withPassword($server->passkey)->timeout(5)->connect();
        }else {
            $privateKeyPath='';
            $connection->withPrivateKey($privateKeyPath)->timeout(5)->connect();
        }

        $command = $connection->run('pwd');

        return $command->getError();
    }
}
