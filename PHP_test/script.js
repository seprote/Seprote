$('document').ready(function(){
	$('window').resize(function(){
		$('body').height($('window').innerHeight);
	});
	
	//GOOGLE CHART
	google.charts.load('current', {'packages':['corechart']}); //charge le paquet "corechart" ainsi que l'API de visualisation
	google.charts.setOnLoadCallback(drawChart); //appelle drawChart() dès que l'API est chargé
	
	
	var chartType = "pie";
	function drawChart() {
		
		// Create the data table.
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Type');
		data.addColumn('number', 'Heures');
		data.addRows([
		  ['heures de CM', 3],
		  ['heures de TD', 9],
		  ['heures de TP', 9],
		]);
		
		// Set chart options
		var options = {'title':'Repartition des heures de cours',
					   'width':600,
					   'height':500};
		
		// Instantiate and draw our chart, passing in some options.
		if(chartType=="pie") {
			var chart = new google.visualization.PieChart(document.getElementById('chart'));
		} else if(chartType=="bar") {
			var chart = new google.visualization.BarChart(document.getElementById('chart'));
		}
		
		chart.draw(data, options);
	}
	
	$('.selection button').click(function(e){
		if(e.currentTarget.className == "tabBtn") {
			
		} else if(e.currentTarget.className == "pieBtn") {
			chartType="pie";
			drawChart();
		} else if(e.currentTarget.className == "barBtn") {
			chartType="bar";
			drawChart();
		}
	});
	
	//CALCUL DE LA DATE DE DEBUT ET DE FIN DE LA SEMAINE
	var curr = new Date; // get current date
	var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
	var last = first + 6; // last day is the first day + 6

	var firstday = new Date(curr.setDate(first+1)).toString();
	var lastday = new Date(curr.setDate(last+1)).toString();

	console.log("debut de la semaine: "+firstday+"; fin: "+lastday);
});