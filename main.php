<?php

// Переменные с формы
$telephone = $_POST['telephone'];
$FulName = $_POST['FulName'];
$Time = $_POST['Time'];

// Параметры для подключения
$db_host = "localhost"; 
$db_user = "telegim6_1"; // Логин БД
$db_password = "*BNTCsq5"; // Пароль БД
$db_base = 'telegim6_1'; // Имя БД
$db_table = "UsersReg"; // Имя Таблицы БД










try {
    // Подключение к базе данных
    $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
    // Устанавливаем корректную кодировку




// Собираем данные для запроса
$data = array( 'telephone' => $telephone, 'FulName' => $FulName ); 
// Подготавливаем SQL-запрос
$query = $db->prepare("INSERT INTO $db_table (telephone, FulName) values (:telephone, :FulName)");
// Выполняем запрос с данными
$query->execute($data);





} catch (PDOException $e) {
    // Если есть ошибка соединения, выводим её
    print "Ошибка!: " . $e->getMessage() . "<br/>";
}

if ($result) {
    echo "Информация занесена в базу данных";
    }









    // сюда нужно вписать токен вашего бота
define('TELEGRAM_TOKEN', '6295737113:AAHfz4hEoyRv2zy3roV0gCdVkZ3RJL5BKNw');

// сюда нужно вписать ваш внутренний айдишник
define('TELEGRAM_CHATID', '1200351948');


message_to_telegram($telephone.' - '.$FulName);


function message_to_telegram($text)
{
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => TELEGRAM_CHATID,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
}







    header("Location: index.html");
?>

