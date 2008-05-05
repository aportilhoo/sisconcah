<HTML>
<HEAD>
 <TITLE>Documento PHP</TITLE>
</HEAD>
<BODY>

<?php

include_once("Crtl.php");

class cCtrlFuncionario extends cCtrl{

    public function __construct($op,$sBuffer){
    	parent::__construct($op,$sBuffer);
    }

	protected function Cadastrar(){
		
		$this->sCmdSQL = "INSERT INTO 'funcionario' VALUES ($sBuffer)";
		ExecutarComandoSQL();		
		
	}
	
	protected function Alterar(){
		
	}
	protected function Consultar(){
		
	}
	
	protected function Excluir(){
		
	}
}

?>
</BODY>
</HTML>
