/*Interface Handlers*/
//Tables handling--------------------------------------------------------------------------------
function handleTableOp (nlines,mColumns,printIt){
        var result="\n-entetetable[";
        for (var i=0;i<mColumns-1;i++) result+="/*Nom colonne "+(i+1)+"*/|";
        result+="/*Nom colonne "+(i+1)+"*/]";
        if (nlines>0){
            result+="\n";
            for (var i=0;i<nlines;i++){
                result+="-lignetable[";
                for (var j=0;j<mColumns-1;j++){
                    result+="/*C "+(j+1)+" line "+(i+1)+"*/";
                    result+='|';
                }
                result+="/*C "+(j+1)+" line "+(i+1)+"*/]\n";
            }
            if (printIt) result+="-affichertable\n";
        }
        return result;
}

function handleTableHoveringIn(){
           
  document.getElementById("insertingTableDiv").style.display="inline-block";

} 

function handleTableHoveringOut(){
     var tds=$(".tableInserting td");
        tds.removeClass("hoveredSquare");
        tds[0].className="hoveredSquare";
        var cellIndex=event.target.cellIndex;
        var rowIndex=event.target.parentElement.rowIndex;
        document.getElementById("insertingTableDiv").style.display="none";
        $(".tableInserting span")[0].innerHTML="1 x 1";
}
//Links Handling-----------------------------------------------------------------

 function handleLinkHoveringIn(){
     document.getElementById("linksDiv").style.display="block";
}
function handleLinkHoveringOut(){
     document.getElementById("linksDiv").style.display="none";
}
 function handleLinkOp(link,type){
            var result=type=="extLink"?" -lvu[ /*Titre_Lien*/ | "+link+" ] ":
                type=="intLink"?" -lvm[ /*Titre_Lien*/ | "+link+" ] ":
                " -lvs[ /*Titre_Lien*/ |"+link+" ] ";
            return result;
}
//Num Handling-------------------------------------------------------------------
function handleNumHoveringIn(){
            document.getElementById("numDiv").style.display="inline-block";
}

function handleNumHoveringOut(){
     document.getElementById("numDiv").style.display="none";
}

function handleNumOp(nbNums,type){
            var result="\n-num[\n\t";
            for (var i = 0; i<nbNums-1 ;i++){
                result+="/* Item "+(i+1)+" */|\n\t";
            }
            result+="/*Item "+nbNums+" */\n]";
            return result;
}
//Posts handling------------------------------------------------------
function handlePostOp(imagesSrc){
    var result="\n";
    for (var i = 0;i<imagesSrc.length;i++){
        result+="-post[/*Le titre ici*/|/*Le lien ici*/|"+imagesSrc[i]+']\n';
    }
    result+="-afficherpost[/*Un titre ici*/]\n";
    return result;
}
/*-----Brahim yacine-*/
 /* This is a function to handle Panel insertion */

        function handlePanel(event) {
        $("#sectionSpecialesInsertionModal").modal("show");
         var panelType=event.target.id;   
      
          
        if (!Omega.somethingSelected()) {
            //$("#nothingSelectedModal").modal("show");
            Omega.replaceRange("-"+panelType+"[ /*Contenu*/ ] ",Omega.getCursor());
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push("-"+panelType+"["+Omega.getSelections()[i]+"]");
            }
            Omega.replaceSelections(replacements);
        }
         
          $("#sectionSpecialesInsertionModal").modal("hide");
                 
        }
         function handleTitle(titleType) {
            var type=titleType;
            if(titleType==1)
                {
                    type="";
                }
          
        if (!Omega.somethingSelected()) {
            //$("#nothingSelectedModal").modal("show");
            Omega.replaceRange("-titre"+type+"[ /*Contenu*/ ] ",Omega.getCursor());
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push("-titre"+type+"["+Omega.getSelections()[i]+"]");
            }
            Omega.replaceSelections(replacements);
        }
         
                 $(this).preventDefault();
    }
        
        function handleColor(color)
        {
            if (!Omega.somethingSelected()) {
            Omega.replaceRange(" -couleur[ "+"/*Contenu*/"+" | "+color+"]", Omega.getCursor());
        }
        else {
            var replacements = [];
            for (i = 0;i < Omega.getSelections().length;i++) {
                replacements.push("-couleur"+"["+Omega.getSelections()[i]+" | "+color+"]");
            }
            Omega.replaceSelections(replacements);
        }
         
                 $(this).preventDefault();
        }
   
/*-------------Brahim Yacine------------------------*/