<?php
ob_start();
define('API_KEY', '1207604796:AAE2VvDfhaKn9XtdYje3uPYqC3NbHI0WnQY');
//TOKEN 
$admin = "612920598"; 
$bot = "Svch23sbot";
//Bu kod @UzBots_Grouop jamoasi azolari uchun maxsus sovga
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$mid = $message->message_id;
$kel = $message->new_chat_member;
$id = $kel->id;
$data = $update->callback_query->data;
$chat_id2 = $update->callback_query->message->chat->id;
$mid = $update->callback_query->message->message_id;
$ati = $update->message->from->first_name;
$familya = $update->message->from->last_name;
$login = $update->message->from->username;
$user_id = $update->message->from->id;
$from_id = $update->message->from->id;
$check_token = file_get_contents("https://api.telegram.org/bot$text/getMe")->result->username;
$json = json_decode($check_token);

$bot_id = $json->result->id;
$bot_name = $json->result->first_name;
$bot_user = $json->result->username;
$bot_ture = $json->result->is_bot;

$document = $message->document;
$file = $document->file_id;
$get = bot('getfile',['file_id'=>$file]);
$siz = $get->result->file_size;

$get = file_get_contents("https://api.telegram.org/bot1207604796:AAE2VvDfhaKn9XtdYje3uPYqC3NbHI0WnQY/getUserProfilePhotos?user_id=$id&limit=1");
$json = json_decode($get);
$photo = $json->result->photos[0][0]->file_id;

if($text == "/start"){
    bot('sendMessage',[
       'chat_id'=>$chat_id,
       'parse_mode'=>'markdown',
        'text'=>"Bu bot faqat [@sevimlitv_chuqur_2_3_sezon] kanalida ishlaydi. 
        Adminga murojaat qilsangiz botni sizning ham kanalizga sozlab shunaqa bot ochib beradi. Xizmatlar pulli. Narxi 15000 sum. Albatta to‘lovlar oldindan bo‘ladi.

🛠Admin: [@Togayev_Arslonbek]
*🤖Новости:* [@TA_Coder] 🔹",
]);
}


$message_ch = $update->channel_post;
$message_ch_text = $message_ch->text;
$message_ch_photo = $message_ch->photo;


$message_ch_author = $message_ch->author_signature;
$message_ch_mid = $message_ch->message_id;
$message_ch_chid = $message_ch->chat->id;
$message_ch_user = $message_ch->chat->username;
$audio_ch = $message_ch->audio;

$texxx = $message_ch->caption;
$ex=explode("@",$texxx);
$ex=$ex[1];
$exx=explode(" ",$ex);
$ab=str_replace($exx[0],'$message_ch_user',$texxx);
$ab=str_replace('@','',$ab);
if(isset($message_ch_photo)){
$export = bot('exportChatInviteLink',[
    'chat_id'=>$message_ch_chid,
    ]);
  $a = $export->result;
    bot('editMessageCaption',[
        'chat_id'=>$message_ch_chid,
'message_id'=>$message_ch_mid,
'caption'=>"$texxx \n\n Bizning Rasmiy Sahifalarimiz👇🏻

🖥 [TELEGRAM](http://t.me/sevimlitv_chuqur_2_3_sezon) 🎬| [YOU TUBE](https://youtube.com/channel/UCd_6eeyaEhDPeB073tCAyLw) ✅",
        'message_id'=>$message_ch_mid,
        'parse_mode'=> 'Markdown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>"↗Do‘stlarga ulashish", "url"=>"https://t.me/share/url?url=https://telegram.me/$message_ch_user/$message_ch_mid"]],
            ]
        ])
        ]);
}

$message_ch_video = $message_ch->video;
if($message_ch_video){
   $export = bot('exportChatInviteLink',[
    'chat_id'=>$message_ch_chid,
    ]);
  $a = $export->result; bot('editMessageCaption',[
        'chat_id'=>$message_ch_chid,
        'caption'=>"$texxx \n
 
 Bizning Rasmiy Sahifalarimiz👇🏻

🖥 [TELEGRAM](http://t.me/sevimlitv_chuqur_2_3_sezon) | 🎬[YOU TUBE](https://youtube.com/channel/UCd_6eeyaEhDPeB073tCAyLw) ✅",
        'message_id'=>$message_ch_mid,
        'parse_mode'=> 'Markdown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            
                [['text'=>"↗Do‘stlarga ulashish", "url"=>"https://t.me/share/url?url=https://telegram.me/$message_ch_user/$message_ch_mid"]],
            ]
        ])
        ]);
}//Пригласить друзей

$message_ch_audio = $message_ch->audio;
if($message_ch_audio){
   $export = bot('exportChatInviteLink',[
    'chat_id'=>$message_ch_chid,
    ]);
  $a = $export->result; bot('editMessageCaption',[
        'chat_id'=>$message_ch_chid,
        'caption'=>"$texxx \n‌\n
      Bizning Rasmiy Sahifalarimiz👇🏻

🖥 [TELEGRAM](http://t.me/sevimlitv_chuqur_2_3_sezon) | 🎬[YOU TUBE](https://youtube.com/channel/UCd_6eeyaEhDPeB073tCAyLw) ✅ ",
        'message_id'=>$message_ch_mid,
        'parse_mode'=> 'Markdown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            
                [['text'=>"↗Do‘stlarga ulashish", "url"=>"https://t.me/share/url?url=https://telegram.me/$message_ch_user/$message_ch_mid"]],
            ]
        ])
        ]);
}
$message_ch_doc = $message_ch->document;
if($message_ch_doc){
   $export = bot('exportChatInviteLink',[
    'chat_id'=>$message_ch_chid,
    ]);
  $a = $export->result; bot('editMessageCaption',[
        'chat_id'=>$message_ch_chid,
        'caption'=>"$texxx \n\n
Bizning Rasmiy Sahifalarimiz👇🏻

🖥 [TELEGRAM](http://t.me/sevimlitv_chuqur_2_3_sezon) | 🎬[YOU TUBE](https://youtube.com/channel/UCd_6eeyaEhDPeB073tCAyLw) ✅",
        'message_id'=>$message_ch_mid,
        'parse_mode'=> 'Markdown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            
                [['text'=>"↗Do‘stlarga ulashish", "url"=>"https://t.me/share/url?url=https://telegram.me/$message_ch_user/$message_ch_mid"]],
            ]
        ])
        ]);
}
if(isset($message_ch)){
$export = bot('exportChatInviteLink',[
'chat_id'=>$message_ch_chid,
    ]);
$a = $export->result;
bot('editMessageText',[
'chat_id'=>$message_ch_chid,
'message_id'=>$message_ch_mid,
'text'=> "$message_ch_text \n\n *Bizning Rasmiy Sahifalarimiz👇🏻

🖥 [TELEGRAM](http://t.me/sevimlitv_chuqur_2_3_sezon) | 🎬[YOU TUBE](https://youtube.com/channel/UCd_6eeyaEhDPeB073tCAyLw) ✅",
'message_id'=>$message_ch_mid,
        'parse_mode'=> 'Markdown',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            
                [['text'=>"↗Do‘stlarga ulashish", "url"=>"https://t.me/share/url?url=https://telegram.me/$message_ch_user/$message_ch_mid"]],
            ]
        ])
        ]);



$baza = file_get_contents("azo.dat");  
if(mb_stripos($baza, $message_ch_chid) !== false){  
}else{  
file_put_contents("azo.dat", "$bazan$message_ch_chid");
}
}




$admin = "612920598";
$reply_menu = json_encode([
           'resize_keyboard'=>false,
            'force_reply' => true,
            'selective' => true
        ]);
    $replyik = $message->reply_to_message->text;
    $yubbi = "💌Yuboriladigon xabarni kiriting. Xabar turi markdown🔽";

if($text == "/send" and $chat_id == $admin){
      bot('sendMessage',[
      'chat_id'=>$chat_id,
      'parse_mode'=>'markdown',
      'text'=>$yubbi,
      'reply_markup'=>$reply_menu,
      ]);
    }

    if($replyik=="💌Yuboriladigon xabarni kiriting. Xabar turi markdown🔽"){ $idss=file_get_contents("azo.dat");
      $idszs=explode("\n",$idss);
      foreach($idszs as $idlat){
      $hamma=bot('sendMessage',[
      'chat_id'=>$idlat,
      'parse_mode'=>'markdown',
      'text'=>$text,
      ]);
      }
    }
if($hamma){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"👫Hammaga habar yetkazildi✅",

]);

}
//Bu kod @UzBots_Group jamoasi azolari uchun maxsus sovga

if(mb_stripos($text,"@")!==false){  
$text = str_replace("@","",$text); 
  bot('sendmessage',[  
'chat_id'=>"$chat_id",  
'text'=>"$text",  
'parse_mode'=>'markdown',  
 'disable_web_page_preview'=>true 
]);  
}

?>