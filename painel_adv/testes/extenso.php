<?
/*
    extenso.php
    Copyright (C) 2002 Lyma

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.

    Lyma (lyma@lymas.com)
    http://lymas.com

    Esta função recebe um valor numérico e retorna uma string contendo o
    valor de entrada por extenso.
    entrada: $valor (use ponto para centavos.)
    Ex.:

    echo extenso("12428.12"); //retorna: doze mil, quatrocentos e vinte e oito reais e doze centavos

    ou use:
    echo extenso("12428.12", true); //esta linha retorna: Doze Mil, Quatrocentos E Vinte E Oito Reais E Doze Centavos

    saída..: string com $valor por extenso em reais e pode ser com iniciais em maiúsculas (true) ou não.


Changelog: Author: Rodrigo (rodrigo.bc@uol.com.br) Um pequeno detalhe nessa excelente função...
Em vez de imprimir no caso: Doze Mil, Quatrocentos E Vinte E Oito Reais E Doze Centavos.
              esta imprimi: Doze Mil, Quatrocentos e Vinte e Oito Reais e Doze Centavos.

          É Muito Mais Bonito, Não?

Rodrigo (rodrigo.bc@uol.com.br)


Changelog: Author: Alessandro Lima (mutana3@yahoo.com.br)

Acrecentei e modifiquei a função para que a mesma imprima em caixa alta e baixa eliminando o problema do strtolower e strtoupper que não funcionam em caracteres com acento .

O código original (1.0) já era muito bom .

Alessandro
*/

echo extenso("4060,20",1,$caixa="alta");

function extenso($valor=0,$tipo=0,$caixa="alta") {
    
    $valor = strval($valor);
    $valor = str_replace(",",".",$valor);

    if($tipo==1){
    
    
    $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
    $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões",
    "quatrilhões");
    }else{
    
    $pos   = strpos($valor,".");
    $valor = substr($valor,0,$pos);
    
    $singular = array("", "", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
    $plural = array("", "", "mil", "milhões", "bilhões", "trilhões",
    "quatrilhões");
    }
    

    $c = array("", "cem", "duzentos", "trezentos", "quatrocentos",
"quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
    $d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta",
"sessenta", "setenta", "oitenta", "noventa");
    $d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze",
"dezesseis", "dezesete", "dezoito", "dezenove");
    $u = array("", "um", "dois", "três", "quatro", "cinco", "seis",
"sete", "oito", "nove");

    $z=0;

    $valor = number_format($valor, 2, ".", ".");
    $inteiro = explode(".", $valor);
    for($i=0;$i<count($inteiro);$i++)
        for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
            $inteiro[$i] = "0".$inteiro[$i];

    $fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
    for ($i=0;$i<count($inteiro);$i++) {
        $valor = $inteiro[$i];
        $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
        $rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
        $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

        $r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
$ru) ? " e " : "").$ru;
        $t = count($inteiro)-1-$i;
        $r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
        if ($valor == "000")$z++; elseif ($z > 0) $z--;
        if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
        if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? " e " : " e ") : " ") . $r;
    }
    
    if($caixa=="alta"){
    $rt = strtoupper($rt);
    }
    $maiusculas = array("Á","À","Â","Ã","É","Ê","Í","Ó","Ô","Õ","Ú","Û");
    $minusculas = array("á","à","â","ã","é","ê","í","ó","ô","õ","ú","û");
    
    
    for($i=0;$i<count($maiusculas);$i++){
    
        $rt = ereg_replace($minusculas[$i],$maiusculas[$i],$rt);	
    }     
    
    return $rt;                      
        
}

?> 