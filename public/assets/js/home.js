// var nam = document.getElementById("topic");
// nam.innerText = "PABODYA BOOK SHOP";
// nam.style.color = "red";
// nam.style.fontFamily="Arial, sans-serif";

var it = document.getElementsByClassName("items");
for(var i=0; i<it.length; i++)
{
    it[i].style.color = "blue";
}
// var all = document.querySelectorAll(".items"); 
it[3].innerHTML = it[3].innerHTML + "<div>5. Files</div>";

var btn1 = document.getElementById("btn");
// btn1.addEventListener("click",func1);

function func1(event)
{
    alert(event);
}

document.addEventListener("keyup",getkey);

function getkey(event)
{
    console.log(event.key);
}