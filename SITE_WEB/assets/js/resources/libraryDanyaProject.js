/**   ESPACE RESERVE AUX VARIABLES GLOBALES  **/
/**/    var _TabSaving = null;              /**/
/**/    var _DivSaving = null;              /**/
/**/    var _DivElement = null;             /**/
/**/    var _slideSaving=[];                /**/
/**/    var _postSaving=[null,null,null,0]; /**/
/**/    var _tableSaving=null;              /**/
/**/    var _panelStyle;                    /**/
/**/    var _ribbonStyle=0; 
/**/	var _numStyle=0;
/**//**//**//**//**//**//**//**//**//**//**//**/


/**************************************************************************************************/	
/**	getOp **/
function getOperation(commandParts,command,cursor){
	/***************************************************************************************************/
		/*<--
		*	
		* 	Apres la recuperation du nom de la commande on teste si c'est une instruction special qui n'a pas des parametres
		*	pour ne pas avancer dans la chaine.
		*
		*/
		function isInstruction(){
			if (operation== "affichertable" ||
				operation== "gettable"		||
				operation== "afficherslide"	||
				operation== "affichertabs1"	||
				operation== "affichertabs2") return true;
			else return false;
		}
	/***************************************************************************************************/
		function ignoreComment(){
			var tempoCurs=cursor[0];
			var stop=false;
			if (tempoCurs<command.length-1){
				if (command[tempoCurs+1]=="*"){
					tempoCurs+=2;
					while (tempoCurs<command.length && !stop) {
						if (command[tempoCurs]=='*' && command[tempoCurs+1]=="/") {
							stop=true;
							tempoCurs+=2;
						}
						else tempoCurs++;
					}
					cursor[0]=tempoCurs;
				}
			}
		}
	/***************************************************************************************************/
		var tempoStr="",counter=1,operation="";
		var instruction=false;
		command=command.split('');
		cursor[0]++;
		//<-- La boucle si dessus doit traiter les cas comme: "-affichertable","-affichertable ","-affichertable okay",
		//													  "-affichertableabser[p1|p2|..]","-taki      alo[]";-->

		while (cursor[0]<command.length && !instruction) //Tanqu'on n'a pas atteint la fin de la commande ou on a pas renconté
														// une instruction sans parametres!
		{    
			if (command[cursor[0]]=="[") break; //Si on trouve un '[' on sort de la boucle pour aller ramener les params.
			if (command[cursor[0]]=='\n' || command[cursor[0]]=='\t' || command[cursor[0]]==' ') if (isInstruction()) instruction=true; //Si on rencontre un ' ' ya une possibilité 
																				// d'avoir un instruction sans param.
			if (!instruction){ //Sinon on avance le plus normalement du monde.
				operation+=command[cursor[0]];
				cursor[0]++;
			}
		}

		if (isInstruction())instruction=true; // Si on sort avec cursor[0]>=command.length on test si on a une instruction
											// sans param

		if (!instruction){
			cursor[0]++;
			while (counter>0){
				if (command[cursor[0]]=="/") ignoreComment();
				if (command[cursor[0]]=='|'){
					if (counter==1){
						commandParts.push(tempoStr.replace(/^(\n|\t|\s)+|(\n|\t|\s)+$/g,"")); 
						tempoStr="";
					}else tempoStr+="|";
				}
				else
				{
					if (command[cursor[0]]=="[") counter++;
					else if (command[cursor[0]]=="]") counter--;
					if (counter>0) tempoStr+=command[cursor[0]];
				}
				cursor[0]++;
			}
			commandParts.push(tempoStr.replace(/^(\n|\t|\s)+|(\n|\t|\s)+$/g,"")); 
		}
		return operation.replace(/^(\n|\t|\s)+|(\n|\t|\s)+$/g,"");
	}

/**************************************************************************************************/
/** getText **/
function getText (commandeBody,cursor){
 var Text="" , i=cursor[0],j=0, bool=true, cara="",secondeText="";

    if (commandeBody!=""){
       table = commandeBody.split("");
       while (bool){
          cara=table[i];
          if (cara == "-"){ 
             j=i;
             while (j<commandeBody.length && cara!="["){
                secondeText += cara;  j++; cara=table[j];
                if (secondeText == "-afficherslide" || 
                   secondeText == "-affichertable" || 
                   secondeText == "-affichertabs1" || 
                   secondeText == "-affichertabs2"){
                      if (j==commandeBody.length||
                         table[j]=="\t"||
                         table[j]=="\n"||
                         table[j]==" ") {bool=false;  break;  
                      }    
                }else if (cara=="-"||cara=="/"){ 
                         Text += secondeText;
                         secondeText="";  
                         i=j;  break; 
                      } else if (cara=="["){ bool=false;   break; }
            
             }
             if (j>=commandeBody.length && bool==true){Text += secondeText; i=j; break;}
          }else if (cara=="/"){
              if (i<= commandeBody.length-1){
                  if (table[i+1]=="/"){
                      i++;
                      while (table[i]!="\n" &&i<commandeBody.length ){i++;}
                      i++;
                  }else if (table[i+1]=="*"){
                      i++;
                      while(table[i]!="*"||table[i+1]!="/"){i++;}
                      i+=2;
                  }else {Text += cara; i++; }
              }
          }else 
          {Text += cara; i++; }
          if(i>=commandeBody.length){ break;}
       }
    cursor[0]=i;
    return Text;
    } else {cursor[0]=1; return Text;}     
}

/**************************************************************************************************/
/**	Traitement de l'opearation -taille[] **/
function parseSize(commandParts){
	var cursor=[],parametersArray=[],nestedOp,tempoElem;

	var spanElement=document.createElement("span");
	var SIZE;
			if (commandParts[1]>7)commandParts[1]="7";
			if (commandParts[1]<1)commandParts[1]="1";
			switch (commandParts[1]){
				case "1":{ SIZE="10"; break;}
				case "2":{ SIZE="13"; break;}
				case "3":{ SIZE="16"; break;}
				case "4":{ SIZE="18"; break;}
				case "5":{ SIZE="24"; break;}
				case "6":{ SIZE="32"; break;}
				case "7":{ SIZE="48"; break;}
				default: { SIZE="16"; break;}
			}
	
	spanElement.style.fontSize=SIZE+"px";

	cursor.push(0);
	while (cursor[0]<commandParts[0].length){
		var txt=getText(commandParts[0],cursor);
		var textNode=document.createTextNode(txt);
		spanElement.appendChild(textNode);
		if (cursor[0]<commandParts[0].length){
			parametersArray=[];
			var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
			tempoElem=parseOperation(nestedOp,parametersArray);
			if (tempoElem!=null) spanElement.appendChild(tempoElem);
		}
	}

	return spanElement;
}
/**************************************************************************************************/
/**	Traitement de l'operation -num[],-getnum[]	**/
function parseNum(commandParts){
	var cursor=[],parametersArray=[],nestedOp,tempoElem;
	cursor.push(0);
	var olElement=document.createElement("ol");
	switch (_numStyle) {
		case 0:
			olElement.style.listStyleType="decimal";    break;
		case 1:
			olElement.style.listStyleType="lower-alpha";break;
		case 2:
			olElement.style.listStyleType="lower-greek";break;
		case 3:
			olElement.style.listStyleType="lower-roman";break;
		case 4:
			olElement.style.listStyleType="upper-alpha";break;
		case 5:
			olElement.style.listStyleType="upper-roman";break;
	}
		olElement.style.marginTop = "20px";
		olElement.style.marginLeft = "20px";

		for (var i = 0; i < commandParts.length; i++) {
		cursor[0]=0;
		var liElement=document.createElement("li");
		

		while (cursor[0]<commandParts[i].length){
			var txt=getText(commandParts[i],cursor);
			var textNode=document.createTextNode(txt);
			liElement.appendChild(textNode);
			if (cursor[0]<commandParts[i].length){
				parametersArray=[];
				var nestedOp=getOperation(parametersArray,commandParts[i],cursor);
				tempoElem=parseOperation(nestedOp,parametersArray);
				if (tempoElem!=null) liElement.appendChild(tempoElem);
			}
		}

		olElement.appendChild(liElement);
	}

	return olElement;
}
/**************************************************************************************************/
/** Traitement de l'opération -colonnes,-getcolonnes **/
function parseColumns(commandParts){
	var cursor=[],parametersArray=[],nestedOp,tempoElem;
	
	var n=parseInt(commandParts[0]); // n represente le nombre de colonnes!

	cursor.push(0);
	
	var tableElement=document.createElement("table");
	tableElement.className="columnTables";
	tableElement.style.width="100%";
	rowElement=document.createElement("tr");
	tableElement.appendChild(rowElement);
	for (var i = 1; i < commandParts.length; i++) {
		cursor[0]=0;
		var tdElement=document.createElement("td");
		while (cursor[0]<commandParts[i].length){
			var txt=getText(commandParts[i],cursor);
			var textNode=document.createTextNode(txt);
			tdElement.appendChild(textNode);
			tdElement.style.verticalAlign="top";
			tdElement.style.width=(100/n)+"%";
			if (cursor[0]<commandParts[i].length){
				parametersArray=[];
				var nestedOp=getOperation(parametersArray,commandParts[i],cursor);
				tempoElem=parseOperation(nestedOp,parametersArray);
				if (tempoElem!=null) tdElement.appendChild(tempoElem);
			}
		}
		rowElement.appendChild(tdElement);
	}
	return tableElement;
}
/**************************************************************************************************/
/** Traitement de l'opération -regle[] **/
function parseRule(commandParts){
    if(_panelStyle==1)
        { var lengthCommand=commandParts[0].length,nestedOp=[],
                txt,elem,elemBody,elemSpan,link,elemIcon,tabIndex=new Array(),i=0,op=new String(),tmpElem;
                
            elem=document.createElement("div");
            elem.setAttribute("id","regle");
            elem.className="box_note";
            link=document.createElement("a");
            link.href="#";link.className="note_close";
            elemSpan=document.createElement("span");
            elemSpan.className="fa fa-close dismiss";
            //link.appendChild(elemSpan);
            elem.appendChild(link);
            elemIcon=document.createElement("div");
            elemIcon.className="iconSS";
            var elemSpan;
            elemSpan=document.createElement("span");
            elemSpan.className="fa fa-thumb-tack";
            elemSpan.appendChild(document.createElement("br"));
            var elemSpan2;
            elemSpan2=document.createElement("span");
            elemSpan2.className="txt";
            elemSpan2.appendChild(document.createTextNode("Regle"));
            elemSpan.appendChild(elemSpan2);
            elemIcon.appendChild(elemSpan);
            elem.appendChild(elemIcon);
            elemBody=document.createElement("div");
            elemBody.className="note_body";
                    
            tabIndex[0]=0;//tabIndex est un tableau d'une case équivalent à un curseur
            
            while(i<=lengthCommand-1)
            
                { tabIndex[0]=i;
                 txt=new Text();
                 txt.textContent=getText(commandParts[0],tabIndex);
                 elemBody.appendChild(txt);
                 i=tabIndex[0];
                 if(i<=lengthCommand-1)
                     {
                         nestedOp=[];
                         op=getOperation(nestedOp,commandParts[0],tabIndex);
                         i=tabIndex[0];
                         tmpElem=parseOperation(op,nestedOp);
                         if(tmpElem!=null) elemBody.appendChild(tmpElem);
                         
                     }
                 
                }
            
            if(elemBody!=null) elem.appendChild(elemBody);
            return elem;}
    else{var cursor=[],parametersArray=[],nestedOp,tempoElem;
		var divElement_0=document.createElement("div");
		var divElement_1=document.createElement("div");
		var divElement_2=document.createElement("div");
		divElement_0.appendChild(divElement_1);
		divElement_0.appendChild(divElement_2);
		divElement_0.className+="widthSettings";
		divElement_1.className+="cRegle_1";
		divElement_1.innerHTML="<img src='../assets/images/regle.png' height='20px'> Regle";
		divElement_2.className+="cRegle_2";
		cursor.push(0);
		while (cursor[0]<commandParts[0].length){
			var txt=getText(commandParts[0],cursor);
			var textNode=document.createTextNode(txt);
			divElement_2.appendChild(textNode);
			if (cursor[0]<commandParts[0].length){
				parametersArray=[];
				var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
				tempoElem=parseOperation(nestedOp,parametersArray);
				if (tempoElem!=null) divElement_2.appendChild(tempoElem);
			}
		}

	return divElement_0}
		
}	
/**************************************************************************************************/
//* Traitement de l'operation -BIU[] **/
function parseBIU(op,commandParts){
	var cursor=[],parametersArray=[],nestedOp,tempoElem;
	var providedTags=op.toString().split("");
	var toReturn=null,internal=null;
	if (providedTags.indexOf("g")!=-1){
		tempoBIU=document.createElement("b");
		if(toReturn==null) toReturn=tempoBIU;
		internal=tempoBIU;
	}
	if (providedTags.indexOf("i")!=-1){
		tempoBIU=document.createElement("i");		
		if (toReturn==null) toReturn=tempoBIU;
		if(internal!=null) internal.appendChild(tempoBIU);
		internal=tempoBIU;
	}
	if (providedTags.indexOf("s")!=-1){
		tempoBIU=document.createElement("u");	
		if (toReturn==null) toReturn=tempoBIU;	
		if(internal!=null) internal.appendChild(tempoBIU);
		internal=tempoBIU;
	}
		cursor.push(0);
		while (cursor[0]<commandParts[0].length){
			var txt=getText(commandParts[0],cursor);
			var textNode=document.createTextNode(txt);
			internal.appendChild(textNode);
			if (cursor[0]<commandParts[0].length){
				parametersArray=[];
				var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
				tempoElem=parseOperation(nestedOp,parametersArray);
				if (tempoElem!=null) internal.appendChild(tempoElem);
			}
		}
	return toReturn;
}
/**************************************************************************************************/
/** Traitement de l'operation -image[],-getimage[] **/
	function parseImage(commandParts){
			var div = document.createElement("div");
			var table=document.createElement("table");
			var tr1=document.createElement("tr"),tr2=null;
			var td1=document.createElement("td"),td2=null;
			var img=document.createElement("img");
			var tempo="";
			td1.style.textAlign="center";
			img.src="../uploads/images/".concat(commandParts[0]);
			var nbParam=commandParts.length;

			if(nbParam>2){
				tempo=commandParts[2].toString();
				if(tempo!="")img.style.width=tempo+"px";
				if(nbParam>3){
					tempo=commandParts[3].toString();
					if(tempo!="")img.style.height=tempo+"px";
					if(nbParam>4){
						tempo=commandParts[4].toUpperCase();
						if(tempo!=""){
							switch(tempo){
								case "G" :
								{
									table.style.marginLeft="0px";
									table.style.marginRight="auto";
									break;
								}
								case "D" :
								{
									table.style.marginLeft="auto";
									table.style.marginRight="0px";
									break;
								}
								case "C" :
								{
									table.style.margin="auto";

									break;
								}
								default : break;										
							}
						}
					}
				}
			}
			td1.appendChild(img);
			tr1.appendChild(td1);
			table.appendChild(tr1);
			if(nbParam>1){
				tempo=commandParts[1];
				if(tempo!=""){
					tr2=document.createElement("tr");
					td2=document.createElement("td");
					td2.style.textAlign="center"; 
					var curs=[0];
					tempo=commandParts[1];
				
					while(curs<tempo.length){
						td2.appendChild(document.createTextNode(getText(tempo,curs)));
						if(curs<tempo.length){
							var commandPartsIn=[];
							var elem=parseOperation(getOperation(commandPartsIn,tempo,curs),commandPartsIn);
							if(elem!=null) td2.appendChild(elem,commandPartsIn);
						}	
					}
					tr2.appendChild(td2);
					table.appendChild(tr2);
				}
			}
			div.appendChild(table);
			div.style.padding="10px";
			return div;	
		}	
			
/**************************************************************************************************************************/
/** traitement de -entetetable[] **/	
function parseEnteteTable(commandParts){
	var cursor=[0],parametersArray=[],nestedOp,tempoElem;
	_tableSaving=document.createElement("table");
	_tableSaving.style.marginTop = '20px';
	_tableSaving.style.marginLeft = '20px';	
	_tableSaving.style.width="100%";
	_tableSaving.className="maintable";
	var trElement=document.createElement("tr");
	_tableSaving.appendChild(trElement);
	for (var i = 0; i < commandParts.length; i++) {
		cursor[0]=0;
		var thElement=document.createElement("th");
		var tempoParams=commandParts[i].split(/:(?=\d+.?\d*?$)/g);

		if (tempoParams.length > 1) thElement.style.width = tempoParams[1] + "%";
		else thElement.style.width = 100/commandParts.length + "%";
		while (cursor[0]<tempoParams[0].length){
			var txt=getText(tempoParams[0],cursor);
			var textNode=document.createTextNode(txt);
			thElement.appendChild(textNode);
			if (cursor[0]<tempoParams[0].length){
				parametersArray=[];
				var nestedOp=getOperation(parametersArray,tempoParams[0],cursor);
				tempoElem=parseOperation(nestedOp,parametersArray);
				if(tempoElem!=null) thElement.appendChild(tempoElem);
			}
		}
		trElement.appendChild(thElement);
	}
	_tableSaving.appendChild(trElement);
	return null;
}
/**************************************************************************************************************************/
/** traitement de -lignetable[]	**/
function parseLigneTable(commandParts){

	if (_tableSaving!=null){
		var cursor=[0],parametersArray=[],nestedOp,tempoElem;
		var trElement=document.createElement("tr");
		_tableSaving.appendChild(trElement);
		for (var i = 0; i < commandParts.length; i++) {
			
			cursor[0]=0;
			var tdElement=document.createElement("td");
			while (cursor[0]<commandParts[i].length){ 
				var txt=getText(commandParts[i],cursor);
				var textNode=document.createTextNode(txt);
				tdElement.appendChild(textNode);
				if (cursor[0]<commandParts[i].length){
					parametersArray=[];
					var nestedOp=getOperation(parametersArray,commandParts[i],cursor);
					tempoElem=parseOperation(nestedOp,parametersArray);
					if(tempoElem!=null) tdElement.appendChild(tempoElem);
				}
			}
			trElement.appendChild(tdElement);
		}
	}
return null;
}
/**************************************************************************************************************************/
/** traitement de -affichertable[] , -gettable[] **/
function parsePrintTable(commandParts){
	var tempo=_tableSaving;
	_tableSaving=null;

	var div=document.createElement("div");
	div.appendChild(tempo);
	div.style.padding="10px";
	return div;
}
/**************************************************************************************************************************/
/**************************************************************************************************************************/
/**Tritement de -post[] **/
function parsePost(commandParts){
	var divElement,linkElement,paragElement,imgElement;
	var cursor=[0],parametersArray=[],nestedOp,tempoElem;
	if (_postSaving[0]==null){
		_postSaving[0]=document.createElement("div");
		_postSaving[0].className="container-fluid";
		var outRow=document.createElement("div");
		outRow.className="row";
         outRow.style.marginTop = "20px";
		_postSaving[0].appendChild(outRow);
		_postSaving[1]=document.createElement("div");
		_postSaving[1].className="col-xs-6 col-xs-offset-3";
		outRow.appendChild(_postSaving[1]);
		_postSaving[2]=document.createElement("div");
		_postSaving[2].className="row postSecRow";
		_postSaving[1].appendChild(_postSaving[2]);
	}
		divElement=document.createElement("div");
		divElement.className="col-xs-2";
		linkElement=document.createElement("a");
		if (commandParts[1].length) linkElement.href=commandParts[1];
		else linkElement.href="javascript:void(0)";
		imgElement=document.createElement("img");
		imgElement.src="../uploads/images/"+commandParts[2];
		paragElement=document.createElement("p");
		linkElement.appendChild(imgElement);
		linkElement.appendChild(paragElement);
		divElement.appendChild(linkElement);
		cursor.push(0);
		while (cursor[0]<commandParts[0].length){
			var txt=getText(commandParts[0],cursor);
			var textNode=document.createTextNode(txt);
			paragElement.appendChild(textNode);
			if (cursor[0]<commandParts[0].length){
				parametersArray=[];
				var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
				tempoElem=parseOperation(nestedOp,parametersArray);
				if (tempoElem!=null) paragElement.appendChild(tempoElem);
			}
		}
		paragElement.innerHTML=paragElement.innerHTML.slice(0,10)+"...";
		_postSaving[2].appendChild(divElement);
	return null;
}
/**************************************************************************************************************************/
/**Tritement de -afficherpost[] **/
function parsePrintPost(commandParts){
	var cursor=[0],parametersArray=[],nestedOp,tempoElem;
	var outdivElement=document.createElement("div");
	var indivElement=document.createElement("div");
	outdivElement.className="row postFirstRow";
	indivElement.className="col-xs-12";
	outdivElement.appendChild(indivElement);
	cursor.push(0);
	while (cursor[0]<commandParts[0].length){
		var txt=getText(commandParts[0],cursor);
		var textNode=document.createTextNode(txt);
		indivElement.appendChild(textNode);
		if (cursor[0]<commandParts[0].length){
			parametersArray=[];
			var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
			tempoElem=parseOperation(nestedOp,parametersArray);
			if (tempoElem!=null) indivElement.appendChild(tempoElem);
		}
	}
	_postSaving[1].insertBefore(outdivElement,_postSaving[1].firstChild);
	var tempo=_postSaving[0];
	_postSaving=[null,null,null];

	
	return tempo;
}
/**************************************************************************************************************************/
//parseOp
function parseOperation(op,commandParts)
        {   var elemH;//elemHtml
            
            switch (op.toLowerCase())
                {
                    case "p" :case "getp": elemH=parseParagraph(commandParts);
                                break;
                    case "ruban" :case "getruban":elemH=parseRuban(commandParts);
                                break;
                    case "titre" :case "gettitre":elemH=parseTitle(commandParts);
                                break;
                    case "titre2" :case "gettitre2":elemH=parseTitle_2(commandParts);
                                break;
                    case "titre3" :case "gettitre3":elemH=parseTitle_3(commandParts);
                                break;
                    case "gis" :elemH=parseBIU(op,commandParts);
                                break;
                    case "gsi" :elemH=parseBIU(op,commandParts);
                                break;
                    case "isg" :elemH=parseBIU(op,commandParts);
                                break;
                    case "igs" :elemH=parseBIU(op,commandParts);
                                break;
                    case "sgi" :elemH=parseBIU(op,commandParts);
                                break;
                    case "sig" :elemH=parseBIU(op,commandParts);
                                break;
                    case "gi" :elemH=parseBIU(op,commandParts);
                                break;
                    case "gs" :elemH=parseBIU(op,commandParts);
                                break;
                    case "sg" :elemH=parseBIU(op,commandParts);
                                break;
                    case "ig" :elemH=parseBIU(op,commandParts);
                                break;
                    case "si" :elemH=parseBIU(op,commandParts);
                                break;
                    case "is" :elemH=parseBIU(op,commandParts);
                                break;
                    case "i" :elemH=parseBIU(op,commandParts);
                                break;
                    case "s" :elemH=parseBIU(op,commandParts);
                                break;
                    case "g" :elemH=parseBIU(op,commandParts);
                                break;
                    case "couleur" :elemH=parseColor(commandParts);
                                break;
                    case "taille" :elemH=parseSize(commandParts);
                                break;
                    case "puce" :case "getpuce":elemH=parsePuce(commandParts);
                                break;
                    case "num" :case "getnum":elemH=parseNum(commandParts);
                                break;
                    case "lvm" :elemH=parseLvm(commandParts);
                                break;
                    case "lvs" :elemH=parseLvs(commandParts);
                                break;
                    case "lvu" :elemH=parseLvu(commandParts);
                                break;
                    case "note" :elemH=parseNote(commandParts);
                                break;
                    case "alerte" :elemH=parseAlert(commandParts);
                                break;
                    case "observation" :elemH=parseObservation(commandParts);
                                break;
                    case "regle" :elemH=parseRule(commandParts);
                                break;
                    case "definition" :elemH=parseDef(commandParts);
                                break;
                    case "forme" :elemH=parseForm(commandParts);
                                break;
                    case "youtube" :case "getyoutube":elemH=parseYoutube(commandParts);
                                break;
                    case "iframe" :case "getiframe":elemH=parseIframe(commandParts);
                                break;
                    case "video" :case "getvideo":elemH=parseVideo(commandParts);
                                break;
                    case "telecharger" :elemH=parseDownload(commandParts);
                                break;
                    case "colonnes" :case "getcolonnes":elemH=parseColumns(commandParts);
                                break;
                    case "entetetable" :elemH=parseEnteteTable(commandParts);
                                break;
                    case "lignetable" :elemH=parseLigneTable(commandParts);
                                break;
                    case "affichertable" :case "gettable":elemH=parsePrintTable(commandParts);
                                break;
                    case "slide" :elemH=parseSlide(commandParts);
                                break;
                    case "afficherslide" :elemH=parsePrintSlide(commandParts);
                                break;
                    case "post" :elemH=parsePost(commandParts);
                                break;
                    case "afficherpost" :elemH=parsePrintPost(commandParts);
                                break;
                    case "tabs" :elemH=parseTabs(commandParts);
                                break;
                    case "affichertabs1" :elemH=parseAfficherTabs_1(commandParts);
                                break;
                    case "affichertabs2" :elemH=parseAfficherTabs_2(commandParts);
                                break;
                    case "image" :case "getimage":elemH=parseImage(commandParts);
                                break;
                    default: elemH=document.createTextNode(op+"["+commandParts.join('')+"]");
                                break;
                        
                
                }
         return elemH;
        }
/**************************************************************************************************************************/
/** traitement de -p[] , -getp[] **/
function parseParagraph(commandParts)
{
    
    
    var lengthCommand=commandParts[0].length,
        txt,elem,tabIndex=new Array(),i=0,op=new String(),tmpElem,nestedOp=[];
    elem=document.createElement("p");
    if(commandParts.length==1)//Par Défaut le paragraphe est aligné à gauche
        {
            elem.setAttribute("style","text-align:left");
        }
    else {
        switch (commandParts[1].toLowerCase())
            {
                case "c": elem.setAttribute("style","text-align:center");break;
                          
                case "d": elem.setAttribute("style","text-align:right"); break;
                         
                case "j": elem.setAttribute("style","text-align:justify"); break;
                          
                case "g": elem.setAttribute("style","text-align:left"); break;
                          
                default : elem.setAttribute("style","text-align:left"); break;
                          
            }
    }
    tabIndex[0]=0;//tabIndex est un tableau d'une case équivalent à un curseur
    txt=document.createTextNode("");
    while(i<lengthCommand)
    
        { tabIndex[0]=i;
         txt=new Text();
         txt.textContent=getText(commandParts[0],tabIndex);
         elem.appendChild(txt);
         i=tabIndex[0];
         if(i<lengthCommand)
             {
                 nestedOp=[];
                 op=getOperation(nestedOp,commandParts[0],tabIndex);
                 i=tabIndex[0];
                 tmpElem=parseOperation(op,nestedOp);
                 if(tmpElem!=null) elem.appendChild(tmpElem);
                
             }
        }
    
    return elem;
}
/**************************************************************************************************************************/        
/** traitement de -titre[]  **/
 function parseTitle(commandParts)
{
    
    var lengthCommand=commandParts[0].length,
        txt,elem,tabIndex=new Array(),i=0,op=new String(),tmpElem,nestedOp=[];
    elem=document.createElement("h2");
    tabIndex[0]=0;//tabIndex est un tableau d'une case équivalent à un curseur
    txt=document.createTextNode("");
    while(i<lengthCommand)
    
        { tabIndex[0]=i;
         txt=new Text();
         txt.textContent=getText(commandParts[0],tabIndex);
         elem.appendChild(txt);
         i=tabIndex[0];
         if(i<lengthCommand)
             {
                 nestedOp=[];
                 op=getOperation(nestedOp,commandParts[0],tabIndex);
                 i=tabIndex[0];
                 tmpElem=parseOperation(op,nestedOp);
                 if(tmpElem!=null) elem.appendChild(tmpElem);
             }
         
        }
    return elem;
}
/**************************************************************************************************************************/        
/** traitement de -titre2[]  **/        
function parseTitle_2(commandParts)
{
    var lengthCommand=commandParts[0].length,
        txt,elem,tabIndex=new Array(),i=0,op=new String(),tmpElem,nestedOp=[];
    elem=document.createElement("h3");
    tabIndex[0]=0;//tabIndex est un tableau d'une case équivalent à un curseur
    txt=document.createTextNode("");
    while(i<lengthCommand)
    
        { tabIndex[0]=i;
         txt=new Text();
         txt.textContent=getText(commandParts[0],tabIndex);
         elem.appendChild(txt);
         i=tabIndex[0];
         if(i<lengthCommand)
             {
                 nestedOp=[];
                 op=getOperation(nestedOp,commandParts[0],tabIndex);
                 i=tabIndex[0];
                 tmpElem=parseOperation(op,nestedOp);
                 if(tmpElem!=null) elem.appendChild(tmpElem);
             }
         
        }
    return elem;
}
/**************************************************************************************************************************/       
/** traitement de -titre3[]  **/        
function parseTitle_3(commandParts)
{
    var lengthCommand=commandParts[0].length,
        txt,elem,tabIndex=new Array(),i=0,op=new String(),tmpElem,nestedOp=[];
    elem=document.createElement("h4");
    tabIndex[0]=0;//tabIndex est un tableau d'une case équivalent à un curseur
    txt=document.createTextNode("");
    while(i<lengthCommand)
    
        { tabIndex[0]=i;
         txt=new Text();
         txt.textContent=getText(commandParts[0],tabIndex);
         elem.appendChild(txt);
         i=tabIndex[0];
         if(i<lengthCommand)
             {
                 nestedOp=[];
                 op=getOperation(nestedOp,commandParts[0],tabIndex);
                 i=tabIndex[0];
                 tmpElem=parseOperation(op,nestedOp);
                 if(tmpElem!=null) elem.appendChild(tmpElem);
             }
         
        }
        
    return elem;
}
/**************************************************************************************************************************/
/** traitement de -couleur[]  **/        
function parseColor(commandParts)
{   /* Important: aprés plusieurs tests efectués sur DANYA on a remarqué qu'aucune opération peut etre imbriqué dans couleur*/
 
     var   lengthCommand=commandParts[0].length,txt,i=0,elem,tabIndex=new Array(),nestedOp=[];
        
    elem=document.createElement("span");
    tabIndex[0]=0;//tabIndex est un tableau d'une case équivalent à un curseur
    if(commandParts.length==1 || commandParts[1].length==0)//la couleur n'est pas spécifié donc par défaut elle est noire
        {
            elem.setAttribute("style","color:black");
        }
    else{
        elem.setAttribute("style","color:".concat(commandParts[1]));
        }
    while(i<=lengthCommand-1)

        { tabIndex[0]=i;
         txt=new Text();
         txt.textContent=getText(commandParts[0],tabIndex);
         elem.appendChild(txt);
         i=tabIndex[0];
         if(i<=lengthCommand-1)
             {
                 nestedOp=[];
                 op=getOperation(nestedOp,commandParts[0],tabIndex);
                 i=tabIndex[0];
                 tmpElem=parseOperation(op,nestedOp);
                 if(tmpElem!=null) elem.appendChild(tmpElem);
             }
         
        }
    return elem;
}
/**************************************************************************************************************************/
/** traitement de -note[]  **/        
function parseNote(commandParts)
{           if(_panelStyle==1)
            {
                var lengthCommand=commandParts[0].length,nestedOp=[],
                txt,elem,elemBody,elemSpan,link,elemIcon,tabIndex=new Array(),i=0,op=new String(),tmpElem;
                
            elem=document.createElement("div");
            elem.setAttribute("id","note");
            elem.className="box_note";
            link=document.createElement("a");
            link.href="#";link.className="note_close";
            elemSpan=document.createElement("span");
            elemSpan.className="fa fa-close dismiss";
            //link.appendChild(elemSpan);
            elem.appendChild(link);
            elemIcon=document.createElement("div");
            elemIcon.className="iconSS";
            var elemSpan;
            elemSpan=document.createElement("span");
            elemSpan.className="fa fa-edit";
            elemSpan.appendChild(document.createElement("br"));
            var elemSpan2;
            elemSpan2=document.createElement("span");
            elemSpan2.className="txt";
            elemSpan2.appendChild(document.createTextNode("Note"));
            elemSpan.appendChild(elemSpan2);
            elemIcon.appendChild(elemSpan);
            elem.appendChild(elemIcon);
            elemBody=document.createElement("div");
            elemBody.className="note_body";
                    
            tabIndex[0]=0;//tabIndex est un tableau d'une case équivalent à un curseur
            
            while(i<=lengthCommand-1)
            
                { tabIndex[0]=i;
                 txt=new Text();
                 txt.textContent=getText(commandParts[0],tabIndex);
                 elemBody.appendChild(txt);
                 i=tabIndex[0];
                 if(i<=lengthCommand-1)
                     {
                         nestedOp=[];
                         op=getOperation(nestedOp,commandParts[0],tabIndex);
                         i=tabIndex[0];
                         tmpElem=parseOperation(op,nestedOp);
                         if(tmpElem!=null) elemBody.appendChild(tmpElem);
                         
                     }
                 
                }
            
            if(elemBody!=null) elem.appendChild(elemBody);
            return elem;
            }
            else{
                var divGlobal=document.createElement("div");
			var div1=document.createElement("div");
			var div2=document.createElement("div");

			divGlobal.className="widthSettings";
			div1.className="note1";
			div2.className="note2";
			div1.innerHTML="<img src=\"../assets/images/note.PNG\" style=\" vertical-align:middle; width:20px; height:20px;\"> Note";
			divGlobal.appendChild(div1);
			var curs=[0];
			var tempo=commandParts[0]+"";
				
			while(curs<tempo.length){
				div2.appendChild(document.createTextNode(getText(tempo,curs)));
				if(curs<tempo.length){
					var commandPartsIn=[];
					 var elem=parseOperation(getOperation(commandPartsIn,tempo,curs),commandPartsIn);
					if(elem!=null) div2.appendChild(elem,commandPartsIn);
				}	
			}
			divGlobal.appendChild(div2);
			return divGlobal;
            }
			

}

/**************************************************************************************************************************/
/** traitement de -telecharger[]  **/
function parseDownload(commandParts)
		{
			var link=document.createElement("a");
			link.href="..\\uploads\\files\\".concat(commandParts[0]);
			link.setAttribute('download','');
			
			var form=document.createElement("form");
			form.method="POST";
			form.action="downloadRedirect.php";
			form.id="linkForm";
			form.target="_blank";
			form.style.display="none";
			form.innerHTML="<input type=\"hidden\" value=\""+link.href+"\" id=\"linkInput\" name=\"linkInput\" />"

			if((commandParts.length<3)||(commandParts.length==3 && (commandParts[2]!="true" && commandParts[2]!="1")) || (commandParts.length>3 && commandParts[2]=="" && (commandParts[3]!="true" && commandParts[3]!="1")))
			{
				link.innerHTML+="<img src=\"../assets/images/download.png\" style=\" width:48px; height:48px\" >";
				
			}
			else if(commandParts.length==3 || ((commandParts.length>3)&& commandParts[2]=="") )
			{
				link.innerHTML+="<img src=\"../assets/images/download.png\" style=\" width:15px; height:15px\" >";
				
			}
			else
			{
				
				var curs=[0];
				var tempo=commandParts[2]+"";
					
				while(curs<tempo.length){
					link.appendChild(document.createTextNode(getText(tempo,curs)));
					if(curs<tempo.length){
						var commandPartsIn=[];
						 var elem=parseOperation(getOperation(commandPartsIn,tempo,curs),commandPartsIn);
						if(elem!=null) link.appendChild(elem,commandPartsIn);
					}	
				}
			}
			var div=document.createElement('div');
			div.id="divLink"
			div.appendChild(link);
			div.appendChild(form);
			$(div).on("click",function(){
				form.submit();	
			})
			return div;

		}
/**************************************************************************************************************************/
/** traitement de -lvm[]  **/
		function parseLvm(commandParts)
		{
            
			var link=document.createElement("a");

			link.href=".\\"+commandParts[1];
			var curs=[0];
			var tempo=commandParts[0]+"";
				
			while(curs<tempo.length){
				link.appendChild(document.createTextNode(getText(tempo,curs)));
				if(curs<tempo.length){
					var commandPartsIn=[];
					 var elem=parseOperation(getOperation(commandPartsIn,tempo,curs),commandPartsIn);
					if(elem!=null) link.appendChild(elem,commandPartsIn);
				}	
			}
			
			return link;
		}
/**************************************************************************************************************************/		
/** traitement de -lvs[]  **/
		function parseLvs(commandParts)
		{
			var link=document.createElement("a");

			link.href="#"+commandParts[1];
			var curs=[0];
			var tempo=commandParts[0]+"";
				
			while(curs<tempo.length){
				link.appendChild(document.createTextNode(getText(tempo,curs)));
				if(curs<tempo.length){
					var commandPartsIn=[];
					 var elem=parseOperation(getOperation(commandPartsIn,tempo,curs),commandPartsIn);
					if(elem!=null) link.appendChild(elem,commandPartsIn);
				}	
			}
			
			return link;
		}
/**************************************************************************************************************************/		
/** traitement de -lvu[]  **/
		function parseLvu(commandParts)
		{
			var link=document.createElement("a");

			link.href=""+commandParts[1];
			var curs=[0];
			var tempo=commandParts[0]+"";
				
			while(curs<tempo.length){
				link.appendChild(document.createTextNode(getText(tempo,curs)));
				if(curs<tempo.length){
					var commandPartsIn=[];
					 var elem=parseOperation(getOperation(commandPartsIn,tempo,curs),commandPartsIn);
					if(elem!=null) link.appendChild(elem,commandPartsIn);
				}	
			}
			
			return link;
		}
/**************************************************************************************************************************/		
/** traitement de -definition[]  **/
function parseDef(commandParts){
        if(_panelStyle==1)
            {
                var lengthCommand=commandParts[0].length,nestedOp=[],
                txt,elem,elemBody,elemSpan,link,elemIcon,tabIndex=new Array(),i=0,op=new String(),tmpElem;
                
            elem=document.createElement("div");
            elem.setAttribute("id","definition");
            elem.className="box_note";
            link=document.createElement("a");
            link.href="#";link.className="note_close";
            elemSpan=document.createElement("span");
            elemSpan.className="fa fa-close dismiss";
            //link.appendChild(elemSpan);
            elem.appendChild(link);
            elemIcon=document.createElement("div");
            elemIcon.className="iconSS";
            var elemSpan;
            elemSpan=document.createElement("span");
            elemSpan.className="fa fa-book";
            elemSpan.appendChild(document.createElement("br"));
            var elemSpan2;
            elemSpan2=document.createElement("span");
            elemSpan2.className="txt";
            elemSpan2.appendChild(document.createTextNode("Definition"));
            elemSpan.appendChild(elemSpan2);
            elemIcon.appendChild(elemSpan);
            elem.appendChild(elemIcon);
            elemBody=document.createElement("div");
            elemBody.className="note_body";
                    
            tabIndex[0]=0;//tabIndex est un tableau d'une case équivalent à un curseur
            
            while(i<=lengthCommand-1)
            
                { tabIndex[0]=i;
                 txt=new Text();
                 txt.textContent=getText(commandParts[0],tabIndex);
                 elemBody.appendChild(txt);
                 i=tabIndex[0];
                 if(i<=lengthCommand-1)
                     {
                         nestedOp=[];
                         op=getOperation(nestedOp,commandParts[0],tabIndex);
                         i=tabIndex[0];
                         tmpElem=parseOperation(op,nestedOp);
                         if(tmpElem!=null) elemBody.appendChild(tmpElem);
                         
                     }
                 
                }
            
            if(elemBody!=null) elem.appendChild(elemBody);
            return elem;
            }
        else{
            var divGlobal=document.createElement("div");
			var div1=document.createElement("div");
			var div2=document.createElement("div");

			divGlobal.className="widthSettings";
			div1.className="def1";
			div2.className="def2";
			div1.innerHTML="<img src=\"../assets/images/def.PNG\" style=\" vertical-align:middle; width:20px; height:20px;\"> Definition";
			divGlobal.appendChild(div1);
			var curs=[0];
			var tempo=commandParts[0]+"";
				
			while(curs<tempo.length){
				div2.appendChild(document.createTextNode(getText(tempo,curs)));
				if(curs<tempo.length){
					var commandPartsIn=[];
					 var elem=parseOperation(getOperation(commandPartsIn,tempo,curs),commandPartsIn);
					if(elem!=null) div2.appendChild(elem,commandPartsIn);
				}	
			}
			divGlobal.appendChild(div2);
			return divGlobal;
        }
			

		}

/***************************************************************************************************/
/********* -iframe[] -getiframe[]*/

function parseIframe(commandParts) {
    var cursor = [],parametersArray = [],nestedOp,tempoElement;
    cursor.push(0);
    
    var TheFrameElement = document.createElement("div");         // we put the iframe and the caption in a div 
        TheFrameElement.setAttribute("align","center");          // centered by default
    var IframeElement = document.createElement("iframe");
    IframeElement.setAttribute("src",commandParts[0]);
    
    if (commandParts[1] != null){
         /****** not done yet *****/
        var pElement = document.createElement("p");                //Creating the caption 
        pElement.setAttribute("align","center");                   
         /* OR */  /*pElement.style.textAlign = "center";
          pElement.style.margin = "auto";  */
        
        var bElement = document.createElement("b");
        var iElement = document.createElement("i");                 // bold and italic by default in DANYA 
        
        
        while (cursor[0] < commandParts[1].length){
			var Legende = getText(commandParts[1],cursor);
			var textNode = document.createTextNode(Legende);
            iElement.appendChild(textNode);
            if (cursor[0] < commandParts[1].length){
				parametersArray = [];                                                       // in case of inner operations 
				var nestedOp = getOperation(parametersArray,commandParts[1],cursor);
				tempoElem = parseOperation(nestedOp,parametersArray);
				if (tempoElem!=null) iElement.appendChild(tempoElem);
			}
		}
        
        bElement.appendChild(iElement);
        pElement.appendChild(bElement);
        
        if (commandParts[2] != null){
           IframeElement.setAttribute("width",commandParts[2]+"px");
        }
        if (commandParts[3] != null){
           IframeElement.setAttribute("height",commandParts[3]+"px");
        }
        TheFrameElement.appendChild(IframeElement);
        TheFrameElement.appendChild(pElement);
         
    }
    return TheFrameElement;
}

/**************************************************************************************************************************/
/** traitement de -video[] -getvideo[] **/
function parseVideo(commandParts){
    var cursor = [],parametersArray = [],nestedOp,tempoElement;
    cursor.push(0);
    
    var TheVideoElement = document.createElement("div");    
        TheVideoElement.setAttribute("align","center");
    
    var videoElement = document.createElement("video"); 
        videoElement.setAttribute("src","../uploads/videos/" + commandParts[0]);
        videoElement.setAttribute("controls","controls");
    
    if (commandParts.length > 0){
        if (commandParts[1] != null){
        var pElement = document.createElement("p");
        pElement.setAttribute("align","center");
         /* OR */  /*pElement.style.textAlign = "center";
          pElement.style.margin = "auto";  */
        
        var bElement = document.createElement("b");
        var iElement = document.createElement("i");
        
        
        while (cursor[0] < commandParts[1].length){
			var Legende = getText(commandParts[1],cursor);
			var textNode = document.createTextNode(Legende);
            iElement.appendChild(textNode);
            if (cursor[0] < commandParts[1].length){
				parametersArray = [];
				var nestedOp = getOperation(parametersArray,commandParts[1],cursor);
				tempoElem = parseOperation(nestedOp,parametersArray);
				if (tempoElem!=null) iElement.appendChild(tempoElem);
			}
		}
        
        bElement.appendChild(iElement);
        pElement.appendChild(bElement);
        }
        if (commandParts[2] != null){
           videoElement.setAttribute("width",commandParts[2]+"px");
        }
        if (commandParts[3] != null){
           videoElement.setAttribute("height",commandParts[3]+"px");
        }
        
        TheVideoElement.appendChild(videoElement);
        if (commandParts[1] != null){
            TheVideoElement.appendChild(pElement);
        }
    }else{
        TheVideoElement.appendChild(videoElement);
    }
    return TheVideoElement;
   
}

/**************************************************************************************************************************/
/** traitement de -puce[] -getpuce[] **/
/***          PARSE PUCES NEW     *****/
     var _TypePuces = 0;

    function handlePucesOp(){
            $('#PucesModal').modal('show');
            document.getElementById('PucesAdd').onclick = function (e) {
            // $('#PucesAdd').click(function(){
            //e.preventDefault();
             _TypePuces = $("#pucesSelectPicker option:selected").val();
             var nbItems = $("#inputPuces").val();
                 var stringPuces = "\n-puce[\n";
                 var item;
                 for(var i = 1 ; i < nbItems ; i++){
                      item = "\t/*item" + i + "*/|\n";
                      stringPuces = stringPuces + item;
                 }
              stringPuces = stringPuces + "\t/*item" + nbItems + "*/]"; 
  
              Omega.replaceRange(stringPuces, CodeMirror.Pos(Omega.lastLine()));
              $('#PucesModal').modal('hide');
            //Emptying 
                $("#inputPuces").val('');
                $('select[name=pucesSel]').val(0);
                $('#pucesSelectPicker').selectpicker('refresh');
        }  
            document.getElementById('PucesCancel').onclick = function (e) {
                $("#inputPuces").val('');
                $('select[name=pucesSel]').val(0);
                $('#pucesSelectPicker').selectpicker('refresh');
            }
            document.getElementById('PucesDismiss').onclick = function (e) {
                $("#inputPuces").val('');
                $('select[name=pucesSel]').val(0);
                $('#pucesSelectPicker').selectpicker('refresh');
            }
        }






   
    function parsePuce(commandParts){
    var cursor=[],parametersArray=[],nestedOp,tempoElement;
    cursor.push(0);
    var ulElement = document.createElement("ul");
       _TypePuces = parseInt(_TypePuces);
        if ( _TypePuces > 0){
            ulElement.className = "fa-ul";
            for (var i = 0; i < commandParts.length; i++) {
                var iconElement = document.createElement("i");
                iconElement.className = "fa-li ";
                iconElement.style.fontSize = '10px';
                var icon;
                switch (_TypePuces)
                    {   case 0 : icon = "fa fa-check";
                                break;    
                        case 1 : icon = "fa fa-check";
                                break;    
                        case 2 : icon = "fa fa-check-square-o";
                                break; 
                        case 3 : icon = "fa fa-check-square";
                                break; 
                        case 4 : icon = "fa fa-circle";
                                break; 
                        case 5 : icon = "fa fa-certificate";
                                break; 
                        case 6 : icon = "fa fa-circle-o";
                                break; 
                        case 7 : icon = "fa fa-close";
                                break; 
                        case 8 : icon = "fa fa-circle-thin";
                                break; 
                        case 9 : icon = "fa fa-minus";
                                break; 
                        case 10 : icon = "fa fa-pencile";
                                break; 
                        case 11 : icon = "fa fa-square";
                                break; 
                        case 12 : icon = "fa fa-square-o";
                                break; 
                        case 13 : icon = "fa fa-star";
                                break; 
                        case 14 : icon = "fa fa-star-o";
                                break; 
                        case 15 : icon = "fa fa-tag";
                                break; 
                        case 16 : icon = "fa fa-hand-o-right";
                                break; 
                        case 17 : icon = "fa fa-long-arrow-right";
                                break;
                        case 18 : icon = "fa fa-fa-arrow-right";
                                break;
                        default: icon = "fa fa-ok";
                                break;
                    }
                iconElement.className += icon;
		        cursor[0]=0;
		        var liElement=document.createElement("li");
                liElement.appendChild(iconElement);
                 
                while (cursor[0]<commandParts[i].length){
                    var txt = getText(commandParts[i],cursor);
			        var textNode = document.createTextNode(txt);
			        liElement.appendChild(textNode);
			        if (cursor[0]<commandParts[i].length){
				        parametersArray = [];
				        var nestedOp = getOperation(parametersArray,commandParts[i],cursor);
				        tempoElem = parseOperation(nestedOp,parametersArray);
				        if (tempoElem!=null) liElement.appendChild(tempoElem);
			         }
		        }

		        ulElement.appendChild(liElement);
	       }
            
        }else{
             ulElement.style.listStyleImage = "url('..//assets//images//puces.png')";
             for (var i = 0; i < commandParts.length; i++) {
		          cursor[0]=0;
		          var liElement=document.createElement("li");
                 
                  while (cursor[0]<commandParts[i].length){
			         var txt = getText(commandParts[i],cursor);
			         var textNode = document.createTextNode(txt);
			         liElement.appendChild(textNode);
			         if (cursor[0]<commandParts[i].length){
				        parametersArray = [];
				        var nestedOp = getOperation(parametersArray,commandParts[i],cursor);
				        tempoElem = parseOperation(nestedOp,parametersArray);
				        if (tempoElem!=null) liElement.appendChild(tempoElem);
			         }
		          }

		    ulElement.appendChild(liElement);
	       }
        }

        ulElement.style.marginTop = '20px';
        ulElement.style.marginLeft = '20px';
    return ulElement;
        //ulElement.setAttribute("liste-style-image","url('puces.png')");
       // console.log(ulElement);
	
}



/***          PARSE PUCES NEW     *****/


/**************************************************************************************************************************/
/** traitement de -observation[] **/
function parseObservation(commandParts){
   
        if(_panelStyle==1)
            {
                var lengthCommand=commandParts[0].length,nestedOp=[],
                txt,elem,elemBody,elemSpan,link,elemIcon,tabIndex=new Array(),i=0,op=new String(),tmpElem;
                
            elem=document.createElement("div");
            elem.setAttribute("id","observation");
            elem.className="box_note";
            link=document.createElement("a");
            link.href="#";link.className="note_close";
            elemSpan=document.createElement("span");
            elemSpan.className="fa fa-close dismiss";
            ////link.appendChild(elemSpan);
            elem.appendChild(link);
            elemIcon=document.createElement("div");
           elemIcon.className="iconSS";
            var elemSpan;
            elemSpan=document.createElement("span");
            elemSpan.className="fa fa-eye";
            elemSpan.appendChild(document.createElement("br"));
            var elemSpan2;
            elemSpan2=document.createElement("span");
            elemSpan2.className="txt";
            elemSpan2.appendChild(document.createTextNode("Observation"));
            elemSpan.appendChild(elemSpan2);
            elemIcon.appendChild(elemSpan);
            elem.appendChild(elemIcon);
            elemBody=document.createElement("div");
            elemBody.className="note_body";
                    
            tabIndex[0]=0;//tabIndex est un tableau d'une case équivalent à un curseur
            
            while(i<=lengthCommand-1)
            
                { tabIndex[0]=i;
                 txt=new Text();
                 txt.textContent=getText(commandParts[0],tabIndex);
                 elemBody.appendChild(txt);
                 i=tabIndex[0];
                 if(i<=lengthCommand-1)
                     {
                         nestedOp=[];
                         op=getOperation(nestedOp,commandParts[0],tabIndex);
                         i=tabIndex[0];
                         tmpElem=parseOperation(op,nestedOp);
                         if(tmpElem!=null) elemBody.appendChild(tmpElem);
                         
                     }
                 
                }
            
            if(elemBody!=null) elem.appendChild(elemBody);
            return elem;
            }
        else{
            var cursor=[],parametersArray=[],nestedOp,tempoElem;
		var divElement_0=document.createElement("div");
		var divElement_1=document.createElement("div");
		var divElement_2=document.createElement("div");
		divElement_0.appendChild(divElement_1);
		divElement_0.appendChild(divElement_2);
		divElement_0.className+="widthSettings";
		divElement_1.className+="Observation_1";
		divElement_1.innerHTML="<img src='..\\assets\\images\\observation.png' height='20px'/> Observation";
		divElement_2.className+="Observation_2";
		cursor.push(0);
		while (cursor[0]<commandParts[0].length){
			var txt=getText(commandParts[0],cursor);
			var textNode=document.createTextNode(txt);
			divElement_2.appendChild(textNode);
			if (cursor[0]<commandParts[0].length){
				parametersArray=[];
				var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
				tempoElem=parseOperation(nestedOp,parametersArray);
				divElement_2.appendChild(tempoElem);
			}
		}

	return divElement_0;
        }
		
}

/******************************************************************************************/
/***           bootstrap needed        **/
function parseTabs (commandParts){
    var cursor = [],parametersArray = [],nestedOp ,tempoElem;
    cursor.push(0);
    if (_TabSaving == null){
        creatMainTabs();
        var liElement = document.createElement("li");
        liElement.className = "active";
        
        var divElement = document.createElement("div");
       /* divElement.style.border="1px solid #ddd";                         //if it's the first tab
        divElement.style.borderTop="0px";                              //styling the div Element
        divElement.style.borderRadius="0px";*/
        divElement.className = "tab-pane" + " fade"+" in active";
        
    }else{
        var liElement = document.createElement("li");
         var divElement = document.createElement("div");
        /* divElement.style.border="1px solid #ddd";                      //if it's another element 
        divElement.style.borderTop="0px";                                 //styling the dov Element 
        divElement.style.borderRadius="0px";*/
        divElement.className = "tab-pane" + " fade";
    }

    //working/styling the li element
    var aElement = document.createElement("a");
        aElement.setAttribute("data-toggle","tab");
        aElement.setAttribute("href","#Tabs" + commandParts[0]);
        aElement.innerHTML = commandParts[0].toUpperCase();
        
    liElement.appendChild(aElement);
    _TabSaving.appendChild(liElement);
    
         //working the div element 

        divElement.setAttribute("id","Tabs"+commandParts[0]);
    
    while (cursor[0]<commandParts[1].length){
			var txt = getText(commandParts[1],cursor);
			var textNode = document.createTextNode(txt);
			divElement.appendChild(textNode);
			if (cursor[0]<commandParts[1].length){
				parametersArray = [];
				var nestedOp = getOperation(parametersArray,commandParts[1],cursor);
				tempoElem = parseOperation(nestedOp,parametersArray);
				if (tempoElem!=null) divElement.appendChild(tempoElem);
			}
		}
    _DivSaving.style.marginTop = "20px";  
    _DivSaving.style.marginLeft = "20px";  
    _DivSaving.appendChild(divElement);
    /***********************************
      _DivElement = document.createElement("div");
    
    _DivElement.appendChild(_TabSaving);
    _DivElement.appendChild(_DivSaving);
    /*********************************/
    return null;
    
}

/***************************************************************************************************/
//creatTable
function creatMainTabs(){
    
    //creating the main ul and main div 

    _DivElement = null;                                 
    _TabSaving = document.createElement("ul");
    _TabSaving.className = "nav" + " nav-tabs" ;        
    
    _DivSaving = document.createElement("div");
    _DivSaving.className = "tab-content";
    
}

/******************************************************************************************/
/** traitement de affichertabs1[] **/
function parseAfficherTabs_1(commandParts){
   
    _DivElement = document.createElement("div");
    
    _DivElement.appendChild(_TabSaving);
    _DivElement.appendChild(_DivSaving);
    
    //var  temp = [_TabSaving,_DivSaving];
    _TabSaving = null;                         //returns Ul And Div, which need to be appended to the same parent 
    _DivSaving = null;
    return _DivElement;
    
}


/******************************************************************************************/
/** traitement de -affichertabs2[] **/
function parseAfficherTabs_2(commandParts){
    
    //hover style
    //styling the li s inside ul 
    //use styling from hover.css
     var CssText = "ul.hovering li a:hover{   -webkit-animation-name: hvr-wobble-horizontal;  animation-name: hvr-wobble-horizontal;-webkit-animation-duration: 1s; animation-duration: 1s; -webkit-animation-timing-function: ease-in-out;  animation-timing-function: ease-in-out; -webkit-animation-iteration-count: 1; animation-iteration-count: 1;}"   
    var elements = _TabSaving.childNodes; //adding classe name hovering to ulElement 
     var i = elements.length;
    while (i--) {
   elements[i].className += " hvr-pulse-grow";
   } 
        
   var style = document.createElement("style"); 
    if (style.styleSheet){                         
        style.styleSheet.cssText = CssText;                       //using a new style tag to add the css 
    }else {
        style.appendChild(document.createTextNode(CssText));
    }
    document.getElementsByTagName("head")[0].appendChild(style);
     
     _DivElement = document.createElement("div");
    
    _DivElement.appendChild(_TabSaving);
    _DivElement.appendChild(_DivSaving);
    
    _TabSaving = null;                         //returns Ul And Div, which need to be appended to the same parent 
    _DivSaving = null;
    return _DivElement;           //freeing the global variables 
    
}

/******************************************************************************************/
/** traitement de -ruban[] **/
/*function parseRuban(commandParts){  
	var rubanContain,leftRuban,rightRuban,rubanW,brake,cursor=[],parametersArray=[],nestedOp,tempoElem,Hh2,greenRuban;

	rubanContain=document.createElement("div");
	rubanContain.className="rubanContainer";
	rubanW=document.createElement("div");
	rubanContain.appendChild(rubanW);
	rubanW.className="rubanWhite";

	for (var i = 0; i < 5; i++) {
	 brake=document.createElement("br");
	 rubanW.appendChild(brake);
	}

	greenRuban=document.createElement("div");
	greenRuban.className="rubanGreen";
	rubanContain.appendChild(greenRuban);

	Hh2=document.createElement("h2");
	greenRuban.appendChild(Hh2);

	cursor.push(0);

	while (cursor[0]<commandParts[0].length){
	  var txt=getText(commandParts[0],cursor);
	  var textNode=document.createTextNode(txt);
	  Hh2.appendChild(textNode);
	  if (cursor[0]<commandParts[0].length) {
	      parametersArray=[];
	      var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
	      tempoElem=parseOperation(nestedOp,parametersArray);
	      if (tempoElem!=null) Hh2.appendChild(tempoElem);
	  }
	}

	rightRuban=document.createElement("div");
	rightRuban.className='ruban-droit';
	greenRuban.appendChild(rightRuban);
	leftRuban=document.createElement("div");
	leftRuban.className='ruban-gauche';
	greenRuban.appendChild(leftRuban);

	return rubanContain;

}*/

/** traitement de -ruban[] **/
function parseRubanDef(commandParts){  
          var rubanContain,leftRuban,rightRuban,rubanW,brake,cursor=[],parametersArray=[],nestedOp,tempoElem,Hh2,greenRuban;

          rubanContain=document.createElement("div");
          rubanContain.className="rubanContainer";
          rubanW=document.createElement("div");
          rubanContain.appendChild(rubanW);
          rubanW.className="rubanWhite";

          for (var i = 0; i < 5; i++) {
             brake=document.createElement("br");
             rubanW.appendChild(brake);
          }

          greenRuban=document.createElement("div");
          greenRuban.className="rubanGreen";
          rubanContain.appendChild(greenRuban);

          Hh2=document.createElement("h2");
          greenRuban.appendChild(Hh2);

          cursor.push(0);

          while (cursor[0]<commandParts[0].length){
              var txt=getText(commandParts[0],cursor);
              var textNode=document.createTextNode(txt);
              Hh2.appendChild(textNode);
              if (cursor[0]<commandParts[0].length) {
                  parametersArray=[];
                  var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
                  tempoElem=parseOperation(nestedOp,parametersArray);
                  if (tempoElem!=null) Hh2.appendChild(tempoElem);
              }
          }

          rightRuban=document.createElement("div");
          rightRuban.className='ruban-droit';
          greenRuban.appendChild(rightRuban);
          leftRuban=document.createElement("div");
          leftRuban.className='ruban-gauche';
          greenRuban.appendChild(leftRuban);

          return rubanContain;

        }

        function parseRuban1(commandParts){  
          var container,genDiv,secDiv,genSpan,brake,cursor=[],parametersArray=[],nestedOp,tempoElem;

         	container=document.createElement("div");
         	genDiv=document.createElement("div");
         	container.appendChild(genDiv);
         	genDiv.style.textAlign="center";
     		genDiv.setAttribute("id","nothing");
         	secDiv=document.createElement("div");
         	genDiv.appendChild(secDiv);
         	secDiv.setAttribute("id","ribbon_1");
         	genSpan=document.createElement("span");
         	genSpan.setAttribute("id","nothing");
         	genSpan.style.height="50px";
             
         	cursor.push(0);
          	while (cursor[0]<commandParts[0].length){
              	var txt=getText(commandParts[0],cursor);
              	var textNode=document.createTextNode(txt);
              	genSpan.appendChild(textNode);
              	if (cursor[0]<commandParts[0].length) {
                  	parametersArray=[];
                  	var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
                  	tempoElem=parseOperation(nestedOp,parametersArray);
                  	if (tempoElem!=null) genSpan.appendChild(tempoElem);
              	}
          	}

         	secDiv.appendChild(genSpan);
         	brake=document.createElement("br");
         	container.appendChild(brake);
          	return container;

        }
            
            //////////////////////////////////////////////////////////////////////////////////////////
            
            /*function parseRuban2(commandParts){  
          var genDiv,H2,genSpan,cursor=[],parametersArray=[],nestedOp,tempoElem;

            genDiv=document.createElement("div");
            /*genDiv.style.textAlign="center";****commentaire
            genDiv.setAttribute("id","main_2");
            genDiv.className="nothing";
                
            H2=document.createElement("h2");
            H2.className="ribbon_2";
                
         	genDiv.appendChild(H2);   
                
            genSpan=document.createElement("span");
         	H2.appendChild(genSpan);
         	genSpan.className="nothing";
         	cursor.push(0);
      		while (cursor[0]<commandParts[0].length){
              	var txt=getText(commandParts[0],cursor);
              	var textNode=document.createTextNode(txt);
              	genSpan.appendChild(textNode);
              	if (cursor[0]<commandParts[0].length) {
                  	parametersArray=[];
                  	var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
                  	tempoElem=parseOperation(nestedOp,parametersArray);
                  	if (tempoElem!=null) genSpan.appendChild(tempoElem);
              	}	
          	}

         	H2.appendChild(genSpan);
          	return genDiv;

        }*/
        function parseRuban2(commandParts){
          var container,brake,genDiv,H2,genSpan,cursor=[],parametersArray=[],nestedOp,tempoElem;

          var content,Hh1;
          content=document.createElement("div");
          content.className="content";
          Hh1=document.createElement("h1");
          Hh1.className="ribbon_5";
          content.appendChild(Hh1);
      		/*var hh2,centerRap,titleContainer,ribLeft,ribRight,backflagLeft,backflagRight,title;
         	centerRap=document.createElement("div");
         	centerRap.className="center-wrap";
         	titleContainer=document.createElement("div");
         	titleContainer.className="title-container";
         	centerRap.appendChild(titleContainer);
         	ribLeft=document.createElement("div");
         	ribLeft.className="ribbon-left";
         	titleContainer.appendChild(ribLeft);
         	backflagLeft=document.createElement("div");
         	backflagLeft.className="backflag-left";
         	titleContainer.appendChild(backflagLeft);
         	title=document.createElement("div");
         	title.className="title";
         	titleContainer.appendChild(title);
         	hh2=document.createElement("h2");
         	title.appendChild(hh2);*/

         	/*container=document.createElement("div");
         	container.style.marginTop="20px";
         	container.style.marginBottom="20px";
         	container.style.width="95%";
         	container.style.textAlign="center";

         	genDiv=document.createElement("div");
         	container.appendChild(genDiv);
         	/*genDiv.style.textAlign="center";
            genDiv.setAttribute("id","main_2");
            H2=document.createElement("h2");
			H2.className="ribbon_2";
         	genDiv.appendChild(H2);
            genSpan=document.createElement("span");
            genSpan.setAttribute("id","nothing");
    	 	H2.appendChild(genSpan);*/

    	 	cursor.push(0);
          	while (cursor[0]<commandParts[0].length){
              	var txt=getText(commandParts[0],cursor);
              	var textNode=document.createTextNode(txt);
              	Hh1.appendChild(textNode);
              	if (cursor[0]<commandParts[0].length) {
                  	parametersArray=[];
                  	var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
                  	tempoElem=parseOperation(nestedOp,parametersArray);
                  	if (tempoElem!=null) Hh1.appendChild(tempoElem);
          		}
          	}

          	/*backflagRight=document.createElement("div");
          	backflagRight.className="backflag-right";
          	titleContainer.appendChild(backflagRight);
          	ribRight=document.createElement("div");
          	ribRight.className="ribbon-right";
          	titleContainer.appendChild(ribRight);*/


         	/*H2.appendChild(genSpan);
         	brake=document.createElement("br");
         	container.appendChild(brake);
          	return container;*/
          	return content;

        }
            //////////////////////////////////////////////////////////////////////
            function parseRuban3(commandParts){  
          var container,brake,genDiv,H1,ITag,UTag,cursor=[],parametersArray=[],nestedOp,tempoElem;

            container=document.createElement("div");
            container.style.marginTop="20px";
            container.style.marginBottom="20px";
            genDiv=document.createElement("div");
            container.appendChild(genDiv);
            genDiv.className="div_3";
            H1=document.createElement("h1");
            genDiv.appendChild(H1);
            H1.className="ribbon_3";
            ITag=document.createElement("i");
            H1.appendChild(ITag);
            ITag.className="nothing";
            UTag=document.createElement("u");
            ITag.appendChild(UTag);
            UTag.className="nothing";
                
            cursor.push(0);
          	while (cursor[0]<commandParts[0].length){
              	var txt=getText(commandParts[0],cursor);
              	var textNode=document.createTextNode(txt);
              	UTag.appendChild(textNode);
              	if (cursor[0]<commandParts[0].length) {
                  	parametersArray=[];
                  	var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
                  	tempoElem=parseOperation(nestedOp,parametersArray);
                  	if (tempoElem!=null) UTag.appendChild(tempoElem);
              	}	
          	}

      		brake=document.createElement("br");
      		container.appendChild(brake);
          	return container;

        }
            /////////////////////////////////////////////////////////////////////////
            
             function parseRubanAnim(commandParts){  
          var genDiv,ribbonContainer,ribbonHeader,ribbonWrapper,glowDiv,ribbonFront,ribEdgeLeft,ribEdgeRight,ribEdgeBottom,cursor=[],parametersArray=[],nestedOp,tempoElem;

             genDiv=document.createElement("div");
                genDiv.className="testAnim";
                 ribbonContainer=document.createElement("div");
                 ribbonContainer.className="ribbon-sidebar-container";
                 genDiv.appendChild(ribbonContainer);
                
            ribbonHeader=document.createElement("div");
                ribbonHeader.className="ribbon-header";
                
             ribbonContainer.appendChild(ribbonHeader);   
                
            ribbonWrapper=document.createElement("div");
                 ribbonWrapper.className="ribbon-wrapper";
                 ribbonContainer.appendChild(ribbonWrapper);
                 
              glowDiv=document.createElement("div");
                 glowDiv.className="glow";
                 glowDiv.innerHTML="&nbsp;";
                 ribbonWrapper.appendChild(glowDiv);
                 ribbonFront=document.createElement ("div");
                 ribbonFront.className="ribbon-front";
                 
             cursor.push(0);
          while (cursor[0]<commandParts[0].length){
              var txt=getText(commandParts[0],cursor);
              var textNode=document.createTextNode(txt);
              ribbonFront.appendChild(textNode);
              if (cursor[0]<commandParts[0].length) {
                  parametersArray=[];
                  var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
                  tempoElem=parseOperation(nestedOp,parametersArray);
                  if (tempoElem!=null) ribbonFront.appendChild(tempoElem);
              }
          }
                 ribbonWrapper.appendChild(ribbonFront);
                 ribEdgeLeft=document.createElement ("div");
                 ribEdgeLeft.className="ribbon-edge-topleft";
                 ribbonWrapper.appendChild(ribEdgeLeft);
                 ribEdgeRight=document.createElement ("div");
                 ribEdgeRight.className="ribbon-edge-topright";
                 ribbonWrapper.appendChild(ribEdgeRight);
                 
                 ribEdgeBottom=document.createElement ("div");
                 ribEdgeBottom.className="ribbon-edge-bottomright";
                 ribbonWrapper.appendChild(ribEdgeBottom);
        
          return genDiv;

        }
            ////////////////////////////////////////////////////////////////////////////////////
             function parseRuban(commandParts){
                switch (_ribbonStyle)
                {
                    case 0: return parseRubanDef(commandParts);
                        break;
                    case 1: return parseRuban1 (commandParts);
                        break;
                    case 2: return parseRuban2 (commandParts);
                        break;
                    case 3: return parseRuban3 (commandParts);
                        break;
                    case 4: return parseRubanAnim (commandParts);
                        break;
                        default : break;
                }
            }
/***************************************************************************************************************************/
/** traitement de -alert[] **/
function parseAlert(commandParts){
    
    if(_panelStyle==1)
        {
            var lengthCommand=commandParts[0].length,nestedOp=[],
                txt,elem,elemBody,elemSpan,link,elemIcon,tabIndex=new Array(),i=0,op=new String(),tmpElem;
             
            elem=document.createElement("div");
            elem.setAttribute("id","attention");
                elem.className="box_note";
            link=document.createElement("a");
            link.href="#";link.className="note_close";
            elemSpan=document.createElement("span");
            elemSpan.className="fa fa-close dismiss";
            //link.appendChild(elemSpan);
            elem.appendChild(link);
            elemIcon=document.createElement("div");
            elemIcon.className="iconSS";
            var elemSpan;
            elemSpan=document.createElement("span");
            elemSpan.className="fa fa-bullhorn";
            elemSpan.appendChild(document.createElement("br"));
            var elemSpan2;
            elemSpan2=document.createElement("span");
            elemSpan2.className="txt";
            elemSpan2.appendChild(document.createTextNode("Attention"));
            elemSpan.appendChild(elemSpan2);
            elemIcon.appendChild(elemSpan);
            elem.appendChild(elemIcon);
            elemBody=document.createElement("div");
            elemBody.className="note_body";
                    
            tabIndex[0]=0;//tabIndex est un tableau d'une case équivalent à un curseur
            
            while(i<=lengthCommand-1)
            
                { tabIndex[0]=i;
                 txt=new Text();
                 txt.textContent=getText(commandParts[0],tabIndex);
                 elemBody.appendChild(txt);
                 i=tabIndex[0];
                 if(i<=lengthCommand-1)
                     {
                         nestedOp=[];
                         op=getOperation(nestedOp,commandParts[0],tabIndex);
                         i=tabIndex[0];
                         tmpElem=parseOperation(op,nestedOp);
                         if(tmpElem!=null) elemBody.appendChild(tmpElem);
                         
                     }
                 
                }
            
            if(elemBody!=null) elem.appendChild(elemBody);
            return elem;
        }
    else{
       
        var cursor=[],parametersArray=[],nestedOp,tempoElem;
      var firstLigne,firstPara,secondPara,secondLigne,alert,head,tail,imag,icon;


      alert=document.createElement("div");
      head=document.createTextNode("");
      head.align="center";
      head.width="90%";
      alert.appendChild(head);
      alert.className="widthSettings";
      imag=document.createElement("img");
      imag.src= "../assets/images/alerte.png";
      imag.height="20";
      imag.style="vertical-align:middle;"    
      firstLigne=document.createElement("div");
      firstLigne.align="left";
      firstLigne.className='first_ligne';
      firstLigne.appendChild(imag);
      firstPara=document.createTextNode(" Attention !");
      firstLigne.appendChild(firstPara);
      alert.appendChild(firstLigne);

      secondLigne=document.createElement("div");
      secondLigne.className='second_ligne';

      cursor.push(0);

      while (cursor[0]<commandParts[0].length){
          var txt=getText(commandParts[0],cursor);
          var textNode=document.createTextNode(txt);
          secondLigne.appendChild(textNode);
          if (cursor[0]<commandParts[0].length) {
              parametersArray=[];
              var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
              tempoElem=parseOperation(nestedOp,parametersArray);
              if (tempoElem!=null) secondLigne.appendChild(tempoElem);
          }
      }
      alert.appendChild(secondLigne);

      tail=document.createElement("brake");
      alert.appendChild(tail);


        return alert;

    }
      
}
/**********************************************************************************************************/
 /** traitement de -forme[] **/
function parseForm (commandParts){
        if(_panelStyle==1)
            {
                 var lengthCommand=commandParts[0].length,nestedOp=[],
                txt,elem,elemBody,elemSpan,link,elemIcon,tabIndex=new Array(),i=0,op=new String(),tmpElem;
                
            elem=document.createElement("div");
            elem.setAttribute("id","sommaire");
            elem.className="box_note";
            link=document.createElement("a");
            link.href="#";link.className="note_close";
            elemSpan=document.createElement("span");
            elemSpan.className="fa fa-close dismiss";
            //link.appendChild(elemSpan);
            elem.appendChild(link);
            elemIcon=document.createElement("div");
            elemIcon.className="iconSS";
            var elemSpan;
            elemSpan=document.createElement("span");
            elemSpan.className="fa fa-pencil";
            elemSpan.appendChild(document.createElement("br"));
            var elemSpan2;
            elemSpan2=document.createElement("span");
            elemSpan2.className="txt";
            elemSpan2.appendChild(document.createTextNode("Sommaire"));
            elemSpan.appendChild(elemSpan2);
            elemIcon.appendChild(elemSpan);
            elem.appendChild(elemIcon);
            elemBody=document.createElement("div");
            elemBody.className="note_body";
                    
            tabIndex[0]=0;//tabIndex est un tableau d'une case équivalent à un curseur
            
            while(i<=lengthCommand-1)
            
                { tabIndex[0]=i;
                 txt=new Text();
                 txt.textContent=getText(commandParts[0],tabIndex);
                 elemBody.appendChild(txt);
                 i=tabIndex[0];
                 if(i<=lengthCommand-1)
                     {
                         nestedOp=[];
                         op=getOperation(nestedOp,commandParts[0],tabIndex);
                         i=tabIndex[0];
                         tmpElem=parseOperation(op,nestedOp);
                         if(tmpElem!=null) elemBody.appendChild(tmpElem);
                         
                     }
                 
                }
            
            if(elemBody!=null) elem.appendChild(elemBody);
            return elem;
            }
        else{
            var cursor=[],parametersArray=[],nestedOp,tempoElem;
	    var span,imag,table,tbody,tr,tr2,td,td2,bold,text;

	    table=document.createElement("table");
	    table.align="center";
	    table.className='tableForm';
	    tbody=document.createElement("tbody");
	    table.appendChild(tbody);
	    tr=document.createElement("tr");
	    tr.valing="bottom";
	    tr.height="40px";
	    tbody.appendChild(tr);
	    td=document.createElement("td");
	    td.className="custombox-header-thumb";
	    tr.appendChild(td);
	    imag=document.createElement("img");
	    imag.src="../assets/images/observation.png";
	    imag.height="30";
	    imag.valing="middle";
	    td.appendChild(imag);
	    span=document.createElement("span");
	    span.size="2.0em";
	    td.appendChild(span);
	    bold=document.createElement("b");
	     bold.className="b";
	    span.appendChild(bold);
	    text=document.createTextNode(" Options de recherche");
	    bold.appendChild(text);
	    tr2=document.createElement("tr");
	    tbody.appendChild(tr2);
	    td2=document.createElement("td");
	    td2.className="custombox-content";


	    cursor.push(0);

	    while (cursor[0]<commandParts[0].length){
	        var txt=getText(commandParts[0],cursor);
	        var textNode=document.createTextNode(txt);
	        td2.appendChild(textNode);
	        if (cursor[0]<commandParts[0].length) {
	            parametersArray=[];
	            var nestedOp=getOperation(parametersArray,commandParts[0],cursor);
	            tempoElem=parseOperation(nestedOp,parametersArray);
	            if (tempoElem!=null) td2.appendChild(tempoElem);
	        }
	    }
	    tr2.appendChild(td2);

	    return table;
        }
	    
         }

/****************************************************************************************************************/
/** traitement de -youtube[] **/
function parseYoutube (commandParts){
	    var cursor=[],parametersArray=[],nestedOp,tempoElem;
	    var divGen,para,ifram,para2,bold,ital;

	    divGen=document.createElement("div");
	    divGen.style.margin="25px";
	    para=document.createElement("div");
	    divGen.appendChild(para);
	    para.align="center";
	    ifram=document.createElement("iframe");
	    ifram.src=commandParts[0].replace("watch?v=","embed/");
	    para.appendChild(ifram);
	    para2=document.createElement("p");
	    para2.style.marginTop="5px";
	    para2.style.fontFamily="Georgia";
	    para2.align="center";
	    para2.style.fontSize="15px";
	    ital=document.createElement("i");
	    if (commandParts.length>1){
	        cursor.push(0);	
	        while (cursor[0]<commandParts[1].length){
	            var txt=getText(commandParts[1],cursor);
	            var textNode=document.createTextNode(txt);
	            ital.appendChild(textNode);
	            if (cursor[0]<commandParts[1].length) {
	                parametersArray=[];
	                var nestedOp=getOperation(parametersArray,commandParts[1],cursor);
	                tempoElem=parseOperation(nestedOp,parametersArray);
	                if (tempoElem!=null) ital.appendChild(tempoElem);
	            }
	        }
	        para2.appendChild(ital);
	        ifram.width="640px";
	    	ifram.height="360px";
	    }
	    if (commandParts.length>2){
	    	ifram.width=commandParts[2];
	    	ifram.height=commandParts[2];
	    }
	    if (commandParts.length==4){
	    	ifram.height=commandParts[3];
	    }	

	    divGen.appendChild(para2);
	    return divGen;

}
/************************************************************************************************************************/
/* traitement de -afficherslide[] */
function parsePrintSlide()
{
  
	var myCarouselDivElem,carouselInnerElem,linkElem,oElem,saveLength=_slideSaving.length;
     var containerDiv=document.createElement("div");
    containerDiv.className="row";
	myCarouselDivElem=document.createElement("div");
	myCarouselDivElem.setAttribute("id","myCarousel");
     myCarouselDivElem.style.marginTop="20px";
     myCarouselDivElem.style.marginBottom="20px";
	myCarouselDivElem.className="carousel slide col-sm-8 col-sm-offset-2";

	myCarouselDivElem.setAttribute("data-ride","carousel");
	oElem=document.createElement("ol");
	oElem.className="carousel-indicators";
	carouselInnerElem=document.createElement("div");
	carouselInnerElem.className="carousel-inner";
	carouselInnerElem.setAttribute("role","listbox");
	for(var i=0;i<saveLength;i++)
	    {
	        var listElem=document.createElement("li"),str
	            if(i==0) listElem.className="active";
	        str=""+i;
	        listElem.setAttribute("data-target","#myCarousel");
	        listElem.setAttribute("data-slide-to",str);
	        oElem.appendChild(listElem);
	        carouselInnerElem.appendChild(_slideSaving[i]);
	        
	    }
	  _slideSaving.length=0;
	  
	  myCarouselDivElem.appendChild(oElem);
	  myCarouselDivElem.appendChild(carouselInnerElem);
	  /*----Traitement des controleurs (left&Right)-----*/
	  var controlLinkLeft,controlSpanLeft1,controlSpanLeft2;
	  controlLinkLeft=document.createElement("a");
	  controlLinkLeft.className="left carousel-control";
	  controlLinkLeft.href="#myCarousel";
	  controlLinkLeft.setAttribute("role","button");
	  controlLinkLeft.setAttribute("data-slide","prev");
	  controlSpanLeft1=document.createElement("span");
	  controlSpanLeft1.className="glyphicon glyphicon-chevron-left";
	  controlLinkLeft.appendChild(controlSpanLeft1);
	  controlSpanLeft2=document.createElement("span");
	  controlSpanLeft2.className="sr-only";
	  controlLinkLeft.appendChild(controlSpanLeft2);
	  myCarouselDivElem.appendChild(controlLinkLeft);
	  var controlLinkRight,controlSpanRight1,controlSpanRight2;
	  controlLinkRight=document.createElement("a");
	  controlLinkRight.className="right carousel-control";
	  controlLinkRight.href="#myCarousel";
	  controlLinkRight.setAttribute("role","button");
	  controlLinkRight.setAttribute("data-slide","next");
	  controlSpanRight1=document.createElement("span");
	  controlSpanRight1.className="glyphicon glyphicon-chevron-right";
	  controlSpanRight1.setAttribute("aria-hidden","true");
	  controlLinkRight.appendChild(controlSpanRight1);
	  controlSpanRight2=document.createElement("span");
	  controlSpanRight2.className="sr-only";
	  controlLinkRight.appendChild(controlSpanRight2);
	  myCarouselDivElem.appendChild(controlLinkRight);
	   

	containerDiv.appendChild(myCarouselDivElem);

	return containerDiv;
}
/************************************************************************************************************************/
/* traitement de -slide[] */
function parseSlide(commandParts)
{
    
  var divElem,imgElem,linkElem;
  divElem=document.createElement("div");
  if(_slideSaving.length==0)
      {
          divElem.setAttribute("class","item active");
      }
    else{
        divElem.setAttribute("class","item");
    }
    imgElem=document.createElement("img");
    imgElem.src="../uploads/images/"+commandParts[0];
    
            linkElem=document.createElement("a");
            if(commandParts.length==2) linkElem.href=commandParts[1];
            else linkElem.href="#";
            linkElem.appendChild(imgElem);
            divElem.appendChild(linkElem);
            _slideSaving.push(divElem);
  
    
  
  return null;
}