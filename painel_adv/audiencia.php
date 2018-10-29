<?php 
include_once("config2.php");
include_once("../sessao/sessao.php");
?>
<?php
        $sqli = "SELECT * FROM advogads WHERE oab = '$_SESSION[oab]' AND senha = '$_SESSION[senha]' LIMIT 1";
        $sqli_result = mysqli_query($mysqli, $sqli);
        $resultado = mysqli_fetch_assoc($sqli_result);
	
		$id_adv   = $resultado['id'];

$consulta3 = "SELECT *, TIME_FORMAT(horas_audiencia, '%H:%i') AS horas_audiencia, DATE_FORMAT(data_audiencia, '%Y-%m-%d') AS data_audiencia, arquivo.id AS arq_id FROM arquivo 
INNER JOIN advogads ON (arquivo.adv_pasta_id = advogads.id) 
WHERE arquivo.adv_pasta_id = '$id_adv'
ORDER BY arquivo.pasta_n ASC";
$conexao3 = $mysqli->query($consulta3) or die($mysqli->error);

$consulta1 = "SELECT *, TIME_FORMAT(start_h, '%H:%i') AS start_h, TIME_FORMAT(and_h, '%H:%i') AS and_h, DATE_FORMAT(start_d, '%Y-%m-%d') AS start_d, DATE_FORMAT(and_d, '%Y-%m-%d') AS and_d, agendamentos.id AS agenda_id FROM agendamentos 
INNER JOIN advogads ON (agendamentos.adv_id = advogads.id) 
WHERE agendamentos.adv_id = '$id_adv'
ORDER BY agendamentos.id ASC";
$conexao1 = $mysqli->query($consulta1) or die($mysqli->error);

?>
<html>
<head>
<meta charset="utf-8">
<title>Agendamentos < Inicial Trabalhista</title>
<link href='css/bootstrap.css' rel='stylesheet' />
<link href='calendar/fullcalendar.css' rel='stylesheet' />
<link href='calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='calendar/jquery/jquery-1.10.2.js'></script>
<script src='calendar/jquery/jquery-ui.custom.min.js'></script>
	<script src='calendar/fullcalendar.js'></script>
<script type="text/javascript">
	$(document).ready(function() {
	    var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		/*  className colors
		className: default(transparent), important(red), chill(pink), success(green), info(blue)
		*/
		/* initialize the external events
		-----------------------------------------------------------------*/
		$('#external-events div.external-event').each(function() {
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
		});
		/* initialize the calendar
		-----------------------------------------------------------------*/
		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'agendaDay,agendaWeek,month',
				right: 'prev,next today'
			},
			editable: true,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			defaultView: 'month',
			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped
				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');
				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);
				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;
				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
			},
			events: [
				
				<?php while($dado3 = $conexao3->fetch_array()){ ?>
				{
id: '<?php echo $dado3["arq_id"]; ?>',
title: '<?php echo $dado3["parte_1"]; ?>',
start: new Date(<?php echo date("Y", strtotime($dado3["data_audiencia"])); ?>, <?php echo date("m", strtotime($dado3["data_audiencia"])); ?>-1, <?php echo date("d", strtotime($dado3["data_audiencia"])); ?>, <?php echo date("H", strtotime($dado3["horas_audiencia"])); ?>, <?php echo date("i", strtotime($dado3["horas_audiencia"])); ?>),
					
url: 'edit_arq.php?p=editar&arquivo=<?php echo $dado3["arq_id"]; ?>',
allDay: false,
className: 'important'
				},
				<?php } ?>
				<?php while($dado1 = $conexao1->fetch_array()){ ?>
				{
id: <?php echo $dado1["agenda_id"]; ?>,
title: '<?php echo $dado1["comarca"]; ?> <?php echo $dado1["vara"]; ?>ª Vara - <?php echo $dado1["parte1"]; ?>',
start: new Date(<?php echo date("Y", strtotime($dado1["start_d"])); ?>, <?php echo date("m", strtotime($dado1["start_d"])); ?>-1, <?php echo date("d", strtotime($dado1["start_d"])); ?>, <?php echo date("H", strtotime($dado1["start_h"])); ?>, <?php echo date("i", strtotime($dado1["start_h"])); ?>),
end: new Date(<?php echo date("Y", strtotime($dado1["and_d"])); ?>, <?php echo date("m", strtotime($dado1["and_d"])); ?>-1, <?php echo date("d", strtotime($dado1["and_d"])); ?>, <?php echo date("H", strtotime($dado1["and_h"])); ?>, <?php echo date("i", strtotime($dado1["and_h"])); ?>),
allDay: <?php echo $dado1["allday"]; ?>,
url: 'edit_eventos.php?p=editar&evento=<?php echo $dado1["agenda_id"]; ?>',
className: 'success'
				},
				<?php } ?>
				/*{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false,
					className: 'info'
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false,
					className: 'important'
				},
				{
					title: 'Lunch',
					start: new Date(2018, 07-1, 05, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false,
					className: 'important'
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false,
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/',
					className: 'success'
				}*/
				   

			],
		});
	});
</script>
<style type="text/css">
	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Helvetica Nueue",Arial,Verdana,sans-serif;
		background-color: #DDDDDD;
		}

	#wrap {
		width: 1100px;
		margin: 0 auto;
		margin-bottom: 20px;
		}		

	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
		}		

	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
		}		

	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		}		

	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
		}		

	#external-events p input {
		margin: 0;
		vertical-align: middle;
		}
	#calendar {
/* 		float: right; */
        margin: 0 auto;
		width: 900px;
		background-color: #FFFFFF;
		  border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
		}
	
	#footer {
	background-color: #f5f5f5;
	text-align:left;
}
	/* Lastly, apply responsive CSS fixes as necessary */
	#footer {
	margin-left: -20px;
	margin-right: 0px;
	padding-left: 0px;
	padding-right: 0px;
}
	/* Custom page CSS */
	-------------------------------------------------- 
	/* Not required for template or sticky footer method.*/

	.cuadro_intro_hover{
        padding: 0px;
		position: relative;
		overflow: hidden;
		height: 200px;
	}
	.cuadro_intro_hover:hover .caption{
		opacity: 1;
		transform: translateY(-150px);
		-webkit-transform:translateY(-150px);
		-moz-transform:translateY(-150px);
		-ms-transform:translateY(-150px);
		-o-transform:translateY(-150px);
	}
	.cuadro_intro_hover img{
		z-index: 4;
	}
	.cuadro_intro_hover .caption{
		position: absolute;
		top:150px;
		-webkit-transition:all 0.3s ease-in-out;
		-moz-transition:all 0.3s ease-in-out;
		-o-transition:all 0.3s ease-in-out;
		-ms-transition:all 0.3s ease-in-out;
		transition:all 0.3s ease-in-out;
		width: 100%;
	}
	.cuadro_intro_hover .blur{
		background-color: rgba(0,0,0,0.7);
		height: 300px;
		z-index: 5;
		position: absolute;
		width: 100%;
	}
	.cuadro_intro_hover .caption-text{
		z-index: 10;
		color: #fff;
		position: absolute;
		height: 300px;
		text-align: center;
		top:-20px;
		width: 100%;
	}
	
</style>
</head>
<body>
<div class="table" id='wrap'>
<div id='calendar'></div>
<div style='clear:both'></div>
</div>
<div id="footer">
    <div class="container">
<div id="footer">
    <div class="container">
        <div class="row">
            <h3 class="footertext">Menu:</h3>
            <br>
              <div class="col-md-4">
                <center>
                  <a href="../../index.php">
                  <img src="http://inicialtrabalhista.com/wp-content/uploads/2017/08/Graphicloads-100-Flat-Home.ico" class="img-circle" width="100" height="100" alt="...">
				  </a>
                  <br>
                  <h4 class="footertext">Home</h4>
				  <p class="footertext">Acesse ao <b>blog/site</b> <u>inicialtrabalhista.com</u>.<br>
                </center>
              </div>
              <div class="col-md-4">
                <center>
                  <a href="../index.php">
                  <img src="http://inicialtrabalhista.com/wp-content/uploads/2017/08/Paomedia-Small-N-Flat-Dashboard.ico" class="" width="100" height="100" alt="...">
				  </a>
                  <br>
                  <h4 class="footertext">Dashboard</h4>
				  <p class="footertext">Volte ao <b>Painel de Controle</b> dos usuários.<br>
                </center>
              </div>
              <div class="col-md-4">
                <center>
                  <a href="../../contato">
                  <img src="http://inicialtrabalhista.com/wp-content/uploads/2017/08/contact-envelope.png" class="img-circle" width="100" height="100" alt="...">
				  </a>
                  <br>
                  <h4 class="footertext">Contato</h4>
				  <p class="footertext"><b>Duvidas ou sugestões</b>? entre em contato conosco!<br>
                </center>
              </div>
            </div>
            <div class="row">
            <p><center><a href="http://inicialtrabalhita.com">Inicial Trabalhista.com</a> <p class="footertext">Inicial Trabalhista © Copyright 2017</p></center></p>
        </div>
    </div>
</div>
    </div>
</div>
</body>
</html>

