// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
$(document).ready(function(){
  $.ajax({
    type:'get',
   
    url:'ChartDaoTao',
    success:function(data){
      var Closing = new Array(data[0].Tamly,data[0].Chuyenmon,data[0].Kynang,data[0].Kienthuc,data[0].Congdong,data[0].Thechat);
      var Decision_Date = new Array();

        for(var i = 0 ; i < data.length ; i++)
        {
            var date    = new Date(data[i].Decision_Date);
   
          var  yr      = date.getFullYear();
          var  month  = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth();
           var day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate();
           month =  ++month < 10 ? '0' + month : month ;
           console.log(data);
           var newDate = day + '-' + month + '-' + yr;
           // Closing.push(data[i].Closing_Balance);
           Decision_Date.push(newDate);
        }

        var valuemax = Math.max.apply(Math,Closing);
        

var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Tâm lý", "Chuyên môn", "Kỹ năng", "Kiến thức" ,"Cộng đồng","Thể chất"],
    datasets: [{
      data: Closing,
      backgroundColor: ['#BB0000', 'blue', '#FFCC33', 'green' ,'#FF6600' ,'#666666'],
    }],
  },
});
}
});
});
