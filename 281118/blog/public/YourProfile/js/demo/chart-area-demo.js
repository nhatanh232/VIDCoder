// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
$(document).ready(function(){
  $.ajax({
    type:'get',
   
    url:'ChartCH',
    success:function(data){
      var conghien = new Array();
      var Decision_Date = new Array();

        for(var i = 0 ; i < data.length ; i++)
        {
            var date    = new Date(data[i].Decision_Date);
   
          var  yr      = date.getFullYear();
          var  month  = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth();
           var day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate();
           month =  ++month < 10 ? '0' + month : month ;
           
           var newDate = data[i].Month + '-' + data[i].Year;
           conghien.push(data[i].Diemconghien);
           Decision_Date.push(newDate);
        }

        var valuemax = Math.max.apply(Math,conghien);
        
 
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: Decision_Date,
    datasets: [{
      label: "Sessions",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: conghien,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: valuemax+100,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
}
});
});