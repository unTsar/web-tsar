<?php
    header('Content-Type: text/html; charset= utf-8');

    $errors;

    if($_POST['submit']){

        if(!empty($_POST['name']) AND !empty($_POST['email'])){     
            // собираем данные из формы
            $message  = "Имя пользователя: " . $_POST['name'] . "<br/>";
            $message .= "E-mail пользователя: " . $_POST['email'] . "<br/>";
            $message .= "Текст письма: " . $_POST['message'];      
            send_mail($message); // отправим письмо
            // выведем сообщение об успехе
            header('Location: /done.php');
        }else{
            header('Location: /error.php');
        }
    }
     
    // функция отправки письма
    function send_mail($message){
        // почта, на которую придет письмо
        $mail_to = "bycucaka@gmail.com"; 
        // тема письма
        $subject = "WEB-Tsar - новая заявка";
         
        // заголовок письма
        $headers= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма

        // отправляем письмо 
        mail($mail_to, $subject, $message, $headers);
    }
?>