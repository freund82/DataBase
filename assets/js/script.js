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

/*async function Del(){
    var send=await fetch("http://localhost:81/delete.php")
    var answer=await send.text();
    var d =[...document.querySelector("#new").children];
    d.forEach(function(child){
        child.addEventListener("click", ()=>{
            console.log(child.id);
        });
    });
}
Del();*/

f.addEventListener("submit", function(e){
    e.preventDefault();
    Task();
});




/*d.addEventListener("click", ()=>{
    alert(d);
});*/

/*//перебираем все найденные элементы и вешаем на них события
[].forEach.call( a, function(el) {
    //вешаем событие
    el.onclick = function(e) {
        //производим действия
    }
});*/