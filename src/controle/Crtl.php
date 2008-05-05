<HTML>
<HEAD>
 <TITLE>Documento PHP</TITLE>
</HEAD>
<BODY>
<?php

abstract class cCtrl {

	protected $sTipoOperacao;
	protected $sCmdSql;
	protected $sBuffer;

	protected function __construct($op,$sBuffer){
		$this->sTipoOperacao = $op;
		$this->sBuffer = $sBuffer;		
		$this->sCmdSql = "";
	}


	public function Execute(){
		
		$sMsgRetorno = "";	
	
		switch ($this->sTipoOperacao){
        	case "001": $sMsgRetorno = $this->Cadastrar(); break;
        	case "002": $sMsgRetorno = $this->Alterar(); break;
        	case "003": $sMsgRetorno = $this->Excluir(); break;
        	case "004": $sMsgRetorno = $this->Consultar(); break;
        	default: $sMsgRetorno = "Parâmetro Inválido";
        	}

		return $sMsgRetorno;

	}
		
	abstract protected function Cadastrar();
	abstract protected function Alterar();
	abstract protected function Consultar();
	abstract protected function Excluir();
	protected function ExecutarComandoSQL(){
		
		$oPersistencia = cPersistencia::Instance();
	
		if ( !$oPersistencia ) {
			return "Erro na conexão com o Banco de Dados";
		}
	
    	return ($oPersistencia->ExecutaSQL($this->sCmdSql));
	}

	
}

?>
</BODY>
</HTML>
