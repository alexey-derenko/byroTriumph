<?php
header("Content-Type: text/html; charset=utf-8");
$email = htmlspecialchars($_POST["email"]);
$name = htmlspecialchars($_POST["name"]);
$tel = htmlspecialchars($_POST["tel"]);

$refferer = getenv('HTTP_REFERER');
$date=date("d.m.y"); // число.месяц.год  
$time=date("H:i"); // часы:минуты:секунды 
$myemail = "byuro.triumf@gmail.com";

$tema = "Новый клиент";
$message_to_myemail = "Новый клиент - Работаем :)
<br><br>
Имя: $name<br>
E-mail: $email<br>
Телефон: $tel<br>
Источник (ссылка): $refferer
";

mail($myemail, $tema, $message_to_myemail, "From: byurotriumf <byuro.triumf@gmail.com> \r\n Reply-To: byurotriumfcom \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );


$tema = "Cпасибо за заявку!";
$message_to_myemail = "
Менеджер перезвонит Вам через 10 мин!<br>
<br>
Ваш менеджер -Виктория<br>
01001 Украина г.Киев ул.Хрещатик, 44<br>
Мобильный: +380443334723<br>
Viber, WhatsApp: +380443334723<br>
Почта: byuro.triumf@gmail.com<br>
http://byurotriumf.com.ua
";

$myemail = $email;
mail($myemail, $tema, $message_to_myemail, "From: byurotriumf <byuro.triumf@gmail.com> \r\n Reply-To: byurotriumf \r\n"."MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n" );


$f = fopen("leads.xls", "a+");
fwrite($f," <tr>");    
fwrite($f," <td>$email</td> <td>$name</td> <td>$tel</td>   <td>$date / $time</td>");   
fwrite($f," <td>$refferer</td>");    
fwrite($f," </tr>");  
fwrite($f,"\n ");    
fclose($f);


?>