function ajaxOK(data)
{
	var heures = data.split(';');

	$('#cmm').val(heures[0]);
	$('#tdd').val(heures[1]);
	$('#tpp').val(heures[2]);

}

function cmOK(data)
{
	if(data < 0){
		alert('Erreur !');
	}
	else{
		$('.cm').html(data);
	}
	
	$('.total').html(parseInt($('.cm').text()) + parseInt($('.td').text()) + parseInt($('.tp').text()));

}

function tpOK(data)
{
	if(data < 0){
		alert('Erreur !');
	}
	else{
		$('.tp').html(data);
	}

	$('.total').html(parseInt($('.cm').text()) + parseInt($('.td').text()) + parseInt($('.tp').text()));
}

function tdOK(data)
{
	if(data < 0){
		alert('Erreur !');
	}
	else{
		$('.td').html(data);
	}
	
	$('.total').html(parseInt($('.cm').text()) + parseInt($('.td').text()) + parseInt($('.tp').text()));
}

function insertok(data){

	console.log(data);

}

$('document').ready(function(){

	//AJAX section
	$('#prof').change(function() {
		var params = "prof="+$('#prof').val()+"&mod="+$('#mod').val();
		$.ajax({
			type: 'POST',
			url: 'ajax.php',
			data: params,
			success: ajaxOK
			});
		});

	$('#mod').change(function() {
		var params = "prof="+$('#prof').val()+"&mod="+$('#mod').val();
		$.ajax({
			type: 'POST',
			url: 'ajax.php',
			data: params,
			success: ajaxOK
			});
		});

	
	$('#cmm').on("change paste keyup",function(){

		if($('#cmm').val() >= 0)
		{
			var params = "prof="+$('#prof').val()+"&mod="+$('#mod').val()+"&cm="+$('#cmm').val();

			$.ajax({
				type: 'POST',
				url: 'cm.php',
				data: params,
				success: cmOK
				});
		}
		else alert('Veuillez mettre un nombre positif');
	});

	$('#tdd').on("change paste keyup",function() {
		var params = "prof="+$('#prof').val()+"&mod="+$('#mod').val()+"&td="+$('#tdd').val();
		$.ajax({
			type: 'POST',
			url: 'td.php',
			data: params,
			success: tdOK
			});
		});


	$('#tpp').on("change paste keyup",function() {
		var params = "prof="+$('#prof').val()+"&mod="+$('#mod').val()+"&tp="+$('#tpp').val();
		$.ajax({
			type: 'POST',
			url: 'tp.php',
			data: params,
			success: tpOK
			});
		});


	$('#butval').click(function(e){
		e.preventDefault();
		var params = "prof="+$('#prof').val()+"&mod="+$('#mod').val()+"&cm="+$('#cmm').val()+"&td="+$('#tdd').val()+"&tp="+$('#tpp').val();
		$.ajax({
			type: 'POST',
			url: 'valider.php',
			data: params,
			success: insertok
		});
	});
	//fin AJAX section









	$('window').resize(function(){
		$('body').height($('window').innerHeight);
	});
	
	var eventList = [
		{
			title  : 'Math',
			color : '#003366',
			start  : '2017-03-09T08:30:00',
			end  : '2017-03-09T10:00:00'
		},
		{
			title  : 'Java',
			color : '#336600',
			start  : '2017-03-09T10:00:00',
			end  : '2017-03-09T11:30:00'
		},
	];
	
	//CALENDAR OPTIONS
	$('#calendar').fullCalendar({
		locale: 'fr',
		height: 'auto',
		header: {
			left: 'prev,next today title',
			center: '',
			right: 'month,agendaWeek,agendaDay'
		},
		weekNumberCalculation: 'ISO',
		defaultView: 'agendaWeek',
		weekNumbers: true,
		displayEventTime: true,
		allDayDefault: false,
		minTime: "08:00:00",
		maxTime: "19:00:00",
		
		events: eventList
	});
	
	
	//BUTTON STYLING
	$('button').click(function(){
		$(this).parent().children('button').removeClass("btnActive");
		$(this).addClass("btnActive");
	});
   	$("input[type='button']").click(function(){
		$(this).parent().children("input[type='button']").removeClass("btnActive");
		$(this).addClass("btnActive");
	});
	
	$('.pieBtn').click();
});
