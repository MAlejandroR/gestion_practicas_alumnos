<?php

class OperacionReal extends Operacion{
    
    public function __construct($operacion) {
        parent::__construct($operacion);
    }

    public function div($r1,$r2) {
        parent::setOp1($r1);
        parent::setOp2($r2);
        $rtdo = $r1 / $r2;
        return $rtdo;
    }

    public function multi($r1,$r2) {
        parent::setOp1($r1);
        parent::setOp2($r2);
        $rtdo = $r1 * $r2;
        return $rtdo;
    }

    public function restar($r1,$r2) {
        parent::setOp1($r1);
        parent::setOp2($r2);
        $rtdo = $r1 - $r2;
        return $rtdo;
    }

    public function sumar($r1,$r2) {
        parent::setOp1($r1);
        parent::setOp2($r2);
        $rtdo = $r1 + $r2;
        return $rtdo;
    }

}
