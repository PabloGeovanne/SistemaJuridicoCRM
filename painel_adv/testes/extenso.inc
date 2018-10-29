<?php

// Cabeçalho Original (Clipper)
// ----------------------------
/*     Nome:  Extenso.prg
      Autor:  Jairo Raiol
       Data:  07/02/95
     Versao:  Clipper 5.01
   Compilar:  Clipper /m /n /v
       Nota:  Esta funcao fornece o valor por extenso.

*/


/********

       Nome:  extenso.inc
      Autor:  Jairo Raiol
       Data:  28/02/2002
  Linguagem:  PHP 4
   Compilar:  -
       Nota:  Esta funcao fornece o valor por extenso.

    Exemplo:  extenso( 12345678.90, "real", "reais", "centavo", "centavos" ) ;

********/


function extenso( $valor, $moedaSing, $moedaPlur, $centSing, $centPlur ) {

   $centenas = array( 0,
       array(0, "cento",        "cem"),
       array(0, "duzentos",     "duzentos"),
       array(0, "trezentos",    "trezentos"),
       array(0, "quatrocentos", "quatrocentos"),
       array(0, "quinhentos",   "quinhentos"),
       array(0, "seiscentos",   "seiscentos"),
       array(0, "setecentos",   "setecentos"),
       array(0, "oitocentos",   "oitocentos"),
       array(0, "novecentos",   "novecentos") ) ;

   $dezenas = array( 0,
            "dez",
            "vinte",
            "trinta",
            "quarenta",
            "cinqüenta",
            "sessenta",
            "setenta",
            "oitenta",
            "noventa" ) ;

   $unidades = array( 0,
            "um",
            "dois",
            "três",
            "quatro",
            "cinco",
            "seis",
            "sete",
            "oito",
            "nove" ) ;

   $excecoes = array( 0,
            "onze",
            "doze",
            "treze",
            "quatorze",
            "quinze",
            "dezeseis",
            "dezesete",
            "dezoito",
            "dezenove" ) ;

   $extensoes = array( 0,
       array(0, "",       ""),
       array(0, "mil",    "mil"),
       array(0, "milhão", "milhões"),
       array(0, "bilhão", "bilhões"),
       array(0, "trilhão","trilhões") ) ;

   $valorForm = trim( number_format($valor,2,".",",") ) ;

   $inicio    = 0 ;

   if ( $valor <= 0 ) {
      return ( $valorExt ) ;
   }

   for ( $conta = 0; $conta <= strlen($valorForm)-1; $conta++ ) {
      if ( strstr(",.",substr($valorForm, $conta, 1)) ) {
         $partes[] = str_pad(substr($valorForm, $inicio, $conta-$inicio),3," ",STR_PAD_LEFT) ;
         if ( substr($valorForm, $conta, 1 ) == "." ) {
            break ;
         }
         $inicio = $conta + 1 ;
      }
   }

   $centavos = substr($valorForm, strlen($valorForm)-2, 2) ;

   if ( !( count($partes) == 1 and intval($partes[0]) == 0 ) ) {
      for ( $conta=0; $conta <= count($partes)-1; $conta++ ) {

         $centena = intval(substr($partes[$conta], 0, 1)) ;
         $dezena  = intval(substr($partes[$conta], 1, 1)) ;
         $unidade = intval(substr($partes[$conta], 2, 1)) ;

         if ( $centena > 0 ) {

            $valorExt .= $centenas[$centena][($dezena+$unidade>0 ? 1 : 2)] . ( $dezena+$unidade>0 ? " e " : "" ) ;
         }

         if ( $dezena > 0 ) {
            if ( $dezena>1 ) {
               $valorExt .= $dezenas[$dezena] . ( $unidade>0 ? " e " : "" ) ;

            } elseif ( $dezena == 1 and $unidade == 0 ) {
               $valorExt .= $dezenas[$dezena] ;

            } else {
               $valorExt .= $excecoes[$unidade] ;
            }

         }

         if ( $unidade > 0 and $dezena != 1 ) {
            $valorExt .= $unidades[$unidade] ;
         }

         if ( intval($partes[$conta]) > 0 ) {
            $valorExt .= " " . $extensoes[(count($partes)-1)-$conta+1][(intval($partes[$conta])>1 ? 2 : 1)] ;
         }

         if ( (count($partes)-1) > $conta and intval($partes[$conta])>0 ) {
            $conta3 = 0 ;
            for ( $conta2 = $conta+1; $conta2 <= count($partes)-1; $conta2++ ) {
               $conta3 += (intval($partes[$conta2])>0 ? 1 : 0) ;
            }

            if ( $conta3 == 1 and intval($centavos) == 0 ) {
               $valorExt .= " e " ;
            } elseif ( $conta3>=1 ) {
               $valorExt .= ", " ;
            }
         }

      }

      if ( count($partes) == 1 and intval($partes[0]) == 1 ) {
         $valorExt .= $moedaSing ;

      } elseif ( count($partes)>=3 and ((intval($partes[count($partes)-1]) + intval($partes[count($partes)-2]))==0) ) {
         $valorExt .= " de " + $moedaPlur ;

      } else {
         $valorExt = trim($valorExt) . " " . $moedaPlur ;
      }

   }

   if ( intval($centavos) > 0 ) {

      $valorExt .= (!empty($valorExt) ? " e " : "") ;

      $dezena  = intval(substr($centavos, 0, 1)) ;
      $unidade = intval(substr($centavos, 1, 1)) ;

      if ( $dezena > 0 ) {
         if ( $dezena>1 ) {
            $valorExt .= $dezenas[$dezena] . ( $unidade>0 ? " e " : "" ) ;

         } elseif ( $dezena == 1 and $unidade == 0 ) {
            $valorExt .= $dezenas[$dezena] ;

         } else {
            $valorExt .= $excecoes[$unidade] ;
         }

      }

      if ( $unidade > 0 and $dezena != 1 ) {
         $valorExt .= $unidades[$unidade] ;
      }

      $valorExt .= " " . ( intval($centavos)>1 ? $centPlur : $centSing ) ;

   }

   return ( $valorExt ) ;

}

// Fim do Arquivo
?>
