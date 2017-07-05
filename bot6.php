{
  "events": [
      {
        "replyToken": "nHuyWiB7yP5Zw52FIkcQobQuGDXCTA",
        "type": "message",
        "timestamp": 1462629479859,
        "source": {
             "type": "user",
             "userId": "U206d25c2ea6bd87c17655609a1c37cb8"
         },
         "message": {
             "id": "325708",
             "type": "text",
             "text": "Hello, world"
          }
      }
  ]
}


<?php
$access_token = 'mOO1A40zvrJda8pQtdHRg3t2Ns/ui0axNP1nhiX3z5XWDoCHSP9x99u/XZWG2BfsX9ex4S0P060Hk9RPNXPgc72Sr6VxN+mO6sUhtSf5iSekhT72RI0trKd/HaxJY3dRc90ZUUrNuyG7tkhiqpyvEwdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
  
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$access_token}";
 
if($event['type'] == 'message' && $event['message']['text'] == "ÊÇÑÊ´Õ"){

            // Get replyToken
			$replyToken = $event['replyToken'];

						// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => "ÊÇÑÊ´Õ¨êÐ"
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];

			$post = json_encode($data);

			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result . "\r\n";

echo "Wow BOT3";