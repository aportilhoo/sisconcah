<?php
/*
 * Created on 04/05/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
function ValidaCPF($cpf) {
	if (strlen($cpf) != 11) {
		return false;
	}
	
    $c = $cpf.substr(0,9);
    $dv = $cpf.substr(9,2);
    $d1 = 0;
    
    for ($i=0; $i<9; $i++) {
        $d1 += $c.charAt($i)*(10-$i);
    }
    
    if ($d1 == 0) {
    	return false;
    }
    
    $d1 = 11 - ($d1 % 11);
    if ($d1 > 9) {
    	$d1 = 0;
    }
    
    if ($dv.charAt(0) != $d1){
        return false;
    }
    
    $d1 *= 2;
    for ($i = 0; $i < 9; $i++) {
         $d1 += $c.charAt($i)*(11-$i);
    }
    
    $d1 = 11 - ($d1 % 11);
    if ($d1 > 9) {
    	$d1 = 0;	
    }
    
    if ($dv.charAt(1) != $d1){
        return false;
    }
    
    return true;
} 	


function ValidaTamanho($campo, $tamMinimo, $tamMaximo) {
	if ($campo < $tamMinimo || $campo > $tamMaximo) {
		return false;
	}

	return true;
}

?>
