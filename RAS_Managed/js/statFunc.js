function switchColor(btn){
	var uvStat = document.getElementById('auto-uvStat');
	var rainStat = document.getElementById('auto-rainStat');

	if(btn == 'btn1'){
		uvStat.style.backgroundColor = 'rgba(0, 255, 0, 0.5)';
		uvStat.innerText = 'Running';
		uvStat.style.border = '1px solid green';
	}
	else if(btn == 'btn2'){
		uvStat.style.backgroundColor = 'rgba(255, 0, 0, 0.5)';
		uvStat.innerText = 'Stopped';
		uvStat.style.border = '1px solid red';	
	}
	else if(btn == 'btn3'){
		rainStat.style.backgroundColor = 'rgba(0, 255, 0, 0.5)';
		rainStat.innerText = 'Running';
		rainStat.style.border = '1px solid green';
	}
	else if(btn == 'btn4'){
		rainStat.style.backgroundColor = 'rgba(255, 0, 0, 0.5)';
		rainStat.innerText = 'Stopped';
		rainStat.style.border = '1px solid red';
	}
}