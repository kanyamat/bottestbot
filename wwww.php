if (is_numeric( $date) !== false && strlen($date) == 2 && strlen($month) == 2  ){
      // if(($month <= $month_today) || ($month == $month_today && $date<$date_today ) ){
       if($date<31 && $date >=0 && $month <12 && $month>=0){
           if($date>$date_today){
               $d_pre = $date - $date_today;
                if($d_pre>=7){
                   $m_pre = ($month_today - $month)*4;
                   $w_pre =  $d_pre/7;
                   $w_pre = number_format($w_pre);
                  /////คำตอบ/////
                   $re_date_pre =  $d_pre%7;
                   $re_date_pre = number_format($re_date_pre);
                   $re_week_pre = $m_pre+$w_pre;

                }else{
                   $re_date_pre = $date - $date_today;
                   $re_week_pre = ($month_today - $month)*4; 
                }

           }else{
               $d_pre = $date_today - $date;
                if($d_pre>=7){
                   $m_pre = ($month_today - $month)*4;
                   $w_pre =  $d_pre/7;
                   $w_pre = number_format($w_pre);
                  /////คำตอบ/////
                   $re_date_pre =  $d_pre%7;
                   $re_date_pre = number_format($re_date_pre);
                   $re_week_pre = $m_pre+$w_pre;

                }else{
                   $re_date_pre = $date_today- $date;
                   $re_week_pre = ($month_today - $month)*4; 
                }

           }
        
        }else{
          $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => 'กรุณาพิมพ์ใหม่'
                      ]; 

        } 
    }else{
              $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => 'กรุณาพิมพ์ใหม่ตามนี้ 17 02(วันที่ เดือน)'
                      ];  
        }