
<?php  
	extract($_POST);
?>



<!DOCTYPE html>
<html>
<head>
	<title>download</title>
	<style type="text/css">
		.telch1{
		border: 1px dashed blue;
		border-bottom: 0px;
		background-color: yellow;
		display: block;
		padding: 5px;
		color: black;
		font-family: Verdana;
		font-size: 1.4em;
		font-style:bold;
		vertical-align:middle;

		}
		.telch2{ 
		border: 1px dashed blue;
		background-color: #f3f1ef;
		display: block;
		padding: 5px;
		color: black;
		font-family: Verdana;
		font-size: 1.2em;
		}
	</style>
</head>

	
<body>

<div style="width: 100%;">
	<div align="left" class="telch1">
		<img src="../assets/images/def.PNG" style=" vertical-align:middle; width:20px; height:20px;">
		 Note
	 </div>
	 <div style="text-align:center;" class="telch2">
	 	<span style="text-align:center;" id="parag">
	 		Si le téléchargement ne débute pas dans 5 secondes, </span> <span style="text-align:center;" >cliquez sur le lien ci-dessous pour lancer le téléchragement du fichier demandé.</span>
	 		<br> <span id="link"><u>Télécharger</u></span>
		
	 </div>
</div>


</body>
<script type="text/javascript"> 

		var i=1;
		var parag=document.getElementById('parag');
		var link=document.getElementById('link');
		var time=setInterval(function(){
			parag.innerHTML="Si le téléchargement ne débute pas dans "+((5-i)+"")+" secondes, ";
			i++;
			if(i==7){
			clearInterval(time);
			parag.innerHTML="";
			link.innerHTML="<?php 
				$path=substr($_POST['linkInput'],42);
				echo '<a href=\"..\/uploads\/files\/'.$path.'\" target=\"_blank\" download=\"\">Télécharger</a>'; 
				?>"
		}
		},1000)

		
	


</script>
</html>


