var add=document.querySelector("#addButton");
var n=document.querySelector("#new");
var f=document.querySelector("#form");
var i=document.querySelector("#ts");


// Для отправки используем функцию Task()
async function Task(){
    var send=await fetch("http://localhost:81/base.php",{
      method: 'POST',//когда отправляем данные с формы используем эти параметры method и body
      body: new FormData(f)
    });
    var answer=await send.text();
    n.innerHTML=answer;
    
}
//Чтобы при загрузке страницы подгружались дела из базы используем функцию Vygruzka()
async function Vygruzka(){
    var send=await fetch("http://localhost:81/base.php");
    var answer=await send.text();
    n.innerHTML=answer;
}
Vygruzka();


async function Del(){//Для удаления записей
   await Vygruzka();
    var listId =[...document.querySelector("#new").children];
    
    listId.forEach(function(child){
        child.addEventListener("click", ()=>{
            if(confirm("Удалить?")){
                /*window.location.reload();*/
                var request=`http://localhost:81/delete.php?id=${child.id}`;
                fetch(request);
                window.location.reload();
            }
           
        });
      
    });
}
Del();



f.addEventListener("submit", function(e){//Здесь кнопка для добавления задания. По нажатию кнопки стартует функция Task
    e.preventDefault();
    Task();
    window.location.reload();
});

