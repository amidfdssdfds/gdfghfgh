<?php
$update = json_decode(file_get_contents('php://input'));
$message=$update->message->text;
$id=$update->message->message_id;
if($message=="/randomgame"){
    $file = fopen("var.txt","w");
    echo fwrite($file,rand(1,100));
    fclose($file);
    $rep=json_decode(file_get_contents("https://api.telegram.org/bot201105405:AAHJ7ScIBhd8CCjZTDkrTY3vYgz10z4nSMg/SendMessage?chat_id=".$update->message->chat->id."&text=".urldecode("یه عدد انتخاب کردم ، اگه گفتی چیه !؟ :D")));
}else{
    if((is_numeric($message)) && (filesize('var.txt') != 0) ){
        if($message<file_get_contents('var.txt')){
            $rep=json_decode(file_get_contents("https://api.telegram.org/bot201105405:AAHJ7ScIBhd8CCjZTDkrTY3vYgz10z4nSMg/SendMessage?chat_id=".$update->message->chat->id."&text=".urldecode("برو بالا")."&reply_to_message_id=".$id));
        }elseif($message>file_get_contents('var.txt')){
            $rep=json_decode(file_get_contents("https://api.telegram.org/bot201105405:AAHJ7ScIBhd8CCjZTDkrTY3vYgz10z4nSMg/SendMessage?chat_id=".$update->message->chat->id."&text=".urldecode("بیا پایین")."&reply_to_message_id=".$id));
        }elseif($message==file_get_contents('var.txt')){
            $rep=json_decode(file_get_contents("https://api.telegram.org/bot201105405:AAHJ7ScIBhd8CCjZTDkrTY3vYgz10z4nSMg/SendMessage?chat_id=".$update->message->chat->id."&text=".urldecode("آفرین درسته :)")."&reply_to_message_id=".$id));
            file_put_contents("var.txt", "");
        }
    }
}
?>

