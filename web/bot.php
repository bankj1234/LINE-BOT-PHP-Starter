<?php
$access_token = 'S7u+m3LPEnv5g88DA1U/cgwTzJjBmVARDOKuCMsoBgIpi9kiltPJhQS3wi1x98au1DZpgwrYzYbtzKD0ze1C9LETZaGU7Jp2RD8vHsGOgDl3lwaTQcmBXs31PFffCp/Bl2UszxyvwRRaWvSlEQ/HOAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
include_once('dom.php');
// Validate parsed JSON data
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

            if(strpos($textinput, 'แข่ง') !== false || strpos($textinput, 'เตะ') !== false || strpos($textinput, 'ผล') !== false || strpos($textinput, 'บอล') !== false){
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

                $tables=getElementsByClass($dom, 'div', 'scoreBox');


                /*** get all rows from the table ***/
//$rows = $tables->item(0)->getElementsByTagName('tr');

                /*** loop over the table rows ***/
                foreach ($tables as $key => $row) {

                    $div = $row->getElementsByTagName('div');
                    $message .= '----- ' . $div->item(0)->nodeValue . ' -----
';
                    foreach ($row->getElementsByTagName('tr') as $data) {
                        $message .= $data->nodeValue.'
';
                    }
                }
                $message = strip_tags($message);
                $text = $message;
                $case = 1;
            }

            if(strpos($textinput, 'ถ่ายทอด') !== false || strpos($textinput, 'ช่อง') !== false){
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
                    if($key >= 1) {
                        $cols = $row->getElementsByTagName('tr');
                        foreach ($cols as $key2 => $cols) {
                            $td = $cols->getElementsByTagName('td');
                            if ($key2 == 0) {

                            }elseif($key2 == 1){
                                $message .=  '----- '.$cols->nodeValue . ' -----
';
                            }else{
                                $message .=  $td->item(0)->nodeValue. ' | ' ;
                                $message .=  $td->item(1)->nodeValue. ' | ' ;
                                $message .=  $td->item(2)->nodeValue. '
' ;
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
                $rand = rand(1, 29);
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
                }

            }

            if (strpos($textinput, 'ครก') !== false) {
                $rand = rand(0, 1);
                if($rand == 0){
                    $text = 'ครกพ่อง?';
                }else{
                    $text = 'อ้อร้ออิแหลงใต้นะมึง';
                }
                $case = 1;
            }

            if (strpos($textinput, 'fuck') !== false || strpos($textinput, 'fck') !== false) {
                $case = 1;
                $rand = rand(0, 3);
                if($rand == 0){
                    $text = 'fuck แม่งมึงดิ';
                }else{
                    $text = 'เอาภาษาไทยให้รอดก่อนไอสัด';
                }
            }



            if (strpos($textinput, 'มีเรื่อง') !== false || strpos($textinput, 'มาดิ') !== false || strpos($textinput, 'จะเอา') !== false || strpos($textinput, 'อยากมี') !== false) {
                $case = 1;
                $rand = rand(0, 3);
                if($rand == 0){
                    $text = 'โทรมาสัด 0848104588';
                }elseif($rand == 1){
                    $text = 'โทรมาสัด 0830164506';
                }elseif($rand == 2){
                    $text = 'โทรมาสัด 0806914151';
                }elseif($rand == 3){
                    $text = 'โทรมาสัด 0628295441';
                }
            }

            if (strpos($textinput, 'บอ ท') !== false ||strpos($textinput, 'บ อท') !== false || strpos($textinput, 'บ อ ท') !== false || strpos($textinput, 'บอท') !== false || strpos($textinput, 'bot') !== false) {
                $case = 1;
                $rand = rand(0, 1);
                $case = 1;
                if($rand == 1){
                    $text = 'เสือกไรกู';
                }else{
                    $text = 'บอทฆวยไร';
                }

            }

            if (strpos($textinput, 'ป้อม') !== false || strpos($textinput, 'เตี') !== false) {
                $rand = rand(0, 2);
                if($rand == 0){
                    $text = 'ป้อม';
                    $case = 1;
                }elseif($rand == 1){
                    $text = 'แวะหาของอร่อยกินก่อนถึงบ้านกันนะ "ป้อม ก๋วยเตี๋ยวหมูน้ำตก เปิด 11.00น-22.00น. ตรงข้ามนาซ่ามอลล์';
                    $case = 1;
                }else{
                    $img = 'https://scontent-kul1-1.xx.fbcdn.net/v/t31.0-8/1913398_1378470292422241_1410488251_o.jpg?oh=50494534260d63d1ae2f087fbb122458&oe=591B9D41';
                    $case = 2;
                }
            }



            if (strpos($textinput, 'พูด') !== false || strpos($textinput, 'รู้เรื่อง') !== false) {
                $case = 1;
                $text = 'มึงพูดกะใคร';
            }

            if (strpos($textinput, 'มึง') !== false) {
                $rand = rand(0, 2);
                $case = 1;
                if($rand == 0){
                    $text = 'ไรมึง';
                }elseif($rand == 1){
                    $text = 'กวนตีนนะมึง';
                }else{
                    $text = 'อยากมีเรื่อง ?';
                }

            }

            if (strpos($textinput, 'line') !== false) {
                $case = 2;
                $img = 'https://scontent-kul1-1.xx.fbcdn.net/v/t1.0-9/15241993_562090723995116_2585631797913092951_n.jpg?oh=932cb33408d365d9e5f40840c88bc379&oe=59152885';
            }

            if (strpos($textinput, 'ซื้อ') !== false) {
                $case = 3;
            }

            if (strpos($textinput, 'ขาย') !== false) {
                $case = 3;
            }

            if (strpos($textinput, 'เทียม') !== false || strpos($textinput, 'โทน') !== false) {
                $rand = rand(1, 11);
                switch ($rand) {
                    case 1:
                        $text = 'กระเทียมดำ ช่วยป้องกันโรคที่ต้นเหตุได้อย่างไร
#การขับถ่ายยาก....เป็นสาเหตุหลักของการเกิดโรคต่างๆเพราะอะไร? เพราะ......#สารพิษตกค้าง
📣ความจริงแล้วอวัยวะภายในของเราก็มีการสะสมของเสียและสิ่งสรกปกเช่นกัน ไขมัน สารเคมี กลิ่น และของตกค้างอื่นๆที่ร่างกายขับออกเองตามธรรมชาติไม่ได้
เราจะเรียกว่า สารพิษ ของเสีย สารตกค้าง หรือ อนุมูลอิสระ อะไรก็แล้วแต่ ก็คือของเสียตกค้างในร่างกายทั้งหมด สะสมไว้ถึงระยะนึงเราก็ป่วย
นั้น.....คือที่มาของอาการป่วยเป็นโรคต่างๆ 
เช่น ความดัน เห็นได้ชัดเมื่ออายุมากขึ้น ตามของเสียสารพิษ ที่สะสมมาหลายสิบปี';
                        break;
                    case 2:
                        $text = '#ขับถ่ายยาก....เป็นสาเหตุหลักของการเกิดโรคต่างๆเพราะอะไร? เพราะ......#สารพิษตกค้าง
📣ความจริงแล้วอวัยวะภายในของเราก็มีการสะสมของเสียและสิ่งสรกปกเช่นกัน ไขมัน สารเคมี กลิ่น และของตกค้างอื่นๆที่ร่างกายขับออกเองตามธรรมชาติไม่ได้
เราจะเรียกว่า สารพิษ ของเสีย สารตกค้าง หรือ อนุมูลอิสระ อะไรก็แล้วแต่ ก็คือของเสียตกค้างในร่างกายทั้งหมด สะสมไว้ถึงระยะนึงเราก็ป่วย
นั้น.....คือที่มาของอาการป่วยเป็นโรคต่างๆ 
เช่น ความดัน เห็นได้ชัดเมื่ออายุมากขึ้น ตามของเสียสารพิษ ที่สะสมมาหลายสิบปี
🚪ยกตัวอย่าง....คูน้ำ ที่มีร้านขายอาหารเยอะๆ คูน้ำนั้นจะมีไขมันจากการทำอาหารและล้างของ และท้ายที่สุดก็คูน้ำนั้นก็ตันได้เร็วกว่าที่อื่น เพราะมีสิ่งสรกปกและไขมัน เกาะไว้เป็นก้อนและสะสมมากขึ้น
🌋ผนังหลอดเลือด ผนังลำใส้ และตับ ของเราก็เช่นกัน เอาสิ่งตกค้าง ของเสีย สารพิษ ออกด้วยวิธีธรรมชาติก่อนที่จะป่วยกันเถอะครับ #กันไว้ดีกว่าแก้
กระเทียมดำมีสารที่ช่วยในการจับสิ่งสรกปกและสารตกค้างพวกนี้ออกมาทิ้งทางอุจจาระและปัสสาวะด้วยวิธีทางธรรมชาติ100% สังเกตุได้ด้วยตัวเองจากการ...ขับถ่ายหลังทานกระเทียมดำ';
                        break;
                    case 3:
                        $text = 'สูตรทำกระเทียมด้วยหม้อหุงข้าว
#วิธีทำโดยหม้อหุงข้าวขนาด 1.8 ลิตร
📌1.ใช้กระเทียมโทน 1.5กิโลกรัม (ไม่ต้องแกะเปลือก)
📌2.ผ้าขนหนูหรือเสื้อยืดที่ไม่ใช้แล้ว
📌3.รองก้นหม้อและห่อหุ้มกระเทียมไม่ใช้สัมผัสหม้อโดยตรง
📌4.ใส่ลงไปหม้อหุงข้าวและเสียบปลั๊ก
**ไม่ต้องกดหุงนะครับ ใช่แค่อุ่น. ขอย้ำว่าไม่ต้องกดเหมือนหุงข้าว แค่เสียบไฟติดมันก็จะอุ่นแล้ว **
📌5.จากนั้นปิดฝาใช้เวลาประมาณ15-20วัน โดยที่อุ่นไว้ตลอดเลยครับ
📌6.ทุกๆ2วันให้นำกระเทียมออกมาคลุกเคล้าให้ทั่วๆกัน #ให้กระเทียมจากข้างบนลงไปด้านล่าง
ถ้ารู้สึกว่าผ้าเปียกเกินไปให้นำผ้ามาสะบัดๆให้พอหมาดๆ
📌7.ทำแบบนี้จนถึงวันที่13ก็ลองชิมได้แล้ว รสชาติไม่ได้ก็นึ่งต่อไปเรื่อยๆถึงวันที่18
กระเทียมจะรสชาติคล้ายๆกินบ้วยนุ่มๆไม่แข็งเราก็จะได้กระเทียมดำกินขับสารพิษครับ
**กระเทียมทุกเม็ดที่ออกมากินได้ทุกเม็ด ไม่มีเสียแกะเนื้อข้างในมาทานได้เลย**';
                        break;
                    case 4:
                        $text = '#สมุนไพร รักษาโรคอัลไซเมอร์
✔ 1. เกสรดอกบัวหลวง 1 หยิบมือ
✔ 2. มะตูมแห้ง 3 แว่น คั่วในกระทะ
หรือย่างก่อนจะหอมยิ่งขึ้น
✔ 3. ตะไคร้สด 3 ต้น 
✔ 4. ใบเตย 3 ใบ
✔ 5. น้ำ 1 ลิตร
นำทุกอย่างใส่หม้อต้มรวมกันจนเนื้อมะตูมแห้งบาน แล้วเก็บไว้ดื่มวันละ 1 แก้ว ใครมีญาติผู้ใหญ่เริ่มหลงๆ ลืมๆ ควรทดลองต้มให้ท่านดื่ม ได้ผล
หมายเหตุ : สูตรนี้ไม่จำเป็นต้องกินตลอดไป พอความจำดีขึ้นก็หยุดกิน หากเริ่มกลับไปหลงๆ ลืมๆ อีก ก็ทำกินใหม่ 
- เกสรดอกบัวหลวง หาซื้อได้จากร้านขายยาจีนแผนโบราณ 
- มะตูมแห้ง มีขายในตลาดสด ร้านขายของชำ หรือร้านค้าผลิตภัณฑ์สุขภาพทั่วไป';
                        break;
                    case 5:
                        $text = '🌠🌠4 โรคร้าย ทำลายสุขภาพ 🌠🌠
อย่ารอให้ป่วยแล้วหาทางรักษา #ป้องกันได้ด้วย
#ราชากระเทียมดำ แก้ที่ต้นเหตุด้วยหลักธรรมชาติ
#การขับถ่ายยาก....เป็นสาเหตุหลักของการเกิดโรคต่างๆเพราะอะไร? เพราะ......#สารพิษตกค้าง
📣ความจริงแล้วอวัยวะภายในของเราก็มีการสะสมของเสียและสิ่งสรกปกเช่นกัน ไขมัน สารเคมี กลิ่น และของตกค้างอื่นๆที่ร่างกายขับออกเองตามธรรมชาติไม่ได้
เราจะเรียกว่า สารพิษ ของเสีย สารตกค้าง หรือ อนุมูลอิสระ อะไรก็แล้วแต่ ก็คือของเสียตกค้างในร่างกายทั้งหมด สะสมไว้ถึงระยะนึงเราก็ป่วย
นั้น.....คือที่มาของอาการป่วยเป็นโรคต่างๆ 
เช่น ความดัน เห็นได้ชัดเมื่ออายุมากขึ้น ตามของเสียสารพิษ ที่สะสมมาหลายสิบปี';
                        break;
                    case 6:
                        $text = 'กระเทียมดำ 🎁
***1 ถุง ครึ่งกิโลกรัม(น้ำหนักสินค้าแห้ง) 
#รับประทานได้1เดือน มีประมาณ 145 หัว ราคารวมจัดส่งทั่วประเทศ 580 บาท 
🚚🚚รอรับสินค้าไม่เกิน 3 วัน
*** สรรพคุณ 
👉 ลดความดัน เบาหวาน โรคหลอดเลือด 
👉 ช่วยป้องกันมะเร็ง 
👉 ลดคอเลสเตอรอล 
👉 ป้องกันไม่ให้ตับถูกทำลาย
👉 ขับถ่ายสะดวก ขับสารพิษ
👉 รักษาอาการนอนไม่หลับ 
👉 บำรุงร่างกายอ่อนเพลีย
👉 ภูมิแพ้ และกรดไหลย้อน';
                        break;
                    case 7:
                        $text = '*** วิธีรับประทาน รสชาติทานง่าย
กินตอนเช้าตอนท้องว่าง (กินตอนเช้าครั้งเดียว)
รับประทานแบบขับพิษทั่วไปไม่ได้ป่วยเป็นโรค ทานวันละ 3-4 หัว 
รับประทานแบบขับพิษเพื่อลดความดัน เบาหวาน ทานวันละ6-8หัว 
📌ตามด้วยน้ำเปล่ามาก ๆ เพื่อสารในกระเทียมดำทำงานในเลือดได้ดี';
                        break;
                    case 8:
                        $text = '*** วิธีเก็บรักษา
วางไว้อุณภมูิปกติ หรือใส่ถุงซิปไว้ครับ **อย่าใช้ภาชนะโลหะ
เก็บง่ายครับไม่เสีย .เพราะแห้งในระดับนึงแล้ว ไม่ต้องแช่ตู้เย็น';
                        break;
                    case 9:
                        $text = '#สนใจติดต่อ
📲โทร : 0887630524 (คุณเบียร์)
📲LINE ID : 0887630524
💻Facebook : https://www.facebook.com/profile.php?id=100011073047557
💻FAN PAGE : https://www.facebook.com/kingblackgarlic6/';
                        break;
                    case 10:
                        $text = '#หลอดเลือด ก็เหมือน ท่อน้ำ
⛲ ไม่ล้าง ----> มันก็ตัน
🌋 เก่าๆ ----> มันก็แตก
ดูแลความสะอาดมันบ้าง ถึงแม้จะมองไม่เห็น
#แต่ไม้ใช่ไม่มี มันอยู่ในตัวเรา';
                        break;
                    case 11:
                        $text = 'เริ่มเยอะและไอสัด กูเหนื่อย';
                        break;
                    default:
                        $text = '#สนใจติดต่อ
📲โทร : 0887630524 (คุณเบียร์)
📲LINE ID : 0887630524
💻Facebook : https://www.facebook.com/profile.php?id=100011073047557
💻FAN PAGE : https://www.facebook.com/kingblackgarlic6/';
                        break;
                }
                $case = 1;
            }

            if (strpos($textinput, 'ดอ') !== false) {
                $text = 'ไอดอแลน 555';
                $case = 1;
            }

            if (strpos($textinput, 'หี') !== false) {

                $rand = rand(0,1);
                if($rand == 0){
                    $text = 'หีแม่มมึงดิ';
                    $case = 1;
                }else{
                    $text = 'พูดดีๆกับกูบ้างก็ได้....อีแตด';
                    $case = 1;
                }
            }

            if (strpos($textinput, 'แฟ้ม') !== false) {
                $text = 'พี่แคว้มยังไม่ตาย';
                $case = 1;
            }

            if (strpos($textinput, 'งง') !== false || strpos($textinput, 'อ่าว') !== false) {
                $rand = rand(0,1);
                if($rand == 0){
                    $text = 'งงไรมึง';
                }else{
                    $text = 'งงดิควาย';
                }


                $case = 1;
            }

            if (strpos($textinput, 'ปอ') !== false) {
                $rand = rand(1, 5);
                if ($rand == 1) {
                    $text = 'ยุ่งไรกับปอวะควย';
                    $case = 1;
                }elseif($rand == 2){
                    $img = 'https://scontent-kul1-1.xx.fbcdn.net/v/t1.0-9/206684_10150148245956816_629644_n.jpg?oh=54291f5e70c87396b37718586bb94802&oe=59088C65';
                    $case = 2;
                } else {
                    $text = 'ปอตายแล้ว';
                    $case = 1;
                }

            }

            if (strpos($textinput, 'ควย') !== false) {
                $rand = rand(0,2);
                if($rand == 0){
                    $text = 'ควยพ่องมึงดิ';
                }elseif($rand == 1){
                    $text = 'ควยไรสัด';
                }elseif($rand == 2){
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
                $rand = rand(0,1);
                if($rand == 0){
                    $array = [
                        "id" => "325708",
                        "type" => "sticker",
                        "packageId" => "1",
                        "stickerId" => "100"
                    ];
                    $case = 4;
                }else{
                    $text = 'ตลกเหรอสัด';
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
                                'text' => 'ติดต่อคุณโทนเลย'
                            ], [
                                'type' => 'message',
                                'label' => 'ไม่ซื้อ',
                                'text' => 'ไปไกลๆตีนเลยสัด เสียเวลาชิบหาย'
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
function getElementsByClass(&$parentNode, $tagName, $className) {
    $nodes=array();

    $childNodeList = $parentNode->getElementsByTagName($tagName);
    for ($i = 0; $i < $childNodeList->length; $i++) {
        $temp = $childNodeList->item($i);
        if (stripos($temp->getAttribute('class'), $className) !== false) {
            $nodes[]=$temp;
        }
    }

    return $nodes;
}

echo "OK";