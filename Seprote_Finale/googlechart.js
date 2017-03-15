$(document).ready(function(){
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
		var options = {
		  'title':'Repartition des heures de cours',
		  'width':600,
		  'height':500,
		  'backgroundColor': {
			'fill': '#fafafa',
			'opacity': 0
		  }
		};
		
		// Instantiate and draw our chart, passing in some options.
		if(chartType=="pie") {
			var chart = new google.visualization.PieChart(document.getElementById('chart'));
		} else if(chartType=="bar") {
			var chart = new google.visualization.BarChart(document.getElementById('chart'));
		}
		
		chart.draw(data, options);
	}
	
	$('.selection>button').click(function(e){
		if(e.currentTarget.className == "tabBtn btnActive" && chartType!="table") {
			//A FAIRE
            		chartType = "table";
            		$("#chart").html("<table><tr><td>CM</td><td>3</td></tr><tr><td>TD</td><td>9</td></tr><tr><td>TP</td><td>9</td></tr></table>");
		} else if(e.currentTarget.className == "pieBtn btnActive" && chartType!="pie") {
			chartType="pie";
			drawChart();
		} else if(e.currentTarget.className == "barBtn btnActive" && chartType!="bar") {
			chartType="bar";
			drawChart();
		}
	});
});
