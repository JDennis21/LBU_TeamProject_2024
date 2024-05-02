<?php
$sock = socket_create(AF_INET, SOCK_STREAM, SQL_TCP);
socket_bind($sock, 'localhost', '8081');
socket_listen($sock, 3);
socket_close();