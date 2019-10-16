<?php
$server = new Swoole\WebSocket\Server("0.0.0.0", 9501);
$server->set(array(
    'worker_num' => 8,    //worker process num
    'backlog' => 128,   //listen backlog
    'dispatch_mode'=>3, 
    'daemonize' =>1,
));
$server->on('open', function (Swoole\WebSocket\Server $server, $request) {
        //echo "server: handshake success with fd{$request->fd}\n";
    });
$server->on('message', function (Swoole\WebSocket\Server $server, $frame) {
        
   
    foreach ($server->connections as $fd) {
       
        if ($server->isEstablished($fd)) {
            $server->push($fd, $frame->data);
        }
    }
    });
$server->on('close', function ($ser, $fd) {
        
    });

$server->start();