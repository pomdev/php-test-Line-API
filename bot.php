<?php
    
$proxy = 'http://fixie:JBHYLVfOyu7ZUvg@velodrome.usefixie.com:80';
$proxyauth = 'ek@wealth65.com:P@ssw0rd@2017';

$access_token = 'mOO1A40zvrJda8pQtdHRg3t2Ns/ui0axNP1nhiX3z5XWDoCHSP9x99u/XZWG2BfsX9ex4S0P060Hk9RPNXPgc72Sr6VxN+mO6sUhtSf5iSekhT72RI0trKd/HaxJY3dRc90ZUUrNuyG7tkhiqpyvEwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';

            /////////////////////////////////////////////////////////
            $url = 'https://api.line.me/v1/oauth/verify';
            /////////////////////////////////////////////////////////


			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "Ahoy \r\n";
		}
	}
}
echo "OK Ahoy";
