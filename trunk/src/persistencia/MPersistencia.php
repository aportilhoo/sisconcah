<?php
/*
 * Created on 04/05/2008
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */


class cPersistencia {
	
	static $instancia = null;
	static $contInstancia = 0;
	var $conexao;
	var $bancodados;

	public static function Instance() {
		if ($this->contInstancia == 0) {
			$this->instancia = new MPersistencia();
		}
		
		$this->contInstancia++;
		return $this->instancia;
	}
	
	public static function Finalize() {
		if ($this->contInstancia > 0) {
			$this->contInstancia--;
			if ($this->contInstancia == 0) {
				$this->__destruct();	
			}
		}
	} 
	
	public function ExecutaSQL($query) {
		$sql = mysql_query($query);
		return $sql; 
	}
	
	private function __construct() {
		$this->Conectar();
		$this->SelecionarBD();
	}

	private function __destruct() {
		$this->Desconectar();
	}
	
	private function Conectar() {
		$this->conexao = mysql_connect("localhost", "", "");
	}

	private function Desconectar() {
		mysql_close($this->conexao);
	}
	
	private function SelecionarBD() {
		$this->db = mysql_select_db("bd");
	}
	
}


?>
