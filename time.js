function ShowTime(fname,lefttime,type)
{
	lefttime--;
	sec=lefttime%60;
	min=Math.floor(lefttime/60);
	day=Math.floor(lefttime/86400);
	hour=Math.floor((lefttime/3600)-(day*86400/3600));
	if (sec<10) sec="0"+sec;
	if (min>60) min-=(Math.floor(min/60)*60);
	if (min==60) min=0;
	if (type!=1 && type!=2) { if (min<10) min="0"+min; }
	if (type==1) { document.getElementById(''+fname).innerHTML=min+" мин. "+sec+" сек."; }
	else if (type==2) {document.getElementById(''+fname).innerHTML=min+":"+sec;}
	else 
	{
		if(lefttime<0)document.getElementById(''+fname).innerHTML='Дождитесь...';
		else
		{
			if (day>0) document.getElementById(''+fname).innerHTML=day+" д. "+hour+" ч. "+min+" мин. "+sec+" сек.";
			else document.getElementById(''+fname).innerHTML=hour+" ч. "+min+" мин. "+sec+" сек.";
		}
	}

	setTimeout("ShowTime('"+fname+"',"+lefttime+","+type+")",1000);

}