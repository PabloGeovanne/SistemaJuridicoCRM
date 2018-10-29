<div hidden>
<?php
include '../../sessao/sessao.php';
?>
</div>
<!doctype html>
<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head>
<meta charset="utf-8">
<title>Petição Inicial - <?php echo htmlspecialchars($_POST['nomecompleto']); ?></title>


    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    
		<script src="../js/tinymce/js/tinymce/tinymce.min.js"></script>
        <script src="vendor/FileSaver.js"></script>
        <script src="vendor/html-docx.js"></script>
		<script type="text/javascript" src="../js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
        
        
</head>
<body>
<textarea class="content" id="content" cols="60" rows="21"> 
<div style="margin-left:15%;margin-right:15%;">
    <div id="titulo_head" style="font-family:Monotype Corsiva;font-size:26px;text-align:center;font-weight:bold;">
        <p style="text-transform:uppercase;">DR <?php echo htmlspecialchars($_POST['adv_nome']); ?> <?php echo htmlspecialchars($_POST['adv_sobre_nome']); ?></p>          
        <p>Advogado</p>
    </div>
    
    <div style="font-weight:bold;font-size:16px;font-family:Book Antiqua;text-align:justify;">
        <p style="text-transform:uppercase;">EXCELENTÍSSIMO SENHOR DOUTOR JUIZ DA ª VARA DO TRABALHO DA COMARCA DE <?php echo htmlspecialchars($_POST['comarca_city']); ?>.</p>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div>
		<?php echo htmlspecialchars($_POST['aba1_ddsgeral']); ?>
		<?php echo htmlspecialchars($_POST['aba1.2_responsub_01']); ?>
            <table style="margin-right:auto; margin-left:auto;width:650px;height:33px;background-color:#CCCCCC;border-color:#000000;border:1px solid;bordercolor:#000000;">
            <tbody>
            <tr>
            <td style="text-align: center;">
            <p style=""><strong>DO CONTRATO DE TRABALHO</strong></p>
            </td>
            </tr>
            </tbody>
            </table>
		<?php echo htmlspecialchars($_POST['aba2_contrab_01']); ?>
        <?php echo htmlspecialchars($_POST['aba2_contrab_02']); ?>
        <?php echo htmlspecialchars($_POST['aba2_contrab_03']); ?>
        <?php echo htmlspecialchars($_POST['aba2_contrab_04']); ?>
        <?php echo htmlspecialchars($_POST['aba2_contrab_05']); ?>
        <?php echo htmlspecialchars($_POST['aba2_contrab_06']); ?>
            <table style="margin-right:auto; margin-left:auto;width:650px;height:33px;background-color:#CCCCCC;border-color:#000000;border:1px solid;bordercolor:#000000;">
            <tbody>
            <tr>
            <td style="text-align: center;">
            <p style=""><strong>DAS FUNÇÕES EXERCIDAS</strong></p>
            </td>
            </tr>
            </tbody>
            </table>
		 <?php echo htmlspecialchars($_POST['aba3_dasfuncao_01']); ?>
		 <?php echo htmlspecialchars($_POST['aba3_dasfuncao_02']); ?>
		 <?php echo htmlspecialchars($_POST['aba3_dasfuncao_03']); ?>
		<?php echo htmlspecialchars($_POST['aba4_lei7238/84_01']); ?>
		<?php echo htmlspecialchars($_POST['aba5_pgfora_01']); ?>
		<?php echo htmlspecialchars($_POST['aba1_3_desvio_acumulo_01']); ?>
		<?php echo htmlspecialchars($_POST['aba1_3_desvio_acumulo_02']); ?>
		<?php echo htmlspecialchars($_POST['aba24_equiparacao_01']); ?>
		<?php echo htmlspecialchars($_POST['aba25_plr_01']); ?>
		<?php echo htmlspecialchars($_POST['aba6_jornadatrab_01']); ?>
        <?php echo htmlspecialchars($_POST['aba7_hrsextraord_01']); ?>
        <?php echo htmlspecialchars($_POST['aba32_hrsdomferiados_01']); ?>
        <?php echo htmlspecialchars($_POST['aba8_integracoes_01']); ?>
        <?php echo htmlspecialchars($_POST['aba29_hrsnoturnareduzida_01']); ?>
        <?php echo htmlspecialchars($_POST['aba30_hrsnoturna_01']); ?>
        <?php echo htmlspecialchars($_POST['aba31_hrsnoturnareduzida_01']); ?>
        <?php echo htmlspecialchars($_POST['aba21_insalubridade_01']); ?>
        <?php echo htmlspecialchars($_POST['aba22_periculosidade_01']); ?>
        <?php echo htmlspecialchars($_POST['aba22_periculosidade_02']); ?>
        <?php echo htmlspecialchars($_POST['aba9_verbasrecisorias_01']); ?>
        <?php echo htmlspecialchars($_POST['aba32_adctranfer_01']); ?>
        <?php echo htmlspecialchars($_POST['aba10_fgts_01']); ?>
        <?php echo htmlspecialchars($_POST['aba11_art467_01']); ?>
        <?php echo htmlspecialchars($_POST['aba27_valerefeição_01']); ?>
        <?php echo htmlspecialchars($_POST['aba28_cestabasica_01']); ?>
        <?php echo htmlspecialchars($_POST['aba33_descontoindevido_01']); ?>
        <?php echo htmlspecialchars($_POST['aba12_compensacao_01']); ?>
        <?php echo htmlspecialchars($_POST['aba19_dano_moral_01']); ?>
        <?php echo htmlspecialchars($_POST['aba13_indeseguro_01']); ?>
        <?php echo htmlspecialchars($_POST['aba14_perdadanos404_01']); ?>
        <?php echo htmlspecialchars($_POST['aba15_jusgratuita_01']); ?>
        <?php echo htmlspecialchars($_POST['aba16_expoficios_01']); ?>   
        
        
        <!-- verbas a receber -->
        <?php echo htmlspecialchars($_POST['aba100_verbasliquidas_01']); ?>
        <?php echo htmlspecialchars($_POST['aba20_pleteiainda_01']); ?>
        <?php echo htmlspecialchars($_POST['aba21_requerimentos_01']); ?>
</div>

</div>        
        
    </div>
</div>
<br>
  </textarea>
  <div class="page-orientation">
    <span>Orientação de pagina:</span>
    <label><input type="radio" name="orientation" value="portrait" checked>Retrato</label>
    <label><input type="radio" name="orientation" value="landscape">Paissagem</label>
<div style="margin-top:20px;position:absolute;margin-left:45%;" class="fb-like" data-href="https://inicialtrabalhista.com" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true">
</div>
  </div>
  <button class="btn btn-primary" id="convert"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Baixar para word</button>
  <div id="download-area"></div>
<br><br>
<div id="fb-root"></div>
<script type="text/javascript">
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script>
    tinymce.init({
      selector: '.content',
      plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen fullpage",
        "insertdatetime media table contextmenu paste"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | " +
        "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | " +
        "link image"
    });
    document.getElementById('convert').addEventListener('click', function(e) {
      e.preventDefault();
      convertImagesToBase64()
      // for demo purposes only we are using below workaround with getDoc() and manual
      // HTML string preparation instead of simple calling the .getContent(). Becasue
      // .getContent() returns HTML string of the original document and not a modified
      // one whereas getDoc() returns realtime document - exactly what we need.
      var contentDocument = tinymce.get('content').getDoc();
      var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;
      var orientation = document.querySelector('.page-orientation input:checked').value;
      var converted = htmlDocx.asBlob(content, {orientation: orientation});

      saveAs(converted, 'petição_inicial-<?php echo htmlspecialchars($_POST['nomecompleto']); ?>.docx');

      var link = document.createElement('a');
      link.href = URL.createObjectURL(converted);
      link.download = 'document.docx';
      link.appendChild(
        document.createTextNode('Click here if your download has not started automatically'));
      var downloadArea = document.getElementById('download-area');
      downloadArea.innerHTML = '';
      downloadArea.appendChild(link);
    });

    function convertImagesToBase64 () {
      contentDocument = tinymce.get('content').getDoc();
      var regularImages = contentDocument.querySelectorAll("img");
      var canvas = document.createElement('canvas');
      var ctx = canvas.getContext('2d');
      [].forEach.call(regularImages, function (imgElement) {
        // preparing canvas for drawing
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        canvas.width = imgElement.width;
        canvas.height = imgElement.height;

        ctx.drawImage(imgElement, 0, 0);
        // by default toDataURL() produces png image, but you can also export to jpeg
        // checkout function's documentation for more details
        var dataURL = canvas.toDataURL();
        imgElement.setAttribute('src', dataURL);
      })
      canvas.remove();
    }
  </script>
</body>
</html>