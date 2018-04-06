<?php

// 创建一个同步非阻塞客户端tcp socket
// 第一个参数是表示socket的类型，有下面四种类型选择，这里选则tcp socket就好
/*
SWOOLE_SOCK_TCP 创建tcp socket
SWOOLE_SOCK_TCP6 创建tcp ipv6 socket
SWOOLE_SOCK_UDP 创建udp socket
SWOOLE_SOCK_UDP6 创建udp ipv6 socket
*/
// 第二个参数是同步还是异步
/*
SWOOLE_SOCK_SYNC 同步客户端
SWOOLE_SOCK_ASYNC 异步客户端
*/

$client = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_SYNC);
// 随后建立连接，连接失败直接退出并打印错误码
$client->connect('192.168.231.128', 9502) || exit("connect failed. Error: {$client->errCode}\n");
// 向服务端发送数据
$client->send("我要连接服务器");
// 从服务端接收数据
$response = $client->recv();
// 输出接受到的数据
echo $response . PHP_EOL;
// 关闭连接
$client->close();



