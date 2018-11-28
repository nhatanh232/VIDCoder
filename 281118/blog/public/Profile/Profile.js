function Profile(){
	$(document).ready(function(){
        
$('#getInfo').keypress(function(e) {
	var idcard = this.value;

    if(e.which == 13) {
    	
        $.ajax({
        	type:'get',
        	url:'getInfo',
        	data:{
        		idcard:idcard,
        	},
        	success:function(data){
        		$('#ShowInfo').html(data);
                $('#getInfo').val("").focus();
                ModaCH();
                 ModaDiemdanh();



        	}
        })
    }
		});
//  function 2
    $('input[name="Staff_ID"]').focusout(function(e){
        var value = this.value;

        $.ajax({
            type:'get',
            url:'getHistoryDetail',
            data:{
                Staff_ID:value,

            },
            dataType:'json',
            success:function(data){
                   $('input[name="Fullname"]').val(data[0].Full_name);
                   $('input[name="Opening_Balance"]').val(data[0].Closing_Balance);
            }
        })

    })
	});
    // function 3 
    function GetHisCH(){
    $('#HistoryCH').click(function(e){
        var Staff_ID = $('input[name="StaffID"]').val();
        e.preventDefault();
        $.ajax({
            type:'get',
            url:'getHistory',
            data:{
                Staff_ID:Staff_ID,
            },
            success:function(data){
                $('#showCH').html(data);
                Table();
                            }

        })
    });
    }
    // function 4
    function Table(){
       $('#HistoryCHtable').DataTable();  
    }
    //function 5
    function ModaCH(){
        $('#HistoryCH').click(function(e){
            var Staff_ID = $('input[name="StaffID"]').val();
        e.preventDefault();
            $('#ModalCH').css({'display':'block'});
            $.ajax({
            type:'get',
            url:'getHistory',
            data:{
                Staff_ID:Staff_ID,
            },
            success:function(data){
                $('#showCH').html(data);
                Table();
                Close();

                            }

        })


        })
    }
    function Close(){
        $('.close').click(function(){
            $('#ModalCH').css({'display':'none'});
        })
    }

    function ModaDiemdanh(){
        $('#HistoryDiemdanh').click(function(e){
            var Staff_ID = $('input[name="StaffID"]').val();
        e.preventDefault();
            $('#ModalCH').css({'display':'block'});
            $.ajax({
            type:'get',
            url:'getHistoryDiemdanh',
            data:{
                Staff_ID:Staff_ID,
            },
            success:function(data){
                $('#showCH').html(data);
                $('#HistoyDiemdanhtable').DataTable();
                Close();

                            }

        })


        })
    }
    

}    

function Tableau(){
var divElement = document.getElementById('viz1539407381525');                   
 var vizElement = divElement.getElementsByTagName('object')[0];                  
   vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.75)+'px';                   
    var scriptElement = document.createElement('script');                    
    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                   
 vizElement.parentNode.insertBefore(scriptElement, vizElement); 
}