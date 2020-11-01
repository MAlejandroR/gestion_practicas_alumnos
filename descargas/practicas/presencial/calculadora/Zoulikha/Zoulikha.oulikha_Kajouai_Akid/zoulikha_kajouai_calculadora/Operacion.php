<?php

abstract class Operacion {

    protected $OP1;
    protected $OP2;
    protected $operando;

    public function __construct($n,$operacion) {
        if ($n==1) {
          $this->Rac_Rac($operacion);
           
           
        } elseif ($n==2) {
           
           $operacion=$operacion."/1";
           $this->Rac_Rac($operacion);
        } elseif ($n==3) {
            for($i=0;$i<strlen($operacion);$i++){
                if(preg_match("/[+|\-|*|\/]/", $operacion[$i])){
                    $this->operando=$operacion[$i];
                    
                }
                
            }
            $s= explode("$this->operando",$operacion);
            $this->OP1=$s[0];
            $this->OP2=$s[1];
           
            
        } elseif ($n==4) {
           
            
             for($i=0;$i<strlen($operacion);$i++){
                 
                if(preg_match("/[+|-|:|*]/", $operacion[$i])){
                    
                   $m= substr("$operacion ",0,$i);
                    
                    $oper= substr($operacion,0,$i)."/1".substr($operacion, $i,strlen($operacion)-($i-1));
                
                    
                }
            }
            
            
        
            $this->Rac_Rac($oper);
                }
    }
    
    
    public function Rac_Rac($operacion){
     
        $operandos=explode("/",$operacion);
               
            for ($i=0; $i<strlen($operandos[1]); $i++ ){ 
                $v=$operandos[1][$i];
                if(preg_match("/[+|-|:|*]/", $v)){
                $this->operando=$v;
                
                }
             
                }
         $operand= explode("$this->operando",$operandos[1]);       
             
         $this->OP1= new Racional();
         $this->OP1->valor($operandos[0],$operand[0]);
         $this->OP2= new Racional();
         $this->OP2->valor($operand[1],$operandos[2]);
       
        
    }
    
    
    
    function getOP1() {
        return $this->OP1;
    }

    function getOP2() {
        return $this->OP2;
    }

    function getOperando() {
        return $this->operando;
    }

    function setOP1($OP1) {
        $this->OP1 = $OP1;
    }

    function setOP2($OP2) {
        $this->OP2 = $OP2;
    }

    function setOperando($operando) {
        $this->operando = $operando;
    }
    static public function Validar($operacion){
        if (preg_match("/^\d+\/\d+[+|\-|:|*]\d+\/\d+$/", $operacion)) {
            return 1;
        } elseif (preg_match("/^\d+\/\d+[+|\-|:|*]\d+$/", $operacion)) {
            return  2;
        } elseif (preg_match("/^\d+[+|\-|\/|*]\d+$/", $operacion)) {
           
            return 3;
        } elseif (preg_match("/^\d+[+|\-|:|*]\d+\/\d+$/", $operacion)) {
           
            return 4;
        }
    } 
        
        
        
        
        
        
    }



