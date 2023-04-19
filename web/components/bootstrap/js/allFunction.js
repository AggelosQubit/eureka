
	function totalDev()
	{
		var ligneDuTableau=document.getElementById("tableForfait").rows;
		var nbLigne=ligneDuTableau.length;
		
		var montantTot=0;
		
		for(var i=0;i<nbLigne;i++)
		{
			montantTot +=parseFloat(ligneDuTableau[i].cells[2].innerHTML);
		}
		montantTot=montantTot.toFixed(2);
		var lignes	= document.getElementById("totalDevis").rows;
		var cellules=lignes[0].cells;
		
		cellules[0].innerHTML="<b>Total</b>";
		cellules[1].innerHTML=montantTot
		
		return montantTot
	}
	function ajouteRow(nomDuForfait,prixDuForfait)
	{	
		//PARTIE OU ON AJOUTE DE FA9ON DYNAMIQUE GRAPHIQUE COTE CLIENT
		var ligneDuTableau=document.getElementById("tableForfait").rows;	//JE RECUPERE LES LIGNES DU TABLEAU DOM
		var nbLigne=ligneDuTableau.length;								//ICI J'OBTIENS LE NOMBRES DE LIGNES TOTALES DU TABLEAU
		
		var ligne 	 = document.getElementById("tableForfait").insertRow(-1);//J'INSERE UNE LIGNE
	
		var ind 	 = ligne.insertCell(0);//on a une ajouté une cellule
		var nForfait = ligne.insertCell(1);//on a une ajouté une cellule
		var pForfait = ligne.insertCell(2);//on a une ajouté une cellule
		var suppr 	 = ligne.insertCell(3);//on a une ajouté une cellule
			
		ind.innerHTML 		=nbLigne+1;
		nForfait.innerHTML 	=nomDuForfait;
		pForfait.innerHTML 	=prixDuForfait;
		suppr.innerHTML		="<button onClick=\"supprimeRow("+(nbLigne+1)+");\" class=\"btn btn-danger\" ><i class=\"glyphicon glyphicon-remove\"></i></button>";
		
		colorRow();
		totalDev();
		boutton();
	}
	function colorRow()
	{		
		var arrayLignes = document.getElementById("tableForfait").rows; //l'array est stocké dans une variable
		var longueur = arrayLignes.length;								//on peut donc appliquer la propriété length
		var i=0; 														//on définit un incrémenteur qui représentera la clé

		while(i<longueur){
			if(i % 2 == 0){												//si la clé est paire
				arrayLignes[i].style.backgroundColor = "#ffa84c";
			}
			else {														//elle est impaire
				arrayLignes[i].style.backgroundColor = "#88bfe8";
			}
			i++;
		}
	}
	function supprimeRow(indice)
	{
		colorRow();
		totalDev();
		var arrayLignes = document.getElementById("tableForfait").rows; 
		var longueur = arrayLignes.length;								//on peut donc appliquer la propriété length
		
		
		for(var i=0;i<longueur;i++)
		{
			var arrayCol=arrayLignes[i].cells;
			if(parseInt(arrayCol[0].innerHTML)==indice)
			{
				//alert("Voulez-vous vraiment enlever \nle Forfait : "+arrayCol[1].innerHTML+" du devis?");
				document.getElementById("tableForfait").deleteRow(i);
				longueur = arrayLignes.length;
				for(var j=0;j<longueur;j++)
				{
					var arrayCol=arrayLignes[j].cells;
					arrayCol[0].innerHTML=j+1;
					arrayCol[3].innerHTML="<button onClick=\"supprimeRow("+(j+1)+");\" class=\"btn btn-danger\" ><i class=\"glyphicon glyphicon-remove\"></i></button>";
					colorRow();
					totalDev();
					
				}
				colorRow();
				totalDev();
			}
			colorRow();
			totalDev();
		}
		
		colorRow();
		totalDev();
		boutton();
	}
	function boutton()
	{
		var arrayLignes = document.getElementById("tableForfait").rows; 
		var longueur = arrayLignes.length;	
		if(longueur>0)
		{
			$('#btnDevis').prop('disabled', false);
		} else {
			$('#btnDevis').prop('disabled', true);
		}
	}
	function formulaire()
	{
		if(confirm("Avez-vous terminer la saisie du devis?"))
		{
			$('#btnDevis').prop('disabled', true);
			//l'array est stocké dans une variable
			//on peut donc appliquer la propriété length
			//on définit un incrémenteur qui représentera la clé
			var arrayLignes = document.getElementById("tableForfait").rows; 
			var longueur = arrayLignes.length;								
			var i=0; 														

			for(var i=0;i<longueur;i++)
			{
				//JE DOIS PARCOURIR LE TABLEAU HTML CREER EN JAVASCRIPT
				//ET CREER A PARTIR DE LUI LE FORMULAIRE A ENVOYER AU SERVEUR
				document.formDevis.innerHTML+="<input type=\"hidden\" name=\""+i+"\" value=\""+arrayLignes[i].cells[1].innerHTML+"\">";
			}
			document.formDevis.innerHTML+="<input type=\"hidden\" name=\"ligne\" value=\""+longueur+"\">";
			document.formDevis.innerHTML+="<input type=\"hidden\" name=\"montantTot\" value=\""+totalDev()+"\">";
			document.formDevis.submit();
		}
	}
	function checkform(f)
	{
		if(	(f.elements["nom"].value == "")	|| (f.elements["prenom"].value == "") || (f.elements["tel"].value == "")  || (f.elements["adresse"].value == "") )
		{
			alert("Veuillez renseignez les champs");
			return false;
		} else {
			var i=0;
			
			var nom=f.elements["nom"].value;
			var prenom=f.elements["prenom"].value;
			var tel=f.elements["tel"].value;
			var adresse=f.elements["adresse"].value;
			
			for(i=0;i<nom.length;i++)
			{	//(\ \' ; . )
				if( (nom.charAt(i)=='\\')  || (nom.charAt(i)==';') || (nom.charAt(i)=='.') || (nom.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  '  ;  . )");
					return false;
				}
			}
			
			for(i=0;i<prenom.length;i++)
			{	//(\ \' ; . )
				if( (prenom.charAt(i)=='\\') || (prenom.charAt(i)==';') || (prenom.charAt(i)=='.') || (prenom.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  '  ;  . )");
					return false;
				}
			}
			
			for(i=0;i<tel.length;i++)
			{	//(\ \' ; . )
				if( (tel.charAt(i)=='\\') || (tel.charAt(i)==';') || (tel.charAt(i)=='.') || (tel.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  ' ;  . )");
					return false;
				}
			}
			
			for(i=0;i<adresse.length;i++)
			{	//(\ \' ; . )
				if( (adresse.charAt(i)=='\\') || (adresse.charAt(i)==';') || (adresse.charAt(i)=='.') || (adresse.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  ' ;  . )");
					return false;
				}
			}
			return true;
		}
	}
	function checkformRejoindre(f)
	{
		if(	(f.elements["nom"].value == "")	|| (f.elements["prenom"].value == "") || (f.elements["telephone"].value == "")|| 
			 (f.elements["sujet"].value == "")  || (f.elements["corpsMessage"].value == ""))
		{
			alert("Veuillez renseignez tout les champs");
			return false;
		} else {
			var nom=f.elements["nom"].value;
			var prenom=f.elements["prenom"].value;
			var telephone=f.elements["telephone"].value;
			var sujet=f.elements["sujet"].value;
			
			for(i=0;i<mail.length;i++)
			{	//(\ \' ; . )
				if( (mail.charAt(i)=='\\') || (mail.charAt(i)=='\'') || (mail.charAt(i)==';') || (mail.charAt(i)=='.') || (mail.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  '  ;  . )");
					return false;
				}
			}
			
			for(i=0;i<sujet.length;i++)
			{	//(\ \' ; . )
				if( (sujet.charAt(i)=='\\') || (sujet.charAt(i)=='\'') || (sujet.charAt(i)==';') || (sujet.charAt(i)=='.') || (sujet.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  '  ;  . )");
					return false;
				}
			}
			
			for(i=0;i<nom.length;i++)
			{	//(\ \' ; . )
				if( (nom.charAt(i)=='\\') || (nom.charAt(i)=='\'') || (nom.charAt(i)==';') || (nom.charAt(i)=='.') || (nom.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  '  ;  . )");
					return false;
				}
			}
			
			for(i=0;i<prenom.length;i++)
			{	//(\ \' ; . )
				if( (prenom.charAt(i)=='\\') || (prenom.charAt(i)=='\'') || (prenom.charAt(i)==';') || (prenom.charAt(i)=='.') || (prenom.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  '  ;  . )");
					return false;
				}
			}
			
			for(i=0;i<telephone.length;i++)
			{	//(\ \' ; . )
				if( (telephone.charAt(i)=='\\') || (telephone.charAt(i)=='\'') || (telephone.charAt(i)==';') || (telephone.charAt(i)=='.') || (telephone.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  ' ;  . )");
					return false;
				}
			}
			return true;
		}
	}
	
	function checkformContact(f)
	{
		if(	(f.elements["nom"].value == "")				|| (f.elements["prenom"].value == "") || (f.elements["telephone"].value == "") || 
			(f.elements["sujet"].value == "")	|| (f.elements["corpsMessage"].value == ""))
		{
			alert("Veuillez renseignez tout les champs");
			return false;
		} else {
			var i=0;
			var nom=f.elements["nom"].value;
			var prenom=f.elements["prenom"].value;
			var telephone=f.elements["telephone"].value;
			var sujet=f.elements["sujet"].value;

			
			for(i=0;i<sujet.length;i++)
			{	//(\ \' ; . )
				if( (sujet.charAt(i)=='\\') || (sujet.charAt(i)=='\'') || (sujet.charAt(i)==';') || (sujet.charAt(i)=='.') || (sujet.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  '  ;  . )");
					return false;
				}
			}
			
			for(i=0;i<nom.length;i++)
			{	//(\ \' ; . )
				if( (nom.charAt(i)=='\\') || (nom.charAt(i)=='\'') || (nom.charAt(i)==';') || (nom.charAt(i)=='.') || (nom.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  '  ;  . )");
					return false;
				}
			}
			
			for(i=0;i<prenom.length;i++)
			{	//(\ \' ; . )
				if( (prenom.charAt(i)=='\\') || (prenom.charAt(i)=='\'') || (prenom.charAt(i)==';') || (prenom.charAt(i)=='.') || (prenom.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  '  ;  . )");
					return false;
				}
			}
			
			for(i=0;i<telephone.length;i++)
			{	//(\ \' ; . )
				if( (telephone.charAt(i)=='\\') || (telephone.charAt(i)=='\'') || (telephone.charAt(i)==';') || (telephone.charAt(i)=='.') || (telephone.charAt(i)=='-') )
				{
					alert("N'utilisez pas les caractères spéciaux ( \\  ' ;  . )");
					return false;
				}
			}
			return true;
		}
	}