﻿<?php 

error_reporting(0);

set_time_limit(0);

flush();
$API_KEY = 'Token';
// Admin @OrinboyevUz
define('API_KEY',$API_KEY);
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
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
function Forward($KojaShe, $AzKoja, $KodomMSG)
{
    bot('ForwardMessage', [
        'chat_id' => $KojaShe,
        'from_chat_id' => $AzKoja,
        'message_id' => $KodomMSG
    ]);
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $update->message->id;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$mybot = "GControlbot";

$chatid = $update->callback_query->message->chat->id;
$fromid = $update->callback_query->from->id;
$username = $update->message->from->username;
$bcpv = file_get_contents("bcpv.txt");
$bcgap = file_get_contents("bcgap.txt");
@mkdir("data/$chat_id");
$azidil = file_get_contents("data/$chat_id/safargul.txt");
@$list = file_get_contents("users.txt");
$channelid = file_get_contents("data/$chat_id/channelid.txt");
$name = $update->message->from->first_name;
$gpname = $update->message->chat->title;
$rt = $update->message->reply_to_message;
$replyid = $update->message->reply_to_message->message_id;
$rtid = $update->message->reply_to_message->from->id;
$data = $update->callback_query->data;
$photo = $update->message->photo;

$forward = $update->message->forward_from;
$video = $update->message->video;
$location = $update->message->location;
$sticker = $update->message->sticker;
$document = $update->message->document;
$contact = $update->message->contact;
$game = $update->message->game;
$music = $update->message->audio;
$gif = $update->message->gif;
$voice = $update->message->voice;
$message_id2 = $update->callback_query->message->message_id;
$messageid = $update->callback_query->message->message_id;
$forchaneel = json_decode(file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=@$channelid&user_id=".$from_id)); 
$tch = $forchaneel->result->status;
$type = $update->message->chat->type;
$get = file_get_contents("https://api.telegram.org/bot$API_KEY/getChatMember?chat_id=$chat_id&user_id=".$from_id);
$info = json_decode($get, true);
$rank = $info['result']['status'];
$reply = $update->message->reply_to_message->message_id;
 $ADMIN = 651230022; //Yordamchi Admin
 $ADMINS = 651230022; //Asosiy Admin

if ($text == "/start") {
sendaction($chat_id, typing);
        $user = file_get_contents('users.txt');
        $members = explode("\n", $user);
        if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('users.txt');
            $add_user .= $from_id . "\n";
            file_put_contents("data/$chat_id/safargul.txt");
            file_put_contents('users.txt', $add_user);
        }
            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"👋🏻Salom <a href='tg://user?id=$from_id'>$name</a>
@$mybot ga xush kelibsiz! Bu bot 
Guruhingizdagi a'zolarni kanalingizga a'zo bo'lmagunicha  guruhga yozdirmaydi😉

 /qollanma - Qo'llanma
/loyihalar - Loyihalarimiz

<b>🔥Yangiliklar</b>
@TA_coder da ",
 'parse_mode'=>'html',
            'reply_markup' =>  json_encode([
                'inline_keyboard' => [
                    [['text' => " Guruhga qo'shish",'url'=>"https://telegram.me/$mybot?startgroup=new"],['text' => "🔥Yangiliklar",'url'=>"https://telegram.me/TA_Coder"]],
                    
                    [['text' => "📈Bot Azolari📉", 'callback_data' => "azi"],['text' => "👨💻 Admin",'url'=>"https://telegram.me/OrinboyevUz"]],
                    [['text' => "🔊Kanalimiz",'url'=>"https://telegram.me/sevimlitv_chuqur_2_3_sezon"],['text' => "🎥YouTube",'url'=>"http://www.youtube.com/channel/UCd_6eeyaEhDPeB073tCAyLw"]],
                    [['text' => "Botning rus tiladagisi",'url'=>"https://telegram.me/TA_Cleverbot"]],
                    [['text' => "😍Instabotimiz😍",'url'=>"https://telegram.me/Clever_instabot"]],
                    ]
    ]
])
        ]);
 bot('sendmessage', [
                'chat_id' =>$ADMIN,
                'text' =>"<b>Yangi odam</b>

🆔 IDI raqami:  $from_id
 🆎Nick:   <a href='tg://user?id=$from_id'>$name</a>

 🔥/panel Admin boshqaruv paneli!✅",
 'parse_mode'=>'html' ] );
}
if($rank != "creator" && $rank != "administrator"){ 
if($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
if($type == "supergroup" or $type == "group"){
bot('sendmessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2,
            'text' => "<a href='tg://user?id=$from_id'>$name</a> Siz @$channelid kanalimizga a'zo bo'lsangizgina bu guruhda xabar yoza olasiz!",
				'parse_mode'=>'html',
            'reply_markup' =>  json_encode([
                'inline_keyboard' => [
                    [
                    ['text' => "➕A'zo bo'lish",'url'=>"https://telegram.me/$channelid"]
                        ]
    ]
])
        ]);
    }}
if($text || $photo || $video || $location || $sticker || $document || $contact || $music || $gif || $voice){
if($tch != 'member'){
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message->message_id
  ]);
}
}
}
if($text == "/qollanma" && $from_id == $chat_id) {
sendaction($chat_id, typing);
            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"<b> Botni ishlatish bo'yicha qo'llanma! </b>
1 - Botni guruhingizga qo'shasiz va Super Admin qilasiz!

2 - Bot ulamoqchi bo'lgan kanalga ham Admin qilasiz! Sababi: Bot kanalga a'zo bo'lgan yoki bo'lmaganligi tekshirish uchun!

3 - Guruhga /kanal so'zini yuborasiz! Bu buyruq faqat guruh Adminlarida ishlaydi!

4 - Keyin ulamoqchi bo'lgan kanalingizni <b>Username</b> sini yuborasiz! <b>@ Qo'ymasdan

✅Tayyor Guruh muvaffaqqiyatli Kanalga ulanadi!

🔥Yangiliklar:</b> @TA_coder",
                 'parse_mode'=>'html']);
}
if($text == "/loyihalar" && $from_id == $chat_id) {
sendaction($chat_id, typing);
            bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"*Loyihalarimiz*
[@Clever_instabot] - instagramdan video skachat qiladigan bot            

[@TA_Cleverbot] - botning rustilidagisi
            
[@sevimlitv_chuqur_2_3_sezon] - chuqur serialining rasmiy kanali

[@moneychannel_N1] - telegrammda pul ishlash uchun eng ishonchli kanal

[@TA_coder] - kanalni boshqarishda yordam beradigan ruscha botlar kanali 

[@foydal1botlar] - sizga kerak bo‘ladigan foydali botlar kanali

*🔥Yangiliklar:* @TA_coder",
                 'parse_mode'=>'makdown']);
}
if($text == "/kanal"){
    if($rank == "creator" or $rank== "administrator"){
sendaction($chat_id, typing);
 file_put_contents("data/$chat_id/safargul.txt","sett");
$channelid = file_get_contents("data/$chat_id/channelid.txt");
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"
<b> Shu guruhga qaysi kanalni ulamoqchisiz?
Meni o'sh kanalga Admin qiling va kanalingiz @username sini yuboring @ qo'ymasdan
Namuna </b> @TA_coder kanalini TA_coder <b> deb yuborasiz!</b>

🔥Yangiliklar @UzStarsGroup",
 'parse_mode'=>'html']);
} }
if($azidil == "sett"){
    if($rank == "creator" or $rank== "administrator"){
 file_put_contents("data/$chat_id/safargul.txt","none");
 file_put_contents("data/$chat_id/channelid.txt",$text);
     bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"@$text <b> Kanaliga a'zo bo'lmaganlar ushbu guruhga yoza olishmaydi😉</b>

🔥Yangiliklar: @TA_coder ",
 'parse_mode'=>'html']);
    }}
if($text == "/fire" && $from_id == $ADMIN){
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' =>$chat_id,
                'text' =>"
+  🥀Papka yaratish🥀 +
     : @OrinboyevUz   🔰

✔️kanalga Qoshiling  ✔️
🆔: @TA_coder ",
 'parse_mode'=>'html',
            'reply_markup' =>  json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Qoshichi Kanalimiz",'url'=>"https://telegram.me/XandaUz"]
                    ],
                    [['text' => "😈Kanalimiz",'url'=>"https://telegram.me/XandaUz"]
                    ]
    ]
])
        ]);
}
if ($text == "/panel" && $chat_id == $ADMINS) {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $ADMINS,
            'text' => "Boshqaruv paneliga xush kelibsiz!",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
[
                        ['text' => "📈Bot Azolari📉", 'callback_data' => "azi"]
                    ],
                    [
                        ['text' => "Xabar Yullash🙂", 'callback_data' => "send"], ['text' => "Reklama🤓", 'callback_data' => "fwd"]
                    ]
                ]
            ])
        ]);
    }     
    elseif ($data == "azisaf" && $from_id == $admins){
        file_put_contents("data/$chat_id/safargul.txt", "no");
        sendAction($chat_id, 'typing');
        bot('editmessagetext', [
            'chat_id' => $ADMINS,
            'message_id' => $message_id2,
            'text' => "Bosh Saxifaga xush kelipsiz",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "📈Bot Azolari📉", 'callback_data' => "azi"]
                    ],
                    [
                        ['text' => "Xabar Yullash🙂", 'callback_data' => "send"], ['text' => "Reklama🤓", 'callback_data' => "fwd"]
                    ]
                ]
            ])
        ]);
    } 
 elseif ($data == "azi") {
        $user = file_get_contents("users.txt");
        $member_id = explode("\n", $user);
        $odam_soni = count($member_id) + 100;
        $gruppa = file_get_contents("gruppa.db");
        $gr = substr_count($gruppa,"\n") + 100;
        $jami = $odam_soni + $gr;
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "📃  Statistika: \n\n👤 Bot foydalanuvchilari: $odam_soni \n👥 Guruhlar: $gr \n📣 Jami:  $jami \n\n$bugun $soat 
",
            'show_alert' => true
        ]);
    }
	elseif ($data == "send") {
        file_put_contents("data/$chatid/safargul.txt", "send");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "📨Endi Xabaringizni Yozing🖊️",
        ]);
    } elseif ($azidil == "send") {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        $fp = fopen("users.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
              bot('sendMessage', [
            'chat_id' => $ckar, 
			 'text' => $text,
				'parse_mode'=>'MarkDown'   ]);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "*BOT AZOLARIGA YUBORILDI*",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh Menu", 'callback_data' => "azisaf"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "fwd") {
        file_put_contents("data/$chatid/safargul.txt", "fwd");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Noxost tegma menga😤",
        ]);
    } elseif ($azidil == 'fwd') {
        file_put_contents("data/$chat_id/safargul.txt", "no");
        $forp = fopen("users.txt", 'r');
        while (!feof($forp)) {
            $fakar = fgets($forp);
			bot('ForwardMessage', [
			  'chat_id' =>$fakar, 
				'from_chat_id' => $chat_id,
				'message_id' => $message_id2 ]);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "🤣🤣Kechirasiz Bu menyu ishlamardi \n\n Shuning uchun bosh Menyuga Qayta qoling \nBu bolinma ishga tushmagan hali😂",
            'reply_markup' => json_encode([
                'inline_keyboard' => [

                    [
                        ['text' => "Bosh Menu", 'callback_data' => "azisaf"]
                    ],
                ]
            ])
        ]);
    }

$message = $update->message;
$admin = "612920598";
$mid = $message->message_id;
$uid= $message->from->id;
$cid = $message->chat->id;
$gruppa = file_get_contents("gruppa.db");
$lichka = file_get_contents("lichka.db");
$xabar = file_get_contents("xabarlar.txt");
$gxabar = file_get_contents("gxabarlar.txt");
if($type=="supergroup"){
mkdir("data");
mkdir("data/$cid");
if(strpos($gruppa,"$cid") !==false){
}else{
file_put_contents("gruppa.db","$gruppa\n$cid");
}
}
if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("lichka.db","$lichka\n$cid");
}
} 
$reply = $message->reply_to_message->text;
$rpl = json_encode([
            'resize_keyboard'=>false,
            'force_reply'=>true,
            'selective'=>true
        ]);
if($text=="/send" and $cid==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Введите текст сообщения, которое будет отправлено!",'parse_mode'=>"html",'reply_markup'=>$rpl
]);
}
if($reply=="Введите текст сообщения, которое будет отправлено!"){
  file_put_contents("xabarlar.txt","$text");
  $xabar = file_get_contents("xabarlar.txt");
  $lich = file_get_contents("lichka.db");
  $lichka = explode("\n",$lich);
foreach($lichka as $uid){
  bot("sendmessage",[
    'chat_id'=>$uid,
    'text'=>$xabar,
]);
   unlink("xabarlar.txt");
}
}

if($text=="/sendgroup" and $cid==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>"Введите текст сообщения, который будет отправлен в группы!",'parse_mode'=>"html",'reply_markup'=>$rpl
  ]);
}
if($reply=="Введите текст сообщения, который будет отправлен в группы!"){
  file_put_contents("gxabarlar.txt","$text");
  $gxabar = file_get_contents("gxabarlar.txt");
  $gr = file_get_contents("gruppa.db");
  $grup = explode("\n",$gr);
foreach($grup as $cid){
  bot("sendmessage",[
    'chat_id'=>$cid,
    'text'=>$gxabar,
    'reply_markup'=>json_encode([
                   'inline_keyboard'=>[
              [['text'=>'Reklama berish','url'=>'http://t.me/Togayev_Arslonbek'],['text'=>'Instabot','url'=>'http://t.me/Clever_instabot']]
       
],
               ])
               ]);

   unlink("gxabarlar.txt");
}
}

?>