// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example

$(document).ready(function(){
  $.ajax({
    type:'get',
   
    url:'ChartCH',
    success:function(data){
      var Closing = new Array();
      var Decision_Date = new Array();

        for(var i = 0 ; i < data.length ; i++)
        {
            var date    = new Date(data[i].Decision_Date);
   
          var  yr      = date.getFullYear();
          var  month  = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth();
           var day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate();
           month =  ++month < 10 ? '0' + month : month ;
          
           var newDate = month + '-' + yr;
           Closing.push(data[i].Diemconghien);
           Decision_Date.push(newDate);
        }

        var valuemax = Math.max.apply(Math,Closing);

var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: Decision_Date,
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: Closing,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: valuemax,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
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