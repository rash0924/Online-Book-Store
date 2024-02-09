function search()
{
	let filter = document.getElementById('find').value.toUpperCase();
	
	let items = document.getElementsByClassName('bitems');
	
	let l = document.getElementsByTagName('h3');
	
	for( var i = 0; i < l.length; i++)
	{
		let a = items[i].getElementsByTagName('h3')[0];
		
		let value = a.innerHTML || a.innerText || a.textContent;
		
		if(value.toUpperCase().indexOf(filter)>-1)
		{
			items[i].style.display = "";
		}
		else
		{
			items[i].style.display = "none";
		}
	}
}