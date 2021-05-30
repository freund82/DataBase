<?php //Для удаления записи из таблицы
    $servername="localhost";
    $username="root";
    $password="root";
    $f=$_POST['task'];
    $id=$_GET['id'];//используем именно GET для получения id из url адреса

    try{
        $conn=new PDO("mysql:host=$servername; dbname=test", $username, $password);
    
        
        $sql='DELETE FROM `first` WHERE `id`=?'; //? здесь как-бы будет значение, причем знаков вопросов может быть несколько (через пробел) Здесь использовал переменную $sql для наглядности в base.php это $conn
        $query=$conn->prepare($sql);
        $query->execute([$id]);// здесь также если несколько вопросов то и енсколько здесь переменных в квадратных скобках через запятую
    
        header('Location: /');// слеш означает что как-бы вернуться на главную страницу, остаться на главной странице.
    
    }
    catch(PDOexception $e){
            echo $sql . $e->getMessage();
    }
?>