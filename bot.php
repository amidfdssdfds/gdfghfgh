

<?php
$update = json_decode(file_get_contents('php://input'));
$message=$update->message->text;
$id=$update->message->message_id;
if($message=="/randomgame"){
    $file = fopen("var.txt","w");
    echo fwrite($file,rand(1,100));
    fclose($file);
    $rep=json_decode(file_get_contents("https://api.telegram.org/bot198373457:AAEk57RmNvqphkIQo9OSfe4hBi_uSbPthv4/SendMessage?chat_id=".$update->message->chat->id."&text=".urldecode("ye adad to zehname mitoni begi chane !? :D")));
}else{
    if((is_numeric($message)) && (filesize('var.txt') != 0) ){
        if($message<file_get_contents('var.txt')){
            $rep=json_decode(file_get_contents("https://api.telegram.org/bot198373457:AAEk57RmNvqphkIQo9OSfe4hBi_uSbPthv4/SendMessage?chat_id=".$update->message->chat->id."&text=".urldecode("balatar")."&reply_to_message_id=".$id));
        }elseif($message>file_get_contents('var.txt')){
            $rep=json_decode(file_get_contents("https://api.telegram.org/bot198373457:AAEk57RmNvqphkIQo9OSfe4hBi_uSbPthv4/SendMessage?chat_id=".$update->message->chat->id."&text=".urldecode("paintar")."&reply_to_message_id=".$id));
        }elseif($message==file_get_contents('var.txt')){
            $rep=json_decode(file_get_contents("https://api.telegram.org/bot198373457:AAEk57RmNvqphkIQo9OSfe4hBi_uSbPthv4/SendMessage?chat_id=".$update->message->chat->id."&text=".urldecode("afarin doroste :)")."&reply_to_message_id=".$id));
            file_put_contents("var.txt", "");
        }
    }
}
?>
