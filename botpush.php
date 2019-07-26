<?php



require "vendor/autoload.php";

$access_token = 'dg88Iefq/eVrxmjbzu1XSDzF71yk5rjZMt3NH6y+rFXWeRbkOVeIDCHnbVjpqOcYcBjrixG54xs1Zu2ScPazMn1Iu9fnB+aaRAbFDHH930+M2kkvGqFg1e95FOPL4PNHfEWRWtt0J8nHeKKhUs9R9gdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'ca3f8b9cb5b286a250d57a1cb5ebd9d7';

$pushID = 'U2a6ffdb3c837f6fc3a08fc6b33f9e6b1';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







