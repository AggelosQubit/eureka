function checkform(f)
{
	if(	
		(f.elements["nom"].value == "")		|| (f.elements["prenom"].value == "") 		|| (f.elements["raison"].value == "") 			|| 
		(f.elements["email"].value == "")	|| (f.elements["confirm_email"].value == "")|| (f.elements["statut"].value == "")  			|| 
		(f.elements["forme"].value == "")	|| (f.elements["tel"].value == "")  		|| (f.elements["portable"].value == "")			|| 
		(f.elements["fax"].value == "")  	|| (f.elements["adresse"].value == "") 		|| (f.elements["codePostal"].value == "")  		|| 
		(f.elements["ville"].value == "")  	|| (f.elements["password"].value == "")  	|| (f.elements["confirm_password"].value == "")
	 )
	{
		alert("Veuillez renseignez tout les champs");
		return false;
	} else {
		var i,j;
		var tailleFormIns=document.getElementById("formIns").length;

		for(i=0 ; i<tailleFormIns ; i++)
		{
			for(j=0 ; j<document.forms["formIns"].elements[i].length ; j++)
			{
				/*(f.elements[i].charAt(i)=='\\') || (f.elements[i].charAt(i)==';') 	|| 
					(f.elements[i].charAt(i)=='"') 	|| (f.elements[i].charAt(i)=='-') 	||
					(f.elements[i].charAt(i)=='<')	|| (f.elements[i].charAt(i)=='>')	||
					(f.elements[i].charAt(i)=='?')	|| (f.elements[i].charAt(i)=='!')
*/				alert(f.elements[i].indexOf("?"));
				/*if( f.elements[i].indexOf("?")!= )
				{
					alert("N'utilisez pas les caractères ( \\  '  ; "" < > ! ? )");
					return false;
				}*/
			}
		}
		return true;
	}
}

$(document).ready(function(){
	$('.carousel').carousel();
});

$(function() {
	$( "#accordionConn" ).accordion({ 
		heightStyle: "content"
	});
});

$(function() {
	$( "#menuClient" ).menu();
});
//MODAL FOOTER
/**********DIALOG1*********/
$(function() {
    $( "#dialog1" ).dialog({
		autoOpen: false,
		show: {
			effect: "blind",
        	duration: 1000
      	},
     	hide: {
        	effect: "explode",
        	duration: 1000
      	}
    });
 
	$( "#opener1" ).click(function() {
		$( "#dialog1" ).dialog( "open" );
	});
});
/**********DIALOG2*********/
$(function() {
    $( "#dialog2" ).dialog({
		autoOpen: false,
		show: {
			effect: "blind",
        	duration: 1000
      	},
     	hide: {
        	effect: "explode",
        	duration: 1000
      	}
    });
 
	$( "#opener2" ).click(function() {
		$( "#dialog2" ).dialog( "open" );
	});
});
/**********DIALOG3*********/
$(function() {
    $( "#dialog3" ).dialog({
		autoOpen: false,
		show: {
			effect: "blind",
        	duration: 1000
      	},
     	hide: {
        	effect: "explode",
        	duration: 1000
      	}
    });
 
	$( "#opener3" ).click(function() {
		$( "#dialog3" ).dialog( "open" );
	});
});
/**********DIALOG5*********/
$(function() {
    $( "#dialog5" ).dialog({
		autoOpen: false,
		show: {
			effect: "blind",
        	duration: 1000
      	},
     	hide: {
        	effect: "explode",
        	duration: 1000
      	}
    });
 
	$( "#opener5" ).click(function() {
		$( "#dialog5" ).dialog( "open" );
	});
});
/**************************/
function suppr_confirm()
{
	var r = confirm("Supprimer la demande?");
	if(r == true)
	{
		return true;
	} else {
		// do something
     	return false;
  	}
}
/**************************/