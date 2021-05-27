<?php
/*$servername="localhost";
$username="root";
$password="root";
$dBname="test" //Имя базы при применении PDO здесь эту переменную можно не писать.

//Начало. Просто проверяем соединение.
try{
    $conn=new PDO("mysql:host=$servername; dbname=test", $username, $password); // это для проверки связи
    echo "Connect successfully";
}
catch(PDOexception $e){
    echo "Connection failed: " . $e->getMessage();
    
}

// Другой вариант это добавление записи поумолчанию которая в VALUES. Эти два варианта просто для проверки.
try{
    $conn=new PDO("mysql:host=$servername; dbname=test", $username, $password);//этот блок для проеврки доьавления записи в таблицу 
    
    
    $sql="INSERT INTO first(task)
VALUES('Новое задание')";// именно эта запись будет добавлена в таблицу. Здесь first Это название таблицы а task имя колонки таблицы. id колонку не прописываем так как это счетчик.

$conn->exec($sql);
echo "Запись добавлена";
}
catch(PDOexception $e){
    echo $sql . $e->getMessage();
}

$conn=null;*/
?>



<?php //Вариант с отправкой данных с формы в таблицу 
$servername="localhost";
$username="root";
$password="root";
$f=$_POST['task'];

//В mysql создал базу данных test, таблица first и столбцы id и task

try{
  
    $conn=new PDO("mysql:host=$servername; dbname=test", $username, $password);
    
    $conn->exec("set names utf8"); //устанавливаем кодировку.
    $data=array('task'=>$f);
        $query=$conn->prepare("INSERT INTO first(task) values(:task)");//Здесь так понимаю :task это имя поля формы которая в переменной в начале кода.
        $query->execute($data);
        $result=true;
        echo "Запись добавлена";
        

    //Вывод из базы
    $query=$conn->query('SELECT*FROM `first` ORDER BY `id` DESC');
    while($row=$query->fetch(PDO::FETCH_OBJ)){
       echo '<li><b>'.$row->task.'<b><button>Удалить</button></li>';
    }
}
catch(PDOexception $e){
    echo $sql . $e->getMessage();
}
//header('Location: index.html');//После отправки данных с формы остаться на текущей странице.
?>
