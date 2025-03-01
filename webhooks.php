<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

$access_token = 'dg88Iefq/eVrxmjbzu1XSDzF71yk5rjZMt3NH6y+rFXWeRbkOVeIDCHnbVjpqOcYcBjrixG54xs1Zu2ScPazMn1Iu9fnB+aaRAbFDHH930+M2kkvGqFg1e95FOPL4PNHfEWRWtt0J8nHeKKhUs9R9gdB04t89/1O/w1cDnyilFU=';

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
			$text = "";
			// Get replyToken
			$replyToken = $event['replyToken'];

			/* เริ่ม */
			$userMessage = $event['message']['text']; 
	
			// $a = 'How are you?';
			// $a = 'How are you?';
			$search = 'สวัสดี';

			if(preg_match("/สวัสดี/i", $userMessage)) {
				$text = "ดีจ้าาา";
			} 
			else if (preg_match("/มี/i", $userMessage)) {
				$text = "มีอะไร";
			}
			else if (preg_match("/เครียด/i", $userMessage)) {
				$text = "โอ๋เอ๋นะ";
			}
			else if (preg_match("/เหนื่อย/i", $userMessage)) {
				$text = "มันเป็นยังไงไหนเล่า";
			}
			else if (preg_match("/หิว/i", $userMessage)) {
				$text = "หาแดก";
			}
			else if (preg_match("/เหงา/i", $userMessage)) {
				$text = "ไม่เหงาน๊า เราอยู่ตรงนี้";
			}
			else if (preg_match("/ท้อ/i", $userMessage)) {
				$text = "ให้กำลังใจตัวเองเยอะๆนะ";
			}
			else if ("ฝ้าย" == $userMessage) {
				$text = "นางแบบของน้องไม้หอม";
			}
			else if ("แอม" == $userMessage) {
				$text = "คิดถึง คนๆนี้จัง";
			}
			else {
				$text = "เบิดคำสิเว้า";
			} 
			// if (strpos($userMessage, 'สวัสดี') || $userMessage == 'สวัสดี') {
			// 	$text = "สวัสดีครับมีอะไรให้ช่วยมั๊ยครับ";
			// } else if (strpos($userMessage, 'รัก') == true) {
			// 	$text = "ความรักเป็นสิ่งสวยงาม";
			// } else if (strpos($userMessage, 'นอน') == true) {
			// 	$text = "การนอนหลับเป็นการพักผ่อนที่ดีที่สุด โดยไม่ต้องไปเที่ยวไหนเลย";
			// } else {
			// 	$text = "เบิดคำสิเว้า".$userMessage;
			// }
			/* จบ */
			
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
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

			echo $result . "\r\n";
		}
	}
}
echo "OK";
