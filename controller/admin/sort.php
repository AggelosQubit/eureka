<?php
/* racine */
$BASE = "../..";
/* liste des dossiers */
function list_dir($base, $cur, $level=0) {
  global $PHP_SELF, $BASE;
  if ($dir = opendir($base)) {
    $tab = array();
    while($entry = readdir($dir)) {
      if(is_dir($base."/".$entry) && !in_array($entry, array(".",".."))) {
        $tab[] = $entry;
      }
    }
    sort($tab);
    foreach($tab as $entry) {
      /* chemin relatif à la racine */
      $file = $base."/".$entry;
     /* marge gauche */
      for($i=1; $i<=(4*$level); $i++) {
        echo "&nbsp;";
      }
      /* l'entrée est-elle le dossier courant */
      if($file == $cur) {
        echo "<img src=\"dir-open.gif\" />&nbsp;$entry<br />\n";
      } else {
        echo "<img src=\"dir-close.gif\" />&nbsp; <a href=\"$PHP_SELF?dir=".rawurlencode($file)."\">$entry</a><br />\n";
      }
      /* l'entrée est-elle dans la branche dont le dossier courant est la feuille */
      if(ereg($file."/",$cur."/")) {
        list_dir($file, $cur, $level+1);
      }
    }
    closedir($dir);
  }
}
/* liste des fichiers */
function list_file($cur) {
  if ($dir = opendir($cur)) {
    /* tableaux */
    $tab_dir = array();
    $tab_file = array();
    /* extraction */
    while($file = readdir($dir)) {
      if(is_dir($cur."/".$file)) {
          $tab_dir[] = $file;
      } else {
          $tab_file[] = $file;
      }
    }
    /* tri */
    sort($tab_dir);
    sort($tab_file);
    /* affichage */
    foreach($tab_dir as $elem) {
      echo "<img src=\"dir-close.gif\" />&nbsp;".$elem."<br />\n";
    }
    foreach($tab_file as $elem) {
      echo "<img src=\"file-none.gif\" />&nbsp;".$elem."<br />\n";
    }
    closedir($dir);
  }
}
?>