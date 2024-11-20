var Charts = function() {"use strict";
	var lineChartHandler = function() {
		var options = {
			
			responsive: true,

			
			scaleShowGridLines: true,

			
			scaleGridLineColor: 'rgba(0,0,0,.05)',

			
			scaleGridLineWidth: 1,

			
			bezierCurve: true,

			
			bezierCurveTension: 0.4,

			
			pointDot: true,

			
			pointDotRadius: 4,

			
			pointDotStrokeWidth: 1,

			
			pointHitDetectionRadius: 20,

			datasetStroke: true,

			datasetStrokeWidth: 2,

			datasetFill: true,

			onAnimationProgress: function() {
			},

			onAnimationComplete: function() {
			},

			legendTemplate: '<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>'
		};
		var data = {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [{
				label: "My First dataset",
				fillColor: "rgba(220,220,220,0.2)",
				strokeColor: "rgba(220,220,220,1)",
				pointColor: "rgba(220,220,220,1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(220,220,220,1)",
				data: [65, 59, 80, 81, 56, 55, 40]
			}, {
				label: "My Second dataset",
				fillColor: "rgba(151,187,205,0.2)",
				strokeColor: "rgba(151,187,205,1)",
				pointColor: "rgba(151,187,205,1)",
				pointStrokeColor: "#fff",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(151,187,205,1)",
				data: [28, 48, 40, 19, 86, 27, 90]
			}]
		};

		var ctx = $("#lineChart").get(0).getContext("2d");
		var lineChart = new Chart(ctx).Line(data, options);
		var legend = lineChart.generateLegend();
		$('#lineLegend').append(legend);
	};
	var barChartHandler = function() {
		var options = {

			responsive: true,

			scaleBeginAtZero: true,

			scaleShowGridLines: true,

			scaleGridLineColor: "rgba(0,0,0,.05)",

			scaleGridLineWidth: 1,

			barShowStroke: true,

			barStrokeWidth: 2,

			barValueSpacing: 5,

			barDatasetSpacing: 1,

			legendTemplate: '<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>'
		};
		var data = {
			labels: ["January", "February", "March", "April", "May", "June", "July"],
			datasets: [{
				label: "My First dataset",
				fillColor: "rgba(220,220,220,0.5)",
				strokeColor: "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data: [65, 59, 80, 81, 56, 55, 40]
			}, {
				label: "My Second dataset",
				fillColor: "rgba(151,187,205,0.5)",
				strokeColor: "rgba(151,187,205,0.8)",
				highlightFill: "rgba(151,187,205,0.75)",
				highlightStroke: "rgba(151,187,205,1)",
				data: [28, 48, 40, 19, 86, 27, 90]
			}]
		};

		var ctx = $("#barChart").get(0).getContext("2d");
		var barChart = new Chart(ctx).Bar(data, options);
		;
		var legend = barChart.generateLegend();
		$('#barLegend').append(legend);
	};
	var doughnutChartHandler = function() {
		var data = [{
			value: 300,
			color: '#F7464A',
			highlight: '#FF5A5E',
			label: 'Red'
		}, {
			value: 50,
			color: '#46BFBD',
			highlight: '#5AD3D1',
			label: 'Green'
		}, {
			value: 100,
			color: '#FDB45C',
			highlight: '#FFC870',
			label: 'Yellow'
		}];

		var options = {

			responsive: false,

			segmentShowStroke: true,

			segmentStrokeColor: '#fff',

			segmentStrokeWidth: 2,

			percentageInnerCutout: 50, 

			animationSteps: 100,

			animationEasing: 'easeOutBounce',

			animateRotate: true,

			animateScale: false,

			legendTemplate: '<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'

		};

		var ctx = $("#doughnutChart").get(0).getContext("2d");
		var doughnutChart = new Chart(ctx).Doughnut(data, options);
		;
		var legend = doughnutChart.generateLegend();
		$('#doughnutLegend').append(legend);
	};
	var pieChartHandler = function() {
		var data = [{
			value: 300,
			color: '#F7464A',
			highlight: '#FF5A5E',
			label: 'Red'
		}, {
			value: 50,
			color: '#46BFBD',
			highlight: '#5AD3D1',
			label: 'Green'
		}, {
			value: 100,
			color: '#FDB45C',
			highlight: '#FFC870',
			label: 'Yellow'
		}];

		var options = {

			responsive: false,

			segmentShowStroke: true,

			segmentStrokeColor: '#fff',

			segmentStrokeWidth: 2,

			percentageInnerCutout: 0, 

			animationSteps: 100,

			animationEasing: 'easeOutBounce',

			animateRotate: true,

			animateScale: false,

			legendTemplate: '<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'

		};

		var ctx = $("#pieChart").get(0).getContext("2d");
		var pieChart = new Chart(ctx).Pie(data, options);
		;
		var legend = pieChart.generateLegend();
		$('#pieLegend').append(legend);
	};
	var polarChartHandler = function() {
		var data = [{
			value: 300,
			color: '#F7464A',
			highlight: '#FF5A5E',
			label: 'Red'
		}, {
			value: 50,
			color: '#46BFBD',
			highlight: '#5AD3D1',
			label: 'Green'
		}, {
			value: 100,
			color: '#FDB45C',
			highlight: '#FFC870',
			label: 'Yellow'
		}, {
			value: 40,
			color: '#949FB1',
			highlight: '#A8B3C5',
			label: 'Grey'
		}, {
			value: 120,
			color: '#4D5360',
			highlight: '#616774',
			label: 'Dark Grey'
		}];

		var options = {

			responsive: false,

			scaleShowLabelBackdrop: true,

			scaleBackdropColor: 'rgba(255,255,255,0.75)',

			scaleBeginAtZero: true,

			scaleBackdropPaddingY: 2,

			scaleBackdropPaddingX: 2,

			scaleShowLine: true,

			segmentShowStroke: true,

			segmentStrokeColor: '#fff',

			segmentStrokeWidth: 2,

			animationSteps: 100,

			animationEasing: 'easeOutBounce',

			animateRotate: true,

			animateScale: false,

			legendTemplate: '<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
		};

		var ctx = $("#polarChart").get(0).getContext("2d");
		var polarChart = new Chart(ctx).PolarArea(data, options);
		;
		var legend = polarChart.generateLegend();
		$('#polarLegend').append(legend);
	};
	var radarChartHandler = function() {
    var data = {
        labels: ['Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running'],
        datasets: [
          {
              label: 'My First dataset',
              fillColor: 'rgba(220,220,220,0.2)',
              strokeColor: 'rgba(220,220,220,1)',
              pointColor: 'rgba(220,220,220,1)',
              pointStrokeColor: '#fff',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: [65, 59, 90, 81, 56, 55, 40]
          },
          {
              label: 'My Second dataset',
              fillColor: 'rgba(151,187,205,0.2)',
              strokeColor: 'rgba(151,187,205,1)',
              pointColor: 'rgba(151,187,205,1)',
              pointStrokeColor: '#fff',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(151,187,205,1)',
              data: [28, 48, 40, 19, 96, 27, 100]
          }
        ]
    };

   var options = {

        responsive: true,

        scaleShowLine: true,

        angleShowLineOut: true,

        scaleShowLabels: false,

        scaleBeginAtZero: true,

        angleLineColor: 'rgba(0,0,0,.1)',

        angleLineWidth: 1,

        pointLabelFontFamily: '"Arial"',

        pointLabelFontStyle: 'normal',

        pointLabelFontSize: 10,

        pointLabelFontColor: '#666',

        pointDot: true,

        pointDotRadius: 3,

        pointDotStrokeWidth: 1,

        pointHitDetectionRadius: 20,

        datasetStroke: true,

        datasetStrokeWidth: 2,

        datasetFill: true,

        legendTemplate: '<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].strokeColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>'
    };

		var ctx = $("#radarChart").get(0).getContext("2d");
		var radarChart = new Chart(ctx).Radar(data, options);
		;
		var legend = radarChart.generateLegend();
		$('#radarLegend').append(legend);
	};
	return {
		init: function() {
			lineChartHandler();
			barChartHandler();
			doughnutChartHandler();
			pieChartHandler();
			polarChartHandler();
			radarChartHandler();
		}
	};
}();
