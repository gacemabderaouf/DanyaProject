    var codeDiv;
    var autoDiv;
    var divs;
    var waiting=false;
    var oldPos=null,posInChange=null;
    var selected=null;
    var sibling=null;
    var scrollingHandler=1;
    var editorIncstance=null;
/**Util******************************************************************************************/
 function showAuto(){
        var curs=codeDiv.find(".CodeMirror-cursor");
        autoDiv.css("display","block")
        autoDiv.css("top",(curs.css("top").replace("px",""))*1+25+"px");
        autoDiv.css("left",curs.css("left").replace("px","")*1+38+"px");
        autoDiv.scrollTop(0);
        divs.css("display","block");
        divs.removeClass("selectedAutoComplete");
        divs[0].className="selectedAutoComplete";
        scrollingHandler=1;
    }
    function hideAuto(){
        autoDiv.css("display","none");
        waiting=false;
        oldPos=null;
        found=true;
    }
    $(document).on("click",function(event){
        if (event.target.parentElement==autoDiv[0]){
            putCommand(editorIncstance,event.target.innerHTML,oldPos,Omega.getCursor());
            hideAuto();
            Omega.focus();
        }
        else{
            hideAuto();
        }
    });
    function putCommand(Omega,input,from,to) {
        var output="-"+input;
        if (input!="affichertable" &&
            input!="getable"       &&
            input!="afficherslide" &&
            input!="affichertabs1" &&
            input!="affichertabs2"
                                     ){
            output+="[]";
            Omega.replaceRange(output,from,to);
            var tempoPos=Omega.getCursor();
            Omega.setCursor({line:tempoPos.line,ch:tempoPos.ch-1});
        }
        else{
            Omega.replaceRange(output,from,to);
        }
    }
/*************************************************************************************************/
function startAutoComplete(Omega){
     editorIncstance=Omega;
     codeDiv=$("#codeEditor div.CodeMirror");
     autoDiv=$(".autoComplete");
     divs=autoDiv.find("div");
    codeDiv.append(autoDiv);
 Omega.on("keydown",function(instance,event){
        if ((event.keyCode=='109' || event.keyCode=="54") && !event.ctrlKey && !event.shiftKey)
        {
            waiting=true;
            oldPos=Omega.getCursor();
            showAuto();
        }
        else if(waiting && (event.keyCode=='37' || event.keyCode=='39' || event.keyCode=='27')){
            hideAuto();
        }
        else if (waiting && (event.keyCode=="38" || event.keyCode=="40")){
            event.preventDefault();
            selected=autoDiv.find($(".selectedAutoComplete"));            
            if (event.keyCode=="40"){
                sibling=selected.next();
                while (sibling.css("display")=="none") sibling=sibling.next();
                if (sibling.length){
                    if (scrollingHandler<8) scrollingHandler++;
                    else autoDiv.scrollTop(autoDiv.scrollTop()+22);
                    selected.removeClass("selectedAutoComplete");
                    sibling.addClass("selectedAutoComplete");
                }
                else
                {
                    selected.removeClass("selectedAutoComplete");
                    var tempo=autoDiv.find(":first-child");
                    while (tempo.css("display")=="none") tempo=tempo.next();
                    tempo.addClass("selectedAutoComplete");
                    autoDiv.scrollTop(0);
                    scrollingHandler=1;
                }
            }
            else
            {
                sibling=selected.prev();
                while (sibling.css("display")=="none") sibling=sibling.prev();
                if (sibling.length){
                    if (scrollingHandler>1) scrollingHandler--;
                    else autoDiv.scrollTop(autoDiv.scrollTop()-22);
                    selected.removeClass("selectedAutoComplete");
                    sibling.addClass("selectedAutoComplete");
                } else{
                    selected.removeClass("selectedAutoComplete");
                    var tempo=autoDiv.find(":last-child");
                    while (tempo.css("display")=="none") tempo=tempo.prev();
                    tempo.addClass("selectedAutoComplete");
                    autoDiv.scrollTop(1000);
                    scrollingHandler=8;
                }
            }
        
        }
        else if(waiting && event.keyCode=="13"){
            event.preventDefault();
            selected=autoDiv.find($(".selectedAutoComplete"));
            putCommand(Omega,selected.html(),oldPos,Omega.getCursor());
            hideAuto();
        }
        else if (waiting && (event.keyCode=="8" || (event.keyCode>=65 && event.keyCode<=90) || (event.keyCode>=96 && event.keyCode<=105))){
            divs.css("display","block");
            divs.removeClass("selectedAutoComplete");
            divs[0].className+="selectedAutoComplete";
            posInChange=Omega.getCursor();
            if (event.keyCode!=8) posInChange.ch=posInChange.ch;
            else posInChange.ch=posInChange.ch-1;
            res=Omega.getRange(oldPos,posInChange);
            if (event.keyCode!=8){
                if (event.keyCode<96 || event.keyCode>105) res+=String.fromCharCode(event.keyCode).toLowerCase();
                else res+=String.fromCharCode(event.keyCode-48);
            }
            if (res=="") hideAuto();
            else{
                res=res.slice(1,res.length);
                var found=false;
                scrollingHandler=1;
                $.each(divs,function(index,divElem){
                    if((divElem.innerHTML).indexOf(res)!=0){
                        divElem.style.display="none";
                        divElem.className="";
                    } else{
                        if (!found) {
                            divElem.className="selectedAutoComplete";
                            found=true;
                        }
                    }
                });
                if (!found){
                    hideAuto();
                }
            }
        }

    });
}