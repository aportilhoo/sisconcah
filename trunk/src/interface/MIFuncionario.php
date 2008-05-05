<HTML>
<HEAD>
 <TITLE>Documento PHP</TITLE>
</HEAD>
<BODY>

<?php

echo "Início";

include_once("validate.php");
include_once("CrtlFuncionario.php");

/*
  Operacoes
  001 - Cadastramento
  002 - Alteracao
  003 - Exclusao
  004 - Consulta
*/

// Verifica o tipo de operação  a ser realizada
$op = $_POST["pTipoOperacao"];
$bEncerra = FALSE;
$sMsgRetorno;
$sBuffer;
$LinkRetorno = ""; // Tela Principal - falta definir

// Verifica consistencia dos dados informados
/*if ( ValidaCPF($_POST["txCPF"]) == FALSE )
    {
    $bEncerra = TRUE;
    $sMsgRetorno = "CPF inválido";
    echo "\nCPF inválido";
    }*/
    
if ( strlen($_POST["txNome"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Nome obrigatório";
    echo "\nCampo Nome obrigatório";
    }

if ( strlen($_POST["txLogradouro"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Logradouro obrigatório";
    echo "\nCampo Logradouro obrigatório";
    }

if ( strlen($_POST["txNumero"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Número obrigatório";
    echo "\nCampo Número obrigatório";
    }

if ( strlen($_POST["txBairro"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Bairro obrigatório";
    echo "\nCampo Bairro obrigatório";
    }

if ( strlen($_POST["txCidade"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Cidade obrigatório";
    echo "\nCampo Cidade obrigatório";
    }

if ( strlen($_POST["txEstado"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Estado obrigatório";
    echo "\nCampo Estado obrigatório";
    }

if ( strlen($_POST["txCep"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo CEP obrigatório";
    echo "\nCampo CEP obrigatório";
    }

if ( strlen($_POST["pwSenha"]) == 0 )
    {
    $bEncerra = TRUE;
    $sMsgRetorno += "\nCampo Senha obrigatório";
    echo "\nCampo Senha obrigatório";
    }


// Inicia Rotina para tratamento da solicitacao
if ( $bEncerra == FALSE )
    {
    echo "\nVai tratar solicitação";
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
	echo "Operação efetuada com sucesso";	
	}
else
	{
	echo $sMsgResposta;	
	}

// Trata Retorno
//cTrataResposta("Cadastro de Funcionários", $sMsgRetorno, $LinkRetorno);

?>

</BODY>
</HTML>