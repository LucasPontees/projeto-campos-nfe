<?php

namespace app\models\service;

use InvalidArgumentException;
use app\core\Controller;
use app\models\service\DadosService;
use app\models\service\IcmsService;
use app\models\service\IpiService;
use app\models\service\PisCofinsService;
use NFePHP\Common\Certificate;
use NFePHP\NFe\Common\Standardize;
use NFePHP\NFe\Complements;
use NFePHP\NFe\Make;
use NFePHP\NFe\Tools;
use stdClass;

class NfeService
{
    public static function gerar()
    {
        $nfe = new Make();
        $std = new stdClass();
        $std->versao = '4.00'; //versão do layout (string)
        $std->Id = ''; //se o Id de 44 digitos não for passado será gerado automaticamente
        $std->pk_nItem = null; //deixe essa variavel sempre como NULL

        $nfe->taginfNFe($std);

        $std = new stdClass();
        $std->cUF = 35; // Código da UF (string)
        $std->cNF = '80070008'; // NUMERO DE IDENTIFICACAO DA NOTA FISCAL (string)
        $std->natOp = 'VENDA'; // NATUREZA DA OPERACAO (string)

        $std->indPag = 0; //NÃO EXISTE MAIS NA VERSÃO 4.00

        $std->mod = 55; // MODELO DE DOCUMENTO FISCAL
        $std->serie = 1;  // SERIE (string)
        $std->nNF = 2; // UTILIZADO PARA CONTROLE E REFERENCIA
        $std->dhEmi = '2015-02-19T13:48:00-02:00'; // DATA E HORA DE EMISSÃO (string)
        $std->dhSaiEnt = null; // DATA E HORA DE SAIDA OU ENTRADA (string)
        $std->tpNF = 1; // TIPO DA OPERACAO DA NOTA FISCAL (string) ENTRADA =  0 E SAIDA = 1
        $std->idDest = 1; // IDENTIFICACAO DO DESTINATARIO (string) 1 = EMITENTE, 2 = DESTINATARIO
        $std->cMunFG = 3518800; // CODIGO DO MUNICIPIO DE ENTREGA (string)
        $std->tpImp = 1; // TIPO DE IMPRESSAO (string) 1 = NORMAL, 2 = RETRATO
        $std->tpEmis = 1; // TIPO DE EMISSÃO (string) 1 = NORMAL, 3 = CONTINGENCIA
        $std->cDV = 2; // DIGITO VERIFICADOR DA CHAVE DE ACESSO (string)
        $std->tpAmb = 2; // AMBIENTE DE TRABALHO (string) 1 = PRODUCAO, 2 = HOMOLOGACAO
        $std->finNFe = 1; //
        $std->indFinal = 0; //
        $std->indPres = 0; //
        $std->indIntermed = null; //
        $std->procEmi = 0; //
        $std->verProc = '3.10.31'; //
        $std->dhCont = null; //
        $std->xJust = null; //

        $nfe->tagide($std);
    }

    public static function assinar() {}

    public static function enviar() {}



























    public static function danfe()
    {
        $logo = '';
        $path = "arquivos/xml/13027524000118/homologacao/autorizadas/2023/03/30/21230313027524000118552000000009511689642484-nfe.xml";
        $xml = file_get_contents($path);
        //$logo = 'data://text/plain;base64,'. base64_encode(file_get_contents(realpath(__DIR__ . '/../images/tulipas.png')));
        //$logo = realpath(__DIR__ . '/../images/tulipas.png');

        try {

            $danfe = new Danfe($xml);
            $danfe->exibirTextoFatura = false;
            $danfe->exibirPIS = false;
            $danfe->exibirIcmsInterestadual = false;
            $danfe->exibirValorTributos = false;
            $danfe->descProdInfoComplemento = false;
            $danfe->setOcultarUnidadeTributavel(true);
            $danfe->obsContShow(false);
            $danfe->printParameters(
                $orientacao = 'P',
                $papel = 'A4',
                $margSup = 2,
                $margEsq = 2
            );
            $danfe->logoParameters($logo, $logoAlign = 'C', $mode_bw = false);
            $danfe->setDefaultFont($font = 'times');
            $danfe->setDefaultDecimalPlaces(4);
            $danfe->debugMode(false);
            $danfe->creditsIntegratorFooter('WEBNFe Sistemas - http://www.webenf.com.br');
            //$danfe->epec('891180004131899', '14/08/2018 11:24:45'); //marca como autorizada por EPEC

            // Caso queira mudar a configuracao padrao de impressao
            /*  $this->printParameters( $orientacao = '', $papel = 'A4', $margSup = 2, $margEsq = 2 ); */
            // Caso queira sempre ocultar a unidade tributável
            /*  $this->setOcultarUnidadeTributavel(true); */
            //Informe o numero DPEC
            /*  $danfe->depecNumber('123456789'); */
            //Configura a posicao da logo
            /*  $danfe->logoParameters($logo, 'C', false);  */
            //Gera o PDF
            $pdf = $danfe->render($logo);
            header('Content-Type: application/pdf');
            echo $pdf;
        } catch (InvalidArgumentException $e) {
            echo "Ocorreu um erro durante o processamento :" . $e->getMessage();
        }
    }
}
