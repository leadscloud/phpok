function tab (mod,cursor,n,num,c1,c2){
	for(i=1;i<=n;i++){
		var nav=document.getElementById(mod+i);
		var cont=document.getElementById(mod+"_"+"cont"+i);
		nav.className=(i==cursor)?c1:c2;
		cont.style.display=(i==cursor)?"block":"none";
	}
}