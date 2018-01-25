<?php
google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ["dummy","Question 1", "Question 2", " Question 3"],
        [0,81, 122, 10 ]
    ]);

    var options = {
      title: '',
      vAxis: {
        title: '',
        gridlines : {
          count : 5,
          color: 'white'
        }
      },
      hAxis: {
        title: '',
        format : '#%',
        gridlines : {
          count : 5,
          color: 'white'
        }
      },
      colors: ['#be1e2d', '#74b749', '#0daed3', '#ffb400', '#f63131'],
      legend : {
        position: 'bottom'
      }
    };

    var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
    chart.draw(data, options);
      
?>