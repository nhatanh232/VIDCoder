$(window).on("load", function(){
    // ohter Function 
      $('#dot1').load('./YourProfile/js/dot1.html');
        $('#dot2').load('./YourProfile/js/dot2.html');
    $('#dot3').load('./YourProfile/js/dot3.html');
    
    ChangeTable();
    ChartCongHien();
    initTable();
     loadText();
     setTimeout(function(){
         $('#dot1').fadeOut();
            $('#dot2').fadeOut();
             $('#dot3').fadeOut();
     },3000)
});

    // end other Function
    // Callback that creates and populates a data table, instantiates the data order chart, passes in the data and draws it.
    


function ChangeTable(){

        $('.tableau li').click(function(event){
            event.preventDefault();
                 var dot = $(this).find('a').text();
               var arrays = new Array();
                arrays['Đợt I'] = 'dot1';
               arrays['Đợt II'] = 'dot2';
               arrays['Đợt III'] = 'dot3';
        
        
  
      
                switch(arrays[dot]){
                    case 'dot1':

                    $('#dot1').fadeIn(1000);
                    $('#dot2').fadeOut();
                    $('#dot3').fadeOut();
                  
                    break;
                    case 'dot2':
                    $('#dot2').fadeIn(1000);
                    $('#dot1').fadeOut();
                    $('#dot3').fadeOut();
                    if($(this).hasClass('active'))
                     $('#'+arrays[dot]).fadeOut();
                    break;
                    case 'dot3':
                    $('#dot3').fadeIn(1000);
                    $('#dot2').fadeOut();
                    $('#dot1').fadeOut();
                    if($(this).hasClass('active'))
                        $('#'+arrays[dot]).fadeOut();
                    break;
                }
                    
            $('.tableau li').removeClass('active');

                $(this).addClass('active');
        });
}

function ChartCongHien(){
    // Gloabal Variables
    var dtn =[];
    var ddt = [];
    var thangnam = new Array();

    // call ajax
    dtn.push('Thâm Niên');
    ddt.push('Đào Tạo');
    $.ajax({
        type:'get',
        url:'ChartCH',
        dataType:'json',
        success:function(data){
            for (var i = 0; i <= data.length -1; i++) {
                   thangnam.push(data[i].T+'/'+data[i].N);
                  ddt.push(data[i].H);
                  dtn.push(data[i].ThamNien);
             
                  // chart
            }

            var dataOrder = c3.generate({
        bindto: '#data-order',
        size: {height:400},
        color: {
            pattern: ['#239B56','#873600']
        },
        axis:{
            x:{
                type: 'category',
                categories: thangnam
            }
        },
        // Create the data table.
        data: {
            labels:[
                'true',
            ],
            columns: [
                    dtn,
                    ddt,
            
            ],
            type: 'bar',
            // groups: [
            //     ['Thâm Niên', 'Đào Tạo']
            // ],
            order: 'desc' // stack order by sum of values descendantly. this is default.
    //      order: 'asc'  // stack order by sum of values ascendantly.
    //      order: null   // stack order by data definition.
        },
        grid: {
            y: {
                show: true
            }
        }
    });

    // Instantiate and draw our chart, passing in some options.
    // setTimeout(function () {
    //     dataOrder.groups([ ['Thâm Niên', 'Đào Tạo']]);
    // }, 3000);

    // Resize chart on sidebar width change
    $(".menu-toggle").on('click', function() {
        dataOrder.resize();
    });
        },
    })
    // end ajax
        
}
function initTable(){
    $('#dataTable').DataTable();
    
}
function loadText(){
   $('.change').click(function(event){
    event.preventDefault();
      var file = $(this).attr('href');
      var content = prompt('Nhúng script tableau');

         $.ajax({

        type:'post',
        url:'http://localhost:8888/hehe',
        data:{
            file:file,
            content:content
        },
          headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
        dataType: "jsonp",
        jsonpCallback: "_res",
        cache: false,
        timeout: 5000,
        success:function(data){
            console.log(data);
        }


    })

   })
 
 


   
}   