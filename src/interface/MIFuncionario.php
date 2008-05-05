<HTML>
<HEAD>
 <TITLE>Documento PHP</TITLE>
</HEAD>
<BODY>

<?php

echo "In�cio";

include_once("validate.php");
include_once("CrtlFuncionario.php");

/*
  Operacoes
  001 - Cadastramento
  002 - Alteracao
  003 - Exclusao
  004 - Consulta
*/

// Verifica o tipo de opera��o  a ser realizada
$op = $_POST["pTipoOperacao"];
$bEncerra = FALSE;
$sMsgRetorno;
$sBuffer;
$LinkRetorno = ""; // Tela Principal - falta definir

// Verifica consistencia dos dados informados
/*if ( ValidaCPF($_POST["txCPF"]) == FALSE )
    {
    $bEncerra = TRUE;
    $sMsgRetorno = "CPF inv�lido";
    echo "\nCPF inv�lido";
    }*/
    
if ( strlen($_POST["txNome"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Nome obrigat�rio";
    echo "\nCampo Nome obrigat�rio";
    }

if ( strlen($_POST["txLogradouro"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Logradouro obrigat�rio";
    echo "\nCampo Logradouro obrigat�rio";
    }

if ( strlen($_POST["txNumero"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo N�mero obrigat�rio";
    echo "\nCampo N�mero obrigat�rio";
    }

if ( strlen($_POST["txBairro"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Bairro obrigat�rio";
    echo "\nCampo Bairro obrigat�rio";
    }

if ( strlen($_POST["txCidade"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Cidade obrigat�rio";
    echo "\nCampo Cidade obrigat�rio";
    }

if ( strlen($_POST["txEstado"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Estado obrigat�rio";
    echo "\nCampo Estado obrigat�rio";
    }

if ( strlen($_POST["txCep"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo CEP obrigat�rio";
    echo "\nCampo CEP obrigat�rio";
    }

if ( strlen($_POST["pwSenha"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Senha obrigat�rio";
    echo "\nCampo Senha obrigat�rio";
    }


// Inicia Rotina para tratamento da solicitacao
if ( $bEncerra == FALSE )
    {
    echo "\nVai tratar solicita��o";
    if ( $op == "001" || $op == "002" ){
    	echo "\nIncluir ou Excluir";
    	$sBuffer = "'"+$_POST["txCPF"]+"' , '"+
    		           $_POST["txNome"]+"' , '"+ 	   
					   $_POST["txLogradouro"]+"' , '"+
					   $_POST["txNumero"]+"' , '"+
					   $_POST["txBairro"]+"' , '"+
					   $_POST["txCidade"]+"' , '"+
					   $_POST["txEstado"]+"' , '"+
					   $_POST["txCep"]+"' , '"+
					   $_POST["txSenha"]+"'"; 
    } 
    else if ( $op == "003"){
    	$sBuffer = $_POST["txCPF"];
    }
    else if ( $op == "004"){
    	$sBuffer = "'" +$_POST["txCPF"] +"' , '" + $_POST["txNome"]+"'";     	           
    }
           
    // Instancia classe do modulo de controle adequado continua com o processamento
    echo "\nVai instanciar classe";
    $oFuncionario = new cCtrlFuncionario($op,$sBuffer);
    $sMsgResposta = oFuncionario->Execute();
    }

if ( strlen($sMsgResposta) == 0 ) 
    {
    $LinkRetorno = ""; 
    }
else
    {
    $LinkRetorno = ""; 
    } 


if ($bEncerra == FALSE)
	{
	echo "Opera��o efetuada com sucesso";	
	}
else
	{
	echo $sMsgResposta;	
	}

// Trata Retorno
//cTrataResposta("Cadastro de Funcion�rios", $sMsgRetorno, $LinkRetorno);

?>

</BODY>
</HTML>