//fonctions au chargement de la page
$(document).ready(function() 
{ 
  var temps= setInterval("infos()", 10000); //lance une fonction avec interval temps 
  
  $('#refresh').click(function() { //lance fonction avec clique sur #refresh
    
    infos();
   });
   
    
   

});


function couleur(couleur) 
{     
 $('.info').css('color', couleur.value );
};



function infos()  
{
  $('#update_infos').hide().fadeIn('slow');

  //fonction ajax qui envoi un post ver update.php
  $.ajax({type: "POST",url: "../pages/update.php", data: "infos=",
  success: function(reponse) 
  {  
          
     //récupération de la réponse du post et affichage dans la div
     document.getElementById('update_infos').innerHTML=reponse;
     
     //Récupération valeur du select
     $('.info').css('color', document.getElementById('couleur').value );
  }
  });

}





function ajout_commentaire(id_page)
{
  
  var commentaire= document.getElementById('commentaire').value;
  var nom= document.getElementById('nom').value;
  
  var textarea= $('#commentaire').attr('placeholder');
  var input= $('#nom').attr('placeholder');
  
  if(commentaire=='' || commentaire==textarea)
  {
    document.getElementById('reponse').innerHTML='Inscrire un commentaire';
  }
  else if(nom=='' || nom==input)
  {
    document.getElementById('reponse').innerHTML='Inscrire un nom';
  }
  else
  {
      $.ajax({type: "POST",url: "../pages/update.php", data: "ajout_commentaire=" + id_page + "&commentaire=" + commentaire + "&nom=" + nom,
      success: function(reponse) 
      {  
        $('#commentaire').val('');
        $('#nom').val('');
        document.getElementById('reponse').innerHTML='Commentaire posté';
        update_commentaire(id_page);         
      }
      });
   }

}




function update_commentaire(id_page)
{

  $.ajax({type: "POST",url: "../pages/update.php", data: "update_commentaire=" + id_page,
  success: function(reponse) 
  {  
    document.getElementById('liste_commentaire').innerHTML=reponse;    
         
  }
  });  

}




function suppr_commentaire(id_commentaire, id_page)
{
     $.ajax({type: "POST",url: "../pages/update.php", data: "suppr_commentaire=" + id_commentaire,
      success: function(reponse) 
      {  
        update_commentaire(id_page);   
         
      }
      });   

}