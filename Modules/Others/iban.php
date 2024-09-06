<?php

/*

///==[IBAN Checker Commands]==///

*/


include __DIR__."/../config/variables.php";
include __DIR__."/config/users.php";
include_once __DIR__."/../functions/bot.php";
include_once __DIR__."/../functions/functions.php";

if (empty($username)) {
            $username = "None";
            }
            
////////////====[IBAN]====////////////
if(strpos($message, "/iban ") === 0){   
    addUser($userId);
        $messageidtoedit1 = bot('sendmessage',[
          'chat_id'=>$chat_id,
          'text'=>"<b>Wait for Result...</b>",
          'parse_mode'=>'html',
          'reply_to_message_id'=> $message_id,

        ]);

        $messageidtoedit = capture(json_encode($messageidtoedit1), '"message_id":', ',');
        $ibanx = substr($message, 6);
        $iban = preg_replace("/\s+/", "", $ibanx);
        
        if(preg_match_all("/^([A-Z]{2}[ '+'\\'+'-]?[0-9]{2})(?=(?:[ '+'\\'+'-]?[A-Z0-9]){9,30}$)((?:[ '+'\\'+'-]?[A-Z0-9]{3,5}){2,7})([ '+'\\'+'-]?[A-Z0-9]{1,3})?$/", $iban, $matches)) {
            $iban = $matches[0][0];
            $startTime = microtime(true); 
        

            ###CHECKER PART###  
            $result2 = file_get_contents('https://openiban.com/validate/'.$iban.'?getBIC=true&validateBankCode=true');
            $bankcode1 = capture($result2, '"bankCode": "', '"');
            $bankname = capture($result2, '"name": "', '"');
            $zip = capture($result2, '"zip": "', '"');
            $city = capture($result2, '"city": "', '"');
            $bic = capture($result2, '"bic": "', '"');
            
/////////////////////==========[Unavailable if empty]==========////////////////
            
            
            if (empty($bankcode1)) {
            	$bankcode1 = "Unavailable";
            }
            if (empty($bankname)) {
            	$bankname = "Unavailable";
            }
            if (empty($zip)) {
            	$zip = "Unavailable";
            }
            if (empty($city)) {
            	$city = "Unavailable";
            }
            if (empty($bic)) {
            	$bic = "Unavailable";
            }
            
            $timetakeen = (microtime(true) - $startTime);
            $timetaken = substr_replace($timetakeen, '',4);

            ###END OF CHECKER PART###
            
            
            if(strpos($result2, 'valid": true')){
              bot('editMessageText',[
                'chat_id'=>$chat_id,
                'message_id'=>$messageidtoedit,
                'text'=>"۞𝗖𝗵𝗲𝗸𝗲𝗿 𝗜𝗕𝗔𝗡۞
𝖨𝖡𝖠𝖭 ⪼ <code>$iban</code>
𝖲𝗍𝖺𝗍𝗎𝗌 ⪼ 𝗟𝗶𝘃𝗲✅
𝖱𝖾𝗌𝗎𝗅𝗍 ⪼ [𝙏𝙝𝙞𝙨 𝙞𝙨 𝙫𝙖𝙡𝙞𝙙 𝙄𝘽𝘼𝙉.]
𝖦𝖺𝗍𝖾 ⪼ Cheker IBAN
═══⋆𝗜𝗕𝗔𝗡 𝗜𝗡𝗙𝗢⋆ ═══
𝖡𝖨𝖢 ⪼ <code>$bic</code>
𝖡𝖺𝗇𝗄 𝖢𝗈𝖽𝖾 ⪼ <code>$bankcode1</code>
𝖡𝖺𝗇𝗄 ⪼ <code>$bankname</code>
𝖢𝗂𝗍𝗒 ⪼ <b>$city</b>
═══ ⋆𝗗𝗔𝗧𝗔⋆ ═══
𝘛𝘪𝘮𝘦 ⪼ <b>$timetaken</b>
𝘊𝘩𝘦𝘤𝘬𝘦𝘥 𝘉𝘺 ⪼ <b>$mention [FREE]</b>
𝘖𝘸𝘯𝘦𝘳 ⪼ @MAICOLAL",
                'parse_mode'=>'html',
                'disable_web_page_preview'=>'true'
                
            ]);}
            else{
              bot('editMessageText',[
                'chat_id'=>$chat_id,
                'message_id'=>$messageidtoedit,
                'text'=>"۞𝗖𝗵𝗲𝗸𝗲𝗿 𝗜𝗕𝗔𝗡۞
𝖨𝖡𝖠𝖭 ⪼ <code>$iban</code>
𝖲𝗍𝖺𝗍𝗎𝗌 ⪼ 𝗗𝗲𝗮𝗱❌
𝖱𝖾𝗌𝗎𝗅𝗍 ⪼ [𝙏𝙝𝙞𝙨 𝙞𝙨 𝗜𝗻𝘃𝗮𝗹𝗶𝗱 𝗜𝗕𝗔𝗡.]
𝖦𝖺𝗍𝖾 ⪼ Cheker IBAN
═══ ⋆𝗗𝗔𝗧𝗔⋆ ═══
𝘛𝘪𝘮𝘦 ⪼ <b>$timetaken</b>
𝘊𝘩𝘦𝘤𝘬𝘦𝘥 𝘉𝘺 ⪼ <b>$mention [FREE]</b>
𝘖𝘸𝘯𝘦𝘳 ⪼ @MAICOLAL",
                'parse_mode'=>'html',
                'disable_web_page_preview'=>'true'
                
            ]);}
          
        }else{
          bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoedit,
            'text'=>"𝗬𝗼𝘂 𝗵𝗮𝘃𝗲 𝘀𝗲𝗻𝘁 𝗮𝗻 𝗶𝗻𝘃𝗮𝗹𝗶𝗱 𝖨𝖡𝖠𝖭!

𝗧𝗿𝘆 𝗶𝘁 𝘄𝗶𝘁𝗵 𝗮𝗻𝗼𝘁𝗵𝗲𝗿 𝗴𝗼 𝗳𝗼𝗿 𝘆𝗼𝘂𝗿 𝗿𝗲𝘀𝘂𝗹𝘁𝘀",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            
        ]);

        }
    }


?>