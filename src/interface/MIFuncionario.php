<HTML>
<HEAD>
 <TITLE>MI - Funcionário</TITLE>
</HEAD>
<BODY>
<?

/*
  Operacoes
  001 - Cadastramento
  002 - Alteracao
  003 - Exclusao
  004 - Consulta
*/

// Verifica o tipo de operação  a ser realizada
$modulo = $_POST["pModulo"];
$op = $_POST["pTipoOperacao"];
$bEncerra = false;
$sMsgRetorno;
$sBuffer;
$LinkRetorno = ""; // Tela Principal - falta definir

// Verifica consistencia dos dados informados
if ( ValidaCPF($_POST["txCPF"]) == false )
    {
    $bEncerra = true;
    $sMsgRetorno = "CPF inválido";
    }
    
if ( strlen($_POST["txNome"]) == 0 )
    {
    $bEncerra = true;
    $sMsgRetorno += "\nCampo Nome obrigatório";
    }

if ( strlen($_POST["txLogradouro"]) == 0 )
    {
    $bEncerra = true;
    $sMsgRetorno += "\nCampo Logradouro obrigatório";
    }

if ( strlen($_POST["txNumero"]) == 0 )
    {
    $bEncerra = true;
    $sMsgRetorno += "\nCampo Número obrigatório";
    }

if ( strlen($_POST["txBairro"]) == 0 )
    {
    $bEncerra = true;
    $sMsgRetorno += "\nCampo Bairro obrigatório";
    }

if ( strlen($_POST["txCidade"]) == 0 )
    {
    $bEncerra = true;
    $sMsgRetorno += "\nCampo Cidade obrigatório";
    }

if ( strlen($_POST["txEstado"]) == 0 )
    {
    $bEncerra = true;
    $sMsgRetorno += "\nCampo Estado obrigatório";
    }

if ( strlen($_POST["txCep"]) == 0 )
    {
    $bEncerra = true;
    $sMsgRetorno += "\nCampo CEP obrigatório";
    }

if ( strlen($_POST["txSenha"]) == 0 )
    {
    $bEncerra = true;
    $sMsgRetorno += "\nCampo Senha obrigatório";
    }

// Inicia Rotina para tratamento da solicitacao
if ( $bEncerra == false )
    {
    switch $op
           {
           case "001":
           case "002": $sBuffer = "|$_POST["txCPF"]|$_POST["txNome"]|$_POST["txLogradouro"]|$_POST["txNumero"]|$_POST["txBairro"]|$_POST["txCidade"]|$_POST["txEstado"]|$_POST["txCep"]|$_POST["txSenha"]|";
                       break;
           case "003": $sBuffer = "|$_POST["txCPF"]|";
                       break;
           case "004": $sBuffer = "|$_POST["txCPF"]|$_POST["txNome"]|";
                       break;
           }
           
    // Instancia classe do modulo de controle adequado continua com o processamento
    $oMNFuncionario = new cMNFuncionario($op,$sBuffer);
    $sMsgResposta = oMNFuncionario->execute();
    }

if ( strlen($sMsgResposta) >= 0 ) // erro na operacao
    {
    $LinkRetorno = ""; // colocar depois;
    }
else
    {
    $LinkRetorno = ""; // colocar depois;
    }

// Trata Retorno
cTrataResposta("Cadastro de Funcionários", $sMsgRetorno, $LinkRetorno);

?>
</BODY>
</HTML>
