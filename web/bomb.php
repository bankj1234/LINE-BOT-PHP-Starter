<?php
$access_token = 'qrY+y8/5H4+d2sgfrGrqd2UxHy5oYqNjeh82K/ELY4ikjMm3U6Ui2se5OXJ/aqxE+i9vPvrOE57YVrajz/ZLZxx3QY76tY/ejhh+xasxojLkaONvYwpDjIcmlSsHCkrsWFRIPMzf8Q4454wDtSkcFQdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
include_once('dom.php');
// Validate parsed JSON data

//$myfile = fopen("data.txt", "r") or die("Unable to open file!");
//$data = fread($myfile,filesize("data.txt"));
//if($data == "1"){
if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {
        // Reply only when message sent is in 'text' format
        if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
            // Get text sent
            $textinput = $event['message']['text'];
            // Get replyToken
            $replyToken = $event['replyToken'];
            $case = 0;
            // Build message to reply back
            if (strpos($textinput, 'บอม') !== false || strpos($textinput, 'bom') !== false) {
                $myfile = fopen("data.txt", "w") or die("Unable to open file!");
                $txt = "1";
                fwrite($myfile, $txt);
                fclose($myfile);
                $case = 1;
                $rand = rand(0, 2);
                $case = 1;
                if ($rand == 1) {
                    $text = 'เสือกไรกู';
                } elseif ($rand == 2) {
                    $text = 'มาแล้วไอซาดดดดดดด';
                } else {
                    $text = 'เรียกหาพ่องมึงเหรอ';
                }
            }

            if (strpos($textinput, 'ไปไกลๆตีน') !== false) {
                $rand = rand(1, 5);
                if ($rand == 1) {
                    $myfile = fopen("data.txt", "w") or die("Unable to open file!");
                    $txt = "2";
                    fwrite($myfile, $txt);
                    fclose($myfile);
                    $text = 'เดียวมึงเจอกู';
                    $case = 1;
                } else {
                    $text = 'ไปหาพ่อมึงงะ';
                    $case = 1;
                }
            }

            $myfile = fopen("data.txt", "r") or die("Unable to open file!");
            $data = fread($myfile, filesize("data.txt"));
            if ($data == "1") {
                if (strpos($textinput, 'แข่ง') !== false || strpos($textinput, 'เตะ') !== false || strpos($textinput, 'ผล') !== false || strpos($textinput, 'บอล') !== false) {
                    $message = '
';
                    $html = file_get_contents('http://livescore.siamsport.co.th/widget/fixtures_results/1204/1');
                    /*** a new dom object ***/
                    $dom = new domDocument;

                    /*** load the html into the object ***/
                    $dom->loadHTML($html);

                    /*** discard white space ***/
                    $dom->preserveWhiteSpace = false;

                    /*** the table by its tag name ***/

                    $tables = getElementsByClass($dom, 'div', 'scoreBox');


                    /*** get all rows from the table ***/
//$rows = $tables->item(0)->getElementsByTagName('tr');

                    /*** loop over the table rows ***/
                    foreach ($tables as $key => $row) {

                        $div = $row->getElementsByTagName('div');
                        $message .= '----- ' . $div->item(0)->nodeValue . ' -----
';
                        foreach ($row->getElementsByTagName('tr') as $data) {
                            $message .= $data->nodeValue . '
';
                        }
                    }
                    $message = strip_tags($message);
                    $text = $message;
                    $case = 1;
                }

                if (strpos($textinput, 'ถ่ายทอด') !== false || strpos($textinput, 'ช่อง') !== false) {
                    $message = '
';
                    $html = file_get_contents('http://livescore.siamsport.co.th/widget/live_table');
                    /*** a new dom object ***/
                    $dom = new domDocument;

                    /*** load the html into the object ***/
                    $dom->loadHTML($html);

                    /*** discard white space ***/
                    $dom->preserveWhiteSpace = false;

                    /*** the table by its tag name ***/
                    $tables = $dom->getElementsByTagName('table');

                    /*** get all rows from the table ***/
//$rows = $tables->item(0)->getElementsByTagName('tr');

                    /*** loop over the table rows ***/
                    foreach ($tables as $key => $row) {
                        if ($key >= 1) {
                            $cols = $row->getElementsByTagName('tr');
                            foreach ($cols as $key2 => $cols) {
                                $td = $cols->getElementsByTagName('td');
                                if ($key2 == 0) {

                                } elseif ($key2 == 1) {
                                    $message .= '----- ' . $cols->nodeValue . ' -----
';
                                } else {
                                    $message .= $td->item(0)->nodeValue . ' | ';
                                    $message .= $td->item(1)->nodeValue . ' | ';
                                    $message .= $td->item(2)->nodeValue . '
';
                                }
                            }
                        }
                    }
                    $message = strip_tags($message);
                    $text = $message;
                    $case = 1;
                }

                if (strpos($textinput, 'คะแนน') !== false) {
                    $text = 'ดูเอาเอง -> http://livescore.siamsport.co.th/widget/standing/1204';
                    $case = 1;
                }

                if (strpos($textinput, 'สาว') !== false) {
                    $rand = rand(1, 30);
                    switch ($rand) {
                        case 1:
                            $text = 'https://www.instagram.com/nookzii/';
                            $case = 1;
                            break;
                        case 2:
                            $text = 'https://www.instagram.com/bunny_ployfon/';
                            $case = 1;
                            break;
                        case 3:
                            $text = 'https://www.instagram.com/bamzilla/';
                            $case = 1;
                            break;
                        case 4:
                            $text = 'https://www.instagram.com/nannyy/';
                            $case = 1;
                            break;
                        case 5:
                            $text = 'https://www.instagram.com/alexz_sarocha/';
                            $case = 1;
                            break;
                        case 6:
                            $text = 'https://www.instagram.com/berryying/';
                            $case = 1;
                            break;
                        case 7:
                            $text = 'https://www.instagram.com/_nungnink_/';
                            $case = 1;
                            break;
                        case 8:
                            $text = 'https://www.instagram.com/beth_lookgade/';
                            $case = 1;
                            break;
                        case 9:
                            $text = 'https://www.instagram.com/elle_elin/';
                            $case = 1;
                            break;
                        case 10:
                            $text = 'https://www.instagram.com/fearythanyarat/';
                            $case = 1;
                            break;
                        case 11:
                            $text = 'https://www.instagram.com/bunny.fuengfah/';
                            $case = 1;
                            break;
                        case 12:
                            $text = 'https://www.instagram.com/n_kang_nung/';
                            $case = 1;
                            break;
                        case 13:
                            $text = 'https://www.instagram.com/dejarvu/';
                            $case = 1;
                            break;
                        case 14:
                            $text = 'https://www.instagram.com/wpearita/';
                            $case = 1;
                            break;
                        case 15:
                            $text = 'https://www.instagram.com/miikuskie/';
                            $case = 1;
                            break;
                        case 16:
                            $text = 'https://www.instagram.com/cutegirlthailand/';
                            $case = 1;
                            break;
                        case 17:
                            $text = 'https://www.instagram.com/jomjamspch/';
                            $case = 1;
                            break;
                        case 18:
                            $text = 'https://www.instagram.com/nuchcheeber/';
                            $case = 1;
                            break;
                        case 19:
                            $text = 'https://www.instagram.com/skykikijung/';
                            $case = 1;
                            break;
                        case 20:
                            $text = 'https://www.instagram.com/crystal_girls_/';
                            $case = 1;
                            break;
                        case 21:
                            $text = 'https://www.instagram.com/donutacm/';
                            $case = 1;
                            break;
                        case 22:
                            $text = 'https://www.instagram.com/jaaeynano/';
                            $case = 1;
                            break;
                        case 23:
                            $text = 'https://www.instagram.com/fhm_ohly/';
                            $case = 1;
                            break;
                        case 24:
                            $text = 'https://www.instagram.com/padpudd/';
                            $case = 1;
                            break;
                        case 25:
                            $text = 'https://www.instagram.com/fhm_tanya/';
                            $case = 1;
                            break;
                        case 26:
                            $img = 'https://scontent-kul1-1.xx.fbcdn.net/v/t1.0-0/p350x350/16265186_10210453831156519_7957454316529614986_n.jpg?oh=4cff46558aaa4064c6cbb740a5ba2508&oe=591C5013';
                            $case = 2;
                            break;
                        case 27:
                            $img = 'https://scontent-kul1-1.xx.fbcdn.net/v/t1.0-9/16142628_10210453831076517_6780299885516424767_n.jpg?oh=485e0dd80b787a79ceb299be998ac152&oe=58FFF81B';
                            $case = 2;
                            break;
                        case 28:
                            $img = 'https://scontent-kul1-1.xx.fbcdn.net/v/t1.0-9/16195768_10210453831116518_1834306896464001100_n.jpg?oh=096fdcfcf742753b5a3468281ebac8b3&oe=5909F9D0';
                            $case = 2;
                            break;
                        case 29:
                            $img = 'https://scontent-kul1-1.xx.fbcdn.net/v/t1.0-9/16143305_10210453831516528_4406585939313454026_n.jpg?oh=1d266be09bf56aadc21ea57df61a9048&oe=594ADC78';
                            $case = 2;
                            break;
                        case 30:
                            $text = 'https://www.instagram.com/nuchcheeber/';
                            $case = 1;
                            break;

                    }

                }

                if (strpos($textinput, 'ประมูล') !== false) {
                    $rand = rand(1, 1000000000000);
                    $text = 'กูลง '.$rand. 'บาท';
                    $case = 1;
                }

                if (strpos($textinput, 'fuck') !== false || strpos($textinput, 'fck') !== false) {
                    $case = 1;
                    $rand = rand(0, 3);
                    if ($rand == 0) {
                        $text = 'fuck แม่งมึงดิ';
                    } else {
                        $text = 'เอาภาษาไทยให้รอดก่อนไอสัด';
                    }
                }

                if (strpos($textinput, 'มีเรื่อง') !== false || strpos($textinput, 'มาดิ') !== false || strpos($textinput, 'จะเอา') !== false || strpos($textinput, 'อยากมี') !== false) {
                    $case = 1;
                    $rand = rand(0, 3);
                    if ($rand == 0) {
                        $text = 'ทักมาสาด https://www.facebook.com/sippapeg';
                    } elseif ($rand == 1) {
                        $text = 'ทักมาสาด https://www.facebook.com/Chayak0rN';
                    } elseif ($rand == 2) {
                        $text = 'ทักมาสาด https://www.facebook.com/tueng.phobtum';
                    } elseif ($rand == 3) {
                        $text = 'ทักมาสาด https://www.facebook.com/bigzz.lee';
                    }
                }

                if (strpos($textinput, 'พูด') !== false || strpos($textinput, 'รู้เรื่อง') !== false) {
                    $case = 1;
                    $text = 'มึงพูดกะใคร';
                }

                if (strpos($textinput, 'มึง') !== false) {
                    $rand = rand(0, 2);
                    $case = 1;
                    if ($rand == 0) {
                        $text = 'ไรมึง';
                    } elseif ($rand == 1) {
                        $text = 'กวนตีนนะมึง';
                    } else {
                        $text = 'อยากมีเรื่อง ?';
                    }

                }

                if (strpos($textinput, 'หี') !== false) {

                    $rand = rand(0, 1);
                    if ($rand == 0) {
                        $text = 'หีแม่มมึงดิ';
                        $case = 1;
                    } else {
                        $text = 'พูดดีๆกับกูบ้างก็ได้....อีแตด';
                        $case = 1;
                    }
                }

                if (strpos($textinput, 'งง') !== false || strpos($textinput, 'อ่าว') !== false) {
                    $rand = rand(0, 1);
                    if ($rand == 0) {
                        $text = 'งงไรมึง';
                    } else {
                        $text = 'งงดิควาย';
                    }


                    $case = 1;
                }

                if (strpos($textinput, 'ตึ๋ง') !== false) {
                    $rand = rand(1, 5);
                    if ($rand == 2) {
                        $img = 'https://scontent.fbkk1-3.fna.fbcdn.net/v/t1.0-9/19397078_10211826625195512_453387659638537096_n.jpg?oh=f9330082176e94217b210c0e61fdbae6&oe=59D2CB26';
                        $case = 2;
                    }
                }

                if (strpos($textinput, 'เป็ก') !== false) {
                    $rand = rand(1, 5);
                    if ($rand == 2) {
                        $img = 'https://scontent.fbkk1-3.fna.fbcdn.net/v/t1.0-9/19429678_10211826625115510_6266436447082193193_n.jpg?oh=1551815a038fc3da1bc1d072d2723a86&oe=59C8CEA1';
                        $case = 2;
                    }
                }

                if (strpos($textinput, 'บิ๊ก') !== false) {
                    $rand = rand(1, 5);
                    if ($rand == 1) {
                        $text = 'ยุ่งไรกับบิ๊กวะควย';
                        $case = 1;
                    } elseif ($rand == 2) {
                        $img = 'https://scontent.fbkk1-3.fna.fbcdn.net/v/t1.0-9/19424550_10211826625515520_6353869511951839339_n.jpg?oh=5cdd6ff830cc37c872bebc8f284350ee&oe=59D0FEE6';
                        $case = 2;
                    }
                }

                if (strpos($textinput, 'ควย') !== false) {
                    $rand = rand(0, 2);
                    if ($rand == 0) {
                        $text = 'ควยพ่องมึงดิ';
                    } elseif ($rand == 1) {
                        $text = 'ควยไรสัด';
                    } elseif ($rand == 2) {
                        $text = 'ควยไร อยากมีเรื่อง?';
                    }
                    $case = 1;
                }

                if (strpos($textinput, 'สาส') !== false || strpos($textinput, 'สาด') !== false || strpos($textinput, 'สัด') !== false || strpos($textinput, 'สัส') !== false) {
                    $text = 'สัด...ควยไร';
                    $case = 1;
                }

                if (strpos($textinput, 'พ่อ') !== false) {
                    $text = 'พ่องมึงดิ';
                    $case = 1;
                }

                if (strpos($textinput, 'เย็ด') !== false) {
                    $text = 'เย็ดแหม่';
                    $case = 1;
                }

                if (strpos($textinput, '555') !== false) {
                    $rand = rand(0, 1);
                    if ($rand == 0) {
                        $array = [
                            "id" => "325708",
                            "type" => "sticker",
                            "packageId" => "1",
                            "stickerId" => "100"
                        ];
                        $case = 4;
                    } else {
                        $text = 'ตลกเหรอซาดดดด';
                        $case = 1;
                    }
                }

                if (strpos($textinput, 'หิว') !== false) {
                    $rand = rand(297, 307);
                    $array = [
                        "id" => "325708",
                        "type" => "sticker",
                        "packageId" => "4",
                        "stickerId" => $rand
                    ];
                    $case = 4;
                }

                if (strpos($textinput, 'อะไรคือ') !== false) {
                    $text_ex = explode(':', $textinput);
                    //เอาข้อความมาแยก : ได้เป็น Array
                    if ($text_ex[0] == "อะไรคือ") { //ถ้าข้อความคือ "อยากรู้" ให้ทำการดึงข้อมูลจาก Wikipedia หาจากไทยก่อน //https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles=PHP
                        $ch1 = curl_init();
                        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($ch1, CURLOPT_URL, 'https://th.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles=' . $text_ex[1]);
                        $result1 = curl_exec($ch1);
                        curl_close($ch1);
                        $obj = json_decode($result1, true);
                        foreach ($obj['query']['pages'] as $key => $val) {
                            $result_text = $val['extract'];
                        }
                        if (empty($result_text)) {//ถ้าไม่พบให้หาจาก en
                            $ch1 = curl_init();
                            curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($ch1, CURLOPT_URL, 'https://en.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro=&explaintext=&titles=' . $text_ex[1]);
                            $result1 = curl_exec($ch1);
                            curl_close($ch1);
                            $obj = json_decode($result1, true);
                            foreach ($obj['query']['pages'] as $key => $val) {
                                $result_text = $val['extract'];
                            }
                        }
                        if (empty($result_text)) {//หาจาก en ไม่พบก็บอกว่า ไม่พบข้อมูล ตอบกลับไป
                            $result_text = 'ไม่พบข้อมูล';
                        }
                        $text = $result_text;
                    }
                    $case = 1;
                }
            }
            fclose($myfile);
            if ($case == 1) {
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
            } elseif ($case == 2) {
                $messages = [
                    'type' => 'image',
                    'originalContentUrl' => $img,
                    'previewImageUrl' => $img
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
            } elseif ($case == 3) {
                $messages = [
                    'type' => 'template',
                    'altText' => 'this is a buttons template',
                    'template' => [
                        'type' => 'buttons',
                        'thumbnailImageUrl' => 'https://scontent-kul1-1.xx.fbcdn.net/v/t1.0-9/15241993_562090723995116_2585631797913092951_n.jpg?oh=932cb33408d365d9e5f40840c88bc379&oe=59152885',
                        'title' => 'ราชาเทียมดำ',
                        'text' => 'จะแดกไม่แดก',
                        'actions' => [
                            [
                                'type' => 'message',
                                'label' => 'ซื้อ',
                                'text' => 'โทนๆ มีคนสนใจ'
                            ], [
                                'type' => 'message',
                                'label' => 'ไม่ซื้อ',
                                'text' => 'เสียเวลาชิบหาย ถามหาพ่อมึงเหรอ'
                            ]
                        ]
                    ]
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
            } elseif ($case == 4) {

                $messages = $array;
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
}
//}
//fclose($myfile);


function getElementsByClass(&$parentNode, $tagName, $className)
{
    $nodes = array();

    $childNodeList = $parentNode->getElementsByTagName($tagName);
    for ($i = 0; $i < $childNodeList->length; $i++) {
        $temp = $childNodeList->item($i);
        if (stripos($temp->getAttribute('class'), $className) !== false) {
            $nodes[] = $temp;
        }
    }

    return $nodes;
}

echo "OK";