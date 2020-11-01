 <?php
echo '<div class="home">';

   echo '<h1>Adivina el numero</h1>';

 echo '<h2>Selecciona un intervalo del menu</h2>';
   
	   echo '	<p class="remember_me">';
            echo '<form method = "post" action = "jugar.php">';
		   echo '<div ALIGN=center>';    
              echo '<input type="radio" name="rdb" value="intervalo1" checked><label>1-10(5 intentos)</label>';
                echo'<br></br>';
		      echo '<input type="radio" name="rdb" value="intervalo2"><label>1-100(15 intentos)</label>';
                echo'<br></br>';         
		      echo '<input type="radio" name="rdb" value="intervalo3"><label>1-1000(35 intentos)</label>';
                echo'<br></br>';         
		      echo '<input type="submit" name="btn" value="Comenzar">';
 echo '</form>';              

		   echo ' </div>';

		   echo '</p>';

 echo '<h2>    Piensa un número de ese intervalo</h2>';
     echo '<h2>    La aplicación lo acertará en el número de intentos establecidos según el intervalo</h2>';
     echo '<hr/>';

     echo '<h2>    Cada vez que la aplicación te especifique un número deberás de indicar</h2>';
    echo ' <ul>';
        echo ' <ol>Si el número buscado es mayor</ol>';
         echo '<ol>Si el número buscado es menor</ol>';
         echo '<ol>Si has aceertado el nnúmero</ol>';
     echo '</ul>';

	   echo ' </div>';

   echo '</div>';
?>  
