var add=document.querySelector("#addButton");
var n=document.querySelector("#new");
var f=document.querySelector("#form");
var i=document.querySelector("#ts");


// Для отправки используем функцию Task()
async function Task(){
    var send=await fetch("http://localhost:81/base.php",{
      method: 'POST',
      body: new FormData(f)
    });
    var answer=await send.text();
    n.innerHTML=answer;
    
}
//Чтобы при загрузке страницы подгружались дела из базы используем функцию Vygruzka()
async function Vygruzka(){
    var send=await fetch("http://localhost:81/base.php")
    var answer=await send.text();
    n.innerHTML=answer;
}
Vygruzka();

f.addEventListener("submit", function(e){
    e.preventDefault();
    Task();
});

