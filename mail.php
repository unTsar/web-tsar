<?php
    header('Content-Type: text/html; charset= utf-8');
    if($_POST['submit']){
        $errors = array(); // контейнер для ошибок
        // проверяем корректность полей
        if($_POST['name'] == "")    $errors[] = "Поле 'Ваше имя' не заполнено!";
        if($_POST['email'] == "")   $errors[] = "Поле 'Ваш e-mail' не заполнено!";
 
        // если форма без ошибок
        if(empty($errors)){     
            // собираем данные из формы
            $message  = "Имя пользователя: " . $_POST['name'] . "<br/>";
            $message .= "E-mail пользователя: " . $_POST['email'] . "<br/>";
            $message .= "Текст письма: " . $_POST['message'];      
            send_mail($message); // отправим письмо
            // выведем сообщение об успехе
            echo "Ваша заявка успешно отправлена!";
        }else{
            // если были ошибки, то выводим их
            foreach($errors as $one_error){
                echo $one_error;
            }
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