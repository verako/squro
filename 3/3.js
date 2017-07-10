
//разворачивание и сворачивание дерева	
var list=document.getElementsByClassName("list");//получаем массив li
	for (var i = 0; i < list.length; i++) {		//присваиваем клик каждому элем массива
		list[i].onclick=function(){
			if (this.getElementsByTagName("ul")[0].style.display !="block") 
			{
			this.getElementsByTagName("ul")[0].style.display ="block";//обращаемся к первому элем массива
			this.style.listStyleImage="url(minus.gif)"
			}
			else
			{
			this.getElementsByTagName("ul")[0].style.display ="none";//обращаемся к первому элем массива
			this.style.listStyleImage="url(plus.gif)"}
			}
		}
 	
// удаление
var close=document.querySelectorAll(".list a");
for (var i = 0; i < close.length; i++) {
	close[i].onclick=function(){
		this.parentNode.style.display='none';
		return false;      //отменяет стандартное действие элемента
	}
};

