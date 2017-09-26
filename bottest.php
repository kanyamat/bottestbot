<?php
######## DATABASE ########
$conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.com port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47 ";
$dbconn = pg_pconnect($conn_string);

##########################

$access_token = '4gfsGaqIXbNfJ88oUSmGLr69EtzUII/sUdbnhRKz/vk0+ZbLS180P1mNoyO3YkhK63HtsANA6HSxJnUz2C0OHaq0wNUK6eZP/zMUGlpc0+NP5i1gnM+a6bfRho35/ugJplJg4T+Kb6x9PbYXbstz4wdB04t89/1O/w1cDnyilFU=';
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
$curr_years = date("Y");
$curr_y = ($curr_years+ 543);
$_msg = $events['events'][0]['message']['text'];
$user = $events['events'][0]['source']['userId'];
$user_id = pg_escape_string($user);
$check_q = pg_query($dbconn,"SELECT seqcode, sender_id ,updated_at  FROM sequentsteps  WHERE sender_id = '{$user_id}'  order by updated_at desc limit 1   ");
                while ($row = pg_fetch_row($check_q)) {
                  echo $seqcode =  $row[0];
                  echo $sender = $row[2]; 
                } 
// Validate parsed JSON data
if (!is_null($events['events'])) {
 // Loop through each event
 foreach ($events['events'] as $event) {

  // Reply only when message sent is in 'text' format
  if (strpos($_msg, 'hello') !== false || strpos($_msg, 'สวัสดี') !== false || strpos($_msg, 'หวัดดี') !== false) {
      $replyToken = $event['replyToken'];
      $text = "คุณสนใจมีผู้ช่วยไหม";
    // $query = "select question from sequents order by id asc limit 4";
    // $result = pg_query($query);
    //   while ($row = pg_fetch_row($result)) {
    //    echo  $seqcode = $row[0] ;
    //    // echo $seqcode1 =   $row[1] ;
    //    // echo $seqcode2 =   $row[2] ;
    //    // echo $seqcode3 =   $row[3] ;
    //   }

    //              $messages = [
    //                     'type' => 'text',
    //                     'text' => $seqcode
    //                   ];
        $messages = [
       'type' => 'template',
        'altText' => 'this is a confirm template',
        'template' => [
            'type' => 'confirm',
            'text' => $text ,
            'actions' => [
                [
                    'type' => 'message',
                    'label' => 'สนใจ',
                    'text' => 'สนใจ'
                ],
                [
                    'type' => 'message',
                    'label' => 'ไม่สนใจ',
                    'text' => 'ไม่สนใจ'
                ]
            ]
        ]
    ];

  // $q = pg_exec($dbconn, "INSERT INTO sequentsteps(sender_id,seqcode,answer,nextseqcode,status,created_at,updated_at )VALUES('{$user_id}','0004','','0006','0',NOW(),NOW())") or die(pg_errormessage());

  }elseif ($event['message']['text'] == "สนใจ"   ) {
    //&& $seqcode == "0004"
               $result = pg_query($dbconn,"SELECT seqcode,question FROM sequents WHERE seqcode = '0006'");
                while ($row = pg_fetch_row($result)) {
                  echo $seqcode =  $row[0];
                  echo $question = $row[1];
                }   
                 //$text = 'ขอเริ่มสอบถามข้อมูลเบื้องต้นก่อนนะคะ ขอทราบพ.ศ.เกิดของคุณเพื่อคำนวณอายุ (ตัวอย่างการพิมพ์ เกิด2530)';
                 $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' =>  $question
                      ];
                // $q = pg_exec($dbconn, "INSERT INTO sequentsteps(sender_id,seqcode,answer,nextseqcode,status,created_at,updated_at )VALUES('{$user_id}','0006','','0004','0',NOW(),NOW())") or die(pg_errormessage());
   
  }elseif ($event['message']['text'] == "ไม่สนใจ" ) {
                 $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => 'ไว้โอกาสหน้าให้เราได้เป็นผู้ช่วยของคุณนะคะ:) ขอบคุณค่ะ'
                      ];          

  }elseif (is_numeric($_msg) !== false && $seqcode == "0006"  && strlen($_msg) == 4 && $_msg < $curr_y && $_msg > "2500" ) {
  
    $birth_years = $_msg;
    $curr_years = date("Y"); 
    $age = ($curr_years+ 543)- $birth_years;
    $age_mes = 'ปีนี้คุณอายุ'.$age.'ถูกต้องหรือไม่คะ' ;
    $replyToken = $event['replyToken'];
    $messages = [
        'type' => 'template',
        'altText' => 'this is a confirm template',
        'template' => [
            'type' => 'confirm',
            'text' => $age_mes ,
            'actions' => [
                [
                    'type' => 'message',
                    'label' => 'ถูกต้อง',
                    'text' => 'อายุถูกต้อง'
                ],
                [
                    'type' => 'message',
                    'label' => 'ไม่ถูกต้อง',
                    'text' => 'ไม่ถูกต้อง'
                ],
            ]
        ]
    ];     
      $q = pg_exec($dbconn, "INSERT INTO sequentsteps(sender_id,seqcode,answer,nextseqcode,status,created_at,updated_at )VALUES('{$user_id}','0008', $age ,'0009','0',NOW(),NOW())") or die(pg_errormessage());
           
       // $q = pg_exec($dbconn, "INSERT INTO user_data(user_id,user_age,user_weight,user_height,preg_week )VALUES('{$user_id}',$age,'0','0','0') ") or die(pg_errormessage());      

       
  }elseif (strpos($_msg, 'วันที่') !== false) {
  
    $birth_years =  str_replace("วันที่","", $_msg);
    $pieces = explode(" ", $birth_years);
    $date = str_replace("","",$pieces[0]);
    $month  = str_replace("","",$pieces[1]);
    $date_today = date("d"); 
    $month_today = date("m");  
        if ($date>$date_today){
            $date_pre = $date-$date_today ;
        }else{
            $date_pre = $date_today-$date;
        }
    $month_pre = ($month_today-$month)*4 ;
    $age_pre = 'คุณมีอายุครรภ์'.$month_pre.'สัปดาห์'.$date_pre.'วัน' ;
    $replyToken = $event['replyToken'];
    $messages = [
        'type' => 'template',
        'altText' => 'this is a confirm template',
        'template' => [
            'type' => 'confirm',
            'text' =>  $age_pre ,
            'actions' => [
                [
                    'type' => 'message',
                    'label' => 'ถูกต้อง',
                    'text' => 'อายุครรภ์ถูกต้อง'
                ],
                [
                    'type' => 'message',
                    'label' => 'ไม่ถูกต้อง',
                    'text' => 'ไม่ถูกต้อง'
                ],
            ]
        ]
    ];   
    
  }elseif ($event['message']['text'] == "อายุครรภ์ถูกต้อง" ) {
                 $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => 'ขออนุญาตถามน้ำหนักปกติก่อนตั้งครรภ์ของคุณค่ะ (กรุณาตอบเป็นตัวเลขในหน่วยกิโลกรัม เช่น น้ำหนัก50)'
                      ];
  }elseif ($event['message']['text'] == "น้ำหนักถูกต้อง" ) {
                 $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => 'ขออนุญาตถามส่วนสูงปัจจุบันของคุณค่ะ (กรุณาตอบเป็นตัวเลขในหน่วยเซ็นติเมตร ส่วนสูง160)'
                      ];  
  }elseif (strpos($_msg, 'น้ำหนัก') !== false)  {
                 $weight =  str_replace("น้ำหนัก","", $_msg);
                 $weight_mes = 'ก่อนตั้งครรภ์ คุณมีน้ำหนัก'.$weight.'กิโลกรัมถูกต้องหรือไม่คะ';
                 $replyToken = $event['replyToken'];
                 $messages = [
                                'type' => 'template',
                                'altText' => 'this is a confirm template',
                                'template' => [
                                    'type' => 'confirm',
                                    'text' =>  $weight_mes ,
                                    'actions' => [
                                        [
                                            'type' => 'message',
                                            'label' => 'ถูกต้อง',
                                            'text' => 'น้ำหนักถูกต้อง'
                                        ],
                                        [
                                            'type' => 'message',
                                            'label' => 'ไม่ถูกต้อง',
                                            'text' => 'ไม่ถูกต้อง'
                                        ],
                                    ]
                                 ]     
                             ];   
  }elseif ($event['message']['text'] == "ส่วนสูงถูกต้อง" ) {
                 $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => 'สรุป'
                      ];  
  }elseif (strpos($_msg, 'ส่วนสูง') !== false) {
                 $height =  str_replace("ส่วนสูง","", $_msg);
                 $height_mes = 'ปัจจุบัน คุณสูง '.$height.'ถูกต้องหรือไม่คะ';
                 $replyToken = $event['replyToken'];
                 $messages = [
                                'type' => 'template',
                                'altText' => 'this is a confirm template',
                                'template' => [
                                    'type' => 'confirm',
                                    'text' =>  $height_mes ,
                                    'actions' => [
                                        [
                                            'type' => 'message',
                                            'label' => 'ถูกต้อง',
                                            'text' => 'ส่วนสูงถูกต้อง'
                                        ],
                                        [
                                            'type' => 'message',
                                            'label' => 'ไม่ถูกต้อง',
                                            'text' => 'ไม่ถูกต้อง'
                                        ],
                                    ]
                                 ]     
                             ];   
  }elseif ($event['message']['text'] == "ทดสอบ" ) {
    $query = 'select weight from history ';
    $result = pg_query($query);
    while ($row = pg_fetch_row($result)) {
     $e =  "น้ำหนัก $row[0] ";
    }
   
                 $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => $e 
                      ];
   }elseif ($replyToken == $event['replyToken'] ) {
                 //$replyToken = $event['replyToken'];
                $text = "ฉันไม่เข้าใจค่ะ";
                 $messages = [
                        'type' => 'text',
                        'text' => $text
                      ];   

    }else if (strpos($_msg, 'หา') !== false) {
      $replyToken = $event['replyToken'];
      $x_tra = str_replace("หา","", $_msg);
       $url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyAzNh-0u0rojtkaQvmBlCg44f7oGIvFWdw&q='.$x_tra;
      $json= file_get_contents($url);
      $events = json_decode($json, true);
      $title= $events['items'][0]['title'];
      $link = $events['items'][0]['link'];
      $link2 = $events['items'][1]['link'];

//       $messages = [
//           'type' => 'uri',
//           'uri'=> $url
//         ];

  

     $messages = [
          'type' => 'template',
          'altText' => 'template',
          'template' => [
              'type' => 'buttons',
              'title' =>  $x_tra,
              'text' =>   $title,
              'actions' => [
                  [
                      'type' => 'postback',
                      'label' => 'good',
                      'data' => 'value'
                  ],
                  [
                      'type' => 'uri',
                      'label' => 'ไปยังลิงค์',
                      'uri' => $link
                  ],
      [
                      'type' => 'uri',
                      'label' => 'ไปยังลิงค์2',
                      'uri' => $link2
                  ]
              ]
          ]
      ];


   }elseif ($event['type'] == 'message' && $event['message']['type'] == 'text'){
    
     $replyToken = $event['replyToken'];
     // Build message to reply back
      $text = "ฉันไม่เข้าใจค่ะ";
      $messages = [
          'type' => 'text',
          'text' => $text
        ];

  }else {

   $replyToken = $event['replyToken'];
      $text = "คุณสนใจมีผู้ช่วยไหม";
          $messages = [
                 'type' => 'template',
                  'altText' => 'this is a confirm template',
                  'template' => [
                      'type' => 'confirm',
                      'text' => $text ,
                      'actions' => [
                          [
                              'type' => 'message',
                              'label' => 'สนใจ',
                              'text' => 'สนใจ'
                          ],
                          [
                              'type' => 'message',
                              'label' => 'ไม่สนใจ',
                              'text' => 'ไม่สนใจ'
                          ],
                      ]
                  ]
              ]; 
    // $q = pg_exec($dbconn, "INSERT INTO sequentsteps(sender_id,seqcode,answer,nextseqcode,status,created_at,updated_at )VALUES('{$user_id}','0004','','0006','0',NOW(),NOW())") or die(pg_errormessage());
    // }else{
    //   $replyToken = $event['replyToken'];
    //   $text = "ฉันไม่เข้าใจค่ะ";
    //   $messages = [
    //       'type' => 'text',
    //       'text' => $text
    //     ];






  }


}
}
 
  // Make a POST Request to Messaging API to reply to sender
         $url = 'https://api.line.me/v2/bot/message/reply';
         $data = [
          'replyToken' => $replyToken,
          'messages' => [$messages],
         ];
         error_log(json_encode($data));
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
 
echo "OK"; 
?>
