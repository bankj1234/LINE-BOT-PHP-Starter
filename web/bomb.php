<?php

$strAccessToken = "qrY+y8/5H4+d2sgfrGrqd2UxHy5oYqNjeh82K/ELY4ikjMm3U6Ui2se5OXJ/aqxE+i9vPvrOE57YVrajz/ZLZxx3QY76tY/ejhh+xasxojLkaONvYwpDjIcmlSsHCkrsWFRIPMzf8Q4454wDtSkcFQdB04t89/1O/w1cDnyilFU=";

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);

$strUrl = "https://api.line.me/v2/bot/message/reply";

$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$_msg = $arrJson['events'][0]['message']['text'];


$api_key="jMqjrU6jtBWsx94G_LD6A00F4Ll4npX_";
$url = 'https://api.mlab.com/api/1/databases/bot/collections/linebot?apiKey='.$api_key.'';
$json = file_get_contents('https://api.mlab.com/api/1/databases/bot/collections/linebot?apiKey='.$api_key.'&q={"question":"'.$_msg.'"}');
$data = json_decode($json);
$isData=sizeof($data);

if (strpos($_msg, 'สอนบอม') !== false) {
    if (strpos($_msg, 'สอนบอม') !== false) {
        $x_tra = str_replace("สอนบอม","", $_msg);
        $pieces = explode("|", $x_tra);
        $_question=str_replace("[","",$pieces[0]);
        $_answer=str_replace("]","",$pieces[1]);
        //Post New Data
        $newData = json_encode(
            array(
                'question' => $_question,
                'answer'=> $_answer
            )
        );
        $opts = array(
            'http' => array(
                'method' => "POST",
                'header' => "Content-type: application/json",
                'content' => $newData
            )
        );
        $context = stream_context_create($opts);
        $returnValue = file_get_contents($url,false,$context);
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = 'กูจำได้แล้ว เดียวมึงเจอกู';
    }
}else{
    if($isData >0){
        foreach($data as $rec){
            $arrPostData = array();
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";
            $arrPostData['messages'][0]['text'] = $rec->answer;
        }
    }else{

        if (strpos($_msg, 'บอม') !== false) {
            $arrPostData = array();
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";
            $arrPostData['messages'][0]['text'] = 'พิมพ์ควยไรกันกูไม่เข้าใจ อยากให้กูจำได้พิมพ์ว่า : สอนบอม[คำถาม|คำตอบ]';
        }

    }
}


$channel = curl_init();
curl_setopt($channel, CURLOPT_URL,$strUrl);
curl_setopt($channel, CURLOPT_HEADER, false);
curl_setopt($channel, CURLOPT_POST, true);
curl_setopt($channel, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($channel, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($channel, CURLOPT_RETURNTRANSFER,true);
curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($channel);
curl_close ($channel);
?>