<?php

/* https://api.telegram.org/bot1512084806:AAEYWgXBQ5X_kKa52sPDGZv14q6qptsslD0
/getUpdates,
где, XXXXXXXXXXXXXXXXXXXXXXX - токен вашего бота, полученный ранее */
 
//Переменная $name,$phone, $mail получает данные при помощи метода POST из формы
$name = $_POST['name'];
$phone = $_POST['phone'];
$comment = $_POST['comment'];
 
//в переменную $token нужно вставить токен, который нам прислал @botFather
$token = "1512084806:AAEYWgXBQ5X_kKa52sPDGZv14q6qptsslD0";
 
//нужна вставить chat_id (Как получить chad id, читайте ниже)
$chat_id = "-496416938";
 
//Далее создаем переменную, в которую помещаем PHP массив
$arr = array(
  'Имя пользователя: ' => $name,
  'Телефон: ' => $phone,
  'Комментарий' => $comment
);
 
//При помощи цикла перебираем массив и помещаем переменную $txt текст из массива $arr
foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};
 
//Осуществляется отправка данных в переменной $sendToTelegram
$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
 
//Если сообщение отправлено, напишет "Thank you", если нет - "Error"
if ($sendToTelegram) {
  echo "Thank you";
} else {
  echo "Error";
}

?>