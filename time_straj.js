function ShowTime(fname, lefttime)
{
	lefttime--;
	sec=lefttime%60;
	min=Math.floor(lefttime/60);
	day=Math.floor(lefttime/86400);
	hour=Math.floor((lefttime/3600)-(day*86400/3600));
	if (sec<10) sec="0"+sec;
	if (min>60) min-=(Math.floor(min/60)*60);
	if (min==60) min=0;
	if(lefttime<0)document.getElementById(''+fname).innerHTML='Взять подарок';
	else
	{
		if (hour>0)	document.getElementById(''+fname).innerHTML=hour+" ч. "+min+" мин. "+sec+" сек.";
		else document.getElementById(''+fname).innerHTML=min+" мин. "+sec+" сек.";
	}

	setTimeout("ShowTime('"+fname+"',"+lefttime+")",1000);
}