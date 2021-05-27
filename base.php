<?php
$servername="localhost";
$username="root";
$password="root";
$dBname="test" //Имя базы при применении PDO здесь эту переменную можно не писать.

/*try{
    $conn=new PDO("mysql:host=$servername; dbname=test", $username, $password); // это для проверки связи
    echo "Connect successfully";
}
catch(PDOexception $e){
    echo "Connection failed: " . $e->getMessage();
    
}*/


try{
    $conn=new PDO("mysql:host=$servername; dbname=test", $username, $password);//этот блок для проеврки доьавления записи в таблицу 
    echo "Connect successfully";
    
    $sql="INSERT INTO first(task)
VALUES('Новое задание')";// именно эта запись будет добавлена в таблицу. Здесь first Это название таблицы а task имя колонки таблицы. id колонку не прописываем так как это счетчик.

$conn->exec($sql);
echo "Запись добавлена";
}
catch(PDOexception $e){
    echo $sql . $e->getMessage();
}

$conn=null;
?>
