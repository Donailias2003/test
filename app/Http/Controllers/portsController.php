<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class portsController extends Controller
{
    public function index()
    {
        $ports = array(
            80 => 'HTTP',
            22 => 'SSH',
            3306 => 'MySQL'
        );

        $ip_list = array();

        foreach ($ports as $port => $name) {
            $fp = @fsockopen('localhost', $port, $errno, $errstr, 1);
            if ($fp) {
                $status = 'Aperta';
                $ip_address = gethostbyname('localhost');
                if (!array_key_exists($port, $ip_list)) {
                    $ip_list[$port] = array(
                        'port'=>$port,
                        'name' => $name,
                        'status' => $status,
                        'ip_addresses' => array($ip_address)
                    );
                } else {
                    array_push($ip_list[$port]['ip_addresses'], $ip_address);
                }
                fclose($fp);
            } else {
                $status = 'Chiusa';
                if (!array_key_exists($port, $ip_list)) {
                    $ip_list[$port] = array(
                        'port'=>$port,
                        'name' => $name,
                        'status' => $status,
                        'ip_addresses' => array()
                    );
                }
            }
        }
        $servers = Server::get();
        return view('ports',compact('ip_list'),compact('servers'));
    }

    public function startStopServer($id){
        $server = Server::find($id);
        $server->status = !($server->status);
        $server->save();
        return back();
    }
}
