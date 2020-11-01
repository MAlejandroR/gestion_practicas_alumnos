<?php
//esta clase se encarga de comparar el numero de colores acertados de la jugada con la clave

class Clave{

    private $arrayClave;
    private $arrayJuagada;

    public function __construct($arrayClave, $arrayJuagada) {//genero el constructor
        $this->arrayClave = $arrayClave;
        $this->arrayJuagada = $arrayJuagada;
    }

    
    public function contarColores() {
        
       
        foreach ($this->arrayClave as $color) {//colores de la clave
            if (array_key_exists($color, $nColores)) {
                
                $nColores[$color] ++;//add color
            } else {
                
                $nColores[$color] = 1;//suma color
            }
        }
        
        foreach ($this->arrayJuagada as $color) {//colores de la jugada
            if (array_key_exists($color, $nColoresJugada)) {
                
                $nColoresJugada[$color] ++;//add color 
            } else {
                
                $nColoresJugada[$color] = 1;//suma color
            }
        }
        
        //Ya sabemos la cantidad, solo falta compararlos
        $coloresAcertados = 0;       
        foreach ($nColoresJugada as $color => $valor) {
            if(array_key_exists($color, $nColores)){
                if($nColores[$color]>$nColoresJugada[$color]){
                    $coloresAcertados += $nColoresJugada[$color];
                }else{
                     $coloresAcertados += $nColores[$color];
                }
            }
        }
        return $coloresAcertados;
        
    }
    
    public function mirarPosicion(){
        $posicionesAcertadas = 0;
        foreach ($this->arrayClave as $posicion => $color) {
            if($this->arrayClave[$posicion] == $this->$arrayJuagada[$posicion]){
                $posicionesAcertadas++;
            }
        }
        return $posicionesAcertadas;
    }

}
