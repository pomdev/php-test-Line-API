<?php
$access_token = 'mOO1A40zvrJda8pQtdHRg3t2Ns/ui0axNP1nhiX3z5XWDoCHSP9x99u/XZWG2BfsX9ex4S0P060Hk9RPNXPgc72Sr6VxN+mO6sUhtSf5iSekhT72RI0trKd/HaxJY3dRc90ZUUrNuyG7tkhiqpyvEwdB04t89/1O/w1cDnyilFU=';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('<channel access token>');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel secret>']);

$response = $bot->replyText('<reply token>', 'hello!');

echo "OK";
