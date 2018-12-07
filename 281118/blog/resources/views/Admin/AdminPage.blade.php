<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Viễn Đông</title>
	<meta name="description" content="Blueprint: A basic template for a responsive multi-level menu" />
	<meta name="keywords" content="blueprint, template, html, css, menu, responsive, mobile-friendly" />
	<meta name="author" content="Codrops" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{{asset('Admin/favicon.ico')}}">
	<!-- food icons -->
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/organicfoodicons.css')}}" />
	<!-- demo styles -->
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/demo.css')}}" />
	<!-- menu styles -->
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/component.css')}}" />
	<script src="{{asset('Admin/js/modernizr-custom.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- autocomplete -->
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- endautocomplete -->
	<!-- datatables -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	<!-- end -->

	<!-- bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- end -->

	<!-- script for button made by me: -->
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/modal.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('Admin/css/adminQuayso.css')}}">
	<script type="text/javascript" src="{{asset('Admin/js/Module.js')}}"></script>
	<script type="text/javascript" src="{{asset('Admin/js/adminSuatAn.js')}}"></script>
		<script type="text/javascript" src="{{asset('Admin/js/information.js')}}"></script>
		<script type="text/javascript" src="{{asset('Admin/js/Taisantlcn.js')}}"></script>
		<script type="text/javascript" src="{{asset('Admin/js/quanlytaisan.js')}}"></script>
		<script type="text/javascript" src="{{asset('Admin/js/Quayso.js')}}"></script>
		<script type="text/javascript" src="{{asset('Profile/Profile.js')}}"></script>

	<!-- end -->
	
</head>

<body>
	<!-- Main container -->
	<div class="container-fluid" style="background-image: url('../../layouts/images/hinhnen.jpg');">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			<div class="dummy-logo">
				<div class="dummy-icon foodicon foodicon--coconut"></div>
			<!-- 	<h2 class="dummy-heading">Viễn Đông</h2> -->
			</div>
			<!-- <div class="bp-header__main">
				<span class="bp-header__present">Admin Page</span>
				<h1 class="bp-header__title">TẬP ĐOÀN VIỄN ĐÔNG</h1>
				<nav class="bp-nav">
					<a class="bp-nav__item bp-icon bp-icon--prev" href="http://vicongdong.com.vn" data-info="Trang chủ" target="_blank"><span>Trang chủ</span></a>
					a class="bp-nav__item bp-icon bp-icon--next" href="" data-info="next Blueprint"><span>Next Blueprint</span></a
					<a class="bp-nav__item bp-icon bp-icon--drop" href="http://tympanus.net/codrops/?p=25521" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
					<a class="bp-nav__item bp-icon bp-icon--archive" href="http://tympanus.net/codrops/category/blueprints/" data-info="Blueprints archive"><span>Go to the archive</span></a>
				</nav>
			</div> -->
		</header>
		<button class="action action--open" aria-label="Open Menu"><span class="icon icon--menu"></span></button>
		<nav id="ml-menu" class="menu">
			<button class="action action--close" aria-label="Close Menu"><span class="icon icon--cross"></span></button>
			<div class="menu__wrap">
				<ul data-menu="main" class="menu__level" tabindex="-1" role="menu" aria-label="All">
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-1" aria-owns="submenu-1" href="#">Admin</a></li>
					<!-- 1 -->
					<li class="menu__item" role="menuitem">
						
							<a class="menu__link" href="#">Kho</a>
						
					</li>
					<li class="menu__item" role="menuitem">
						
							<a class="menu__link" href="#">Tài sản phòng ban</a>
						
					</li>
					
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-2" aria-owns="submenu-2" href="#">Quản lý kho</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-3" aria-owns="submenu-3" href="#">Thông báo</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-4" aria-owns="submenu-4" href="#">Thanh lý giá trị</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-5" aria-owns="submenu-5" href="#">Thông tin nhân viên</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-6" aria-owns="submenu-6" href="#">Bộ phận bảo trì</a></li>
				</ul>
				<!-- Submenu 1 -->
				<ul data-menu="submenu-1" id="submenu-1" class="menu__level" tabindex="-1" role="menu" aria-label="Vegetables">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Phân quyền</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Suất Ăn</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Tài sản phòng ban</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Quay số trúng thưởng</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Duyệt giờ đào tạo</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Thông tin nhân viên</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Điểm cống hiến</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Giờ đào tạo</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Tableau</a></li>
					<!-- <li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-1-1" aria-owns="submenu-1-1" href="#">Sale %</a></li> -->
				</ul>
				<!-- submenu 6 -->
				<ul data-menu="submenu-6" id="submenu-6" class="menu__level" tabindex="-1" role="menu" aria-label="Vegetables">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Bảo trì</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Bảo dưỡng</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Tài sản phòng ban</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Lịch sử</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#"></a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#"></a></li>
					
				</ul>
				<!-- Submenu 1-1 -->
				<ul data-menu="submenu-1-1" id="submenu-1-1" class="menu__level" tabindex="-1" role="menu" aria-label="Sale %">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Fair Trade Roots</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Dried Veggies</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Our Brand</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Homemade</a></li>
				</ul>
				<!-- Submenu 2 -->
				<ul data-menu="submenu-2" id="submenu-2" class="menu__level" tabindex="-1" role="menu" aria-label="Fruits">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Kho</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Tài sản phòng ban</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-2-1" aria-owns="submenu-2-1" href="#">Tài sản cá nhân</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Danh sách mượn</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Danh sách đã trả</a></li>
				</ul>
				<!-- Submenu 2-1 -->
				<ul data-menu="submenu-2-1" id="submenu-2-1" class="menu__level" tabindex="-1" role="menu" aria-label="Special Selection">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Bảng lưu trữ</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Đăng ký</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Trả</a></li>
				</ul>
				<!-- Submenu 3 -->
				<ul data-menu="submenu-3" id="submenu-3" class="menu__level" tabindex="-1" role="menu" aria-label="Grains">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Đăng thông báo</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Millet</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Quinoa</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Wild Rice</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Durum Wheat</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-3-1" aria-owns="submenu-3-1" href="#">Promo Packs</a></li>
				</ul>
				<!-- Submenu 3-1 -->
				<ul data-menu="submenu-3-1" id="submenu-3-1" class="menu__level" tabindex="-1" role="menu" aria-label="Promo Packs">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Starter Kit</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">The Essential 8</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Bolivian Secrets</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Flour Packs</a></li>
				</ul>
				<!-- Submenu 4 -->
				<ul data-menu="submenu-4" id="submenu-4" class="menu__level" tabindex="-1" role="menu" aria-label="Mylk &amp; Drinks">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Đăng ký thanh lý</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Duyệt mua</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Nut Mylks</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Nutri Drinks</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-4-1" aria-owns="submenu-4-1" href="#">Selection</a></li>
				</ul>
				<!-- Submenu 4-1 -->
				<ul data-menu="submenu-4-1" id="submenu-4-1" class="menu__level" tabindex="-1" role="menu" aria-label="Selection">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Nut Mylk Packs</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Amino Acid Heaven</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Allergy Free</a></li>
				</ul>
				<!-- Submenu 5-1 -->
					<ul data-menu="submenu-5" id="submenu-5" class="menu__level" tabindex="-1" role="menu" aria-label="Vegetables">
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Thông tin tài khoản</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Chỉnh sửa cập nhật</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Cabbages</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Salad Greens</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" href="#">Mushrooms</a></li>
					<li class="menu__item" role="menuitem"><a class="menu__link" data-submenu="submenu-1-1" aria-owns="submenu-1-1" href="#">Sale %</a></li>
				</ul>
			</div>
		</nav>
		<div class="content" id="show">
			<p class="info">Please choose a category</p>
			<!-- Ajax loaded content here -->
		</div>
	</div>
	<!-- /view -->
	<script src="{{asset('Admin/js/classie.js')}}"></script>
	<script src="{{asset('Admin/js/dummydata.js')}}"></script>
	<script src="{{asset('Admin/js/main.js')}}"></script>
	<script>
	(function() {
		var menuEl = document.getElementById('ml-menu'),
			mlmenu = new MLMenu(menuEl, {
				// breadcrumbsCtrl : true, // show breadcrumbs
				// initialBreadcrumb : 'all', // initial breadcrumb text
				backCtrl : false, // show back button
				// itemsDelayInterval : 60, // delay between each menu item sliding animation
				onItemClick: loadDummyData // callback: item that doesn´t have a submenu gets clicked - onItemClick([event], [inner HTML of the clicked item])
			});

		// mobile menu toggle
		var openMenuCtrl = document.querySelector('.action--open'),
			closeMenuCtrl = document.querySelector('.action--close');

		openMenuCtrl.addEventListener('click', openMenu);
		closeMenuCtrl.addEventListener('click', closeMenu);

		function openMenu() {
			classie.add(menuEl, 'menu--open');
			closeMenuCtrl.focus();
		}

		function closeMenu() {
			classie.remove(menuEl, 'menu--open');
			openMenuCtrl.focus();
		}

		// simulate grid content loading
		var gridWrapper = document.querySelector('.content');

		function loadDummyData(ev, itemName) {
			ev.preventDefault();

			closeMenu();
			gridWrapper.innerHTML = '';
			
			var url = dummyData[itemName];
			$.ajax({
				type:'GET',
				url:url,
				cache:false,
				success:function(data){
					document.getElementById('show').innerHTML = data;
				},
				complete:function(){
					$('#bangluutrucn').DataTable({			
					});



					$('#bangluutrucn').on( 'draw.dt', function () {
						$('.ShowImageTSCN').click(function (e) {
           
                var x = this.id;
            $.ajax({
                type:"GET",
                url:'{{URL("hinhtscn?id=")}}'+x,
                success:function(data){
                    $('#divIntro')
                .show()
                .html(data)
                .css({ position: 'absolute', color: '#000',
                    left: e.pageX-300, top: e.pageY-200
            });
                }
            });
            
        });
        $('.ShowImageTSCN').mouseleave(function (e) {
           
             $('#divIntro').hide();
        });
					});
					
					$('#tablekho').on( 'draw.dt', function () {
//KHO2    					
			setTimeout($('.showHinh').click(function (e) {
           
             				   var x =$(this).text();
				           			 $.ajax({
				                type:"GET",
				                url:'{{URL("ShowdetailImg?id=")}}'+x,
				                success:function(data){
				                    $('#divIntro')
				                .show(1000)
				                .html(data)
				                .css({ position: 'absolute', color: '#000',
				                    left: e.pageX, top: e.pageY-100
				            });
				                }
				            });
				            
				        }),2000);
				        $('.showHinh').mouseleave(function (e) {
				         
				             $('#divIntro').hide();
				        });
				         $('.ShowImage').click(function(e){
        	var url = 'lichsu?id='+this.id;
        	window.open(url,'blank');
        });
});
					// end



					$('#taisanphongban').DataTable({
						
							"autoWidth": false,
						  initComplete: function () {
            var api = this.api();

            api.columns().indexes().flatten().each( function ( i ) {
                var column = api.column( i );
                var select = $('<select><option value="">Fliter</option></select>').css('width','100%').css('color','red') 
                    .appendTo( $(column.header()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' ).css('width','100%');
                } );
            } );
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tất cả"]],
     
					});



					$('#taisanphongban').on( 'draw.dt', function () {
							 $('.showHinhPB').click(function (e) {
            e.preventDefault();
                var x = $(this).text();
            $.ajax({
                type:"GET",
                url:'{{URL("ShowdetailImgTSPB?id=")}}'+x,
                success:function(data){
                    $('#divIntro')
                .show()
                .html(data)
                .css({ position: 'absolute', color: '#000',
                    left: e.pageX-100, top: e.pageY-100
            });
                }
            });
            
        });
        $('.showHinhPB').mouseleave(function (e) {
           
             $('#divIntro').hide();
        });
        $('.ShowImageTSPB').click(function(e){
        	var bophan = encodeURIComponent($(this).data('his'));
        	var loc = encodeURIComponent($(this).data('loc'));
        	
        	var url = 'lichsuTSPB?id='+this.id+'&His='+bophan+'&Loc='+loc;
        	window.open(url,'blank');
        });

});



					// end #taisanphongban
					$('#phanquyen').DataTable();
					$('#amount').on( "keyup", function( event ) {
            
            
            // When user select text in the document, also abort.
              var selection = window.getSelection().toString();
            console.log(selection);
            if ( selection !== '' ) {
                return;
            }
            
            // When the arrow keys are pressed, abort.
            if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                return;
            }
            
            
            var $this = $( this );
            
            // Get the value.
            var input = $this.val();
            
            var input = input.replace(/[\D\s\._\-]+/g, "");
                    input = input ? parseInt( input, 10 ) : 0;

                    $this.val( function() {
                        return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
                    } );
        } ); 
					
        // end test
					$('#Ngaydieuchuyen').change(function(){
				$('#Ngaydieuchuyenform').attr('value',$('#Ngaydieuchuyen').val());
			});
// KHO1					
setTimeout($('.showHinh').click(function (e) {
           
                var x = $(this).text();
            $.ajax({
                type:"GET",
                url:'{{URL("ShowdetailImg?id=")}}'+x,
                success:function(data){
                    $('#divIntro')
                .show(700)
                .html(data)
                .css({ position: 'absolute', color: '#000',
                    left: e.pageX, top: e.pageY-100
            });
                }
            });
            
        }),2000);
        $('.showHinh').mouseleave(function (e) {
         
             $('#divIntro').hide();
        });
        // TSCN
$('.ShowImageTSCN').click(function (e) {
           
                var x = this.id;
            $.ajax({
                type:"GET",
                url:'{{URL("hinhtscn?id=")}}'+x,
                success:function(data){
                    $('#divIntro')
                .show()
                .html(data)
                .css({ position: 'absolute', color: '#000',
                    left: e.page+300, top: e.pageY-100
            });
                }
            });
            
        });
        $('.ShowImageTSCN').mouseleave(function (e) {
           
             $('#divIntro').hide();
        });
        // end TSCN
        $('.ShowImage').click(function(e){
        	var url = 'lichsu?id='+this.id;
        	window.open(url,'blank');
        });
// TSPB
        $('.showHinhPB').click(function (e) {
            e.preventDefault();
                var x = $(this).text();
            $.ajax({
                type:"GET",
                url:'{{URL("ShowdetailImgTSPB?id=")}}'+x,
                success:function(data){
                    $('#divIntro')
                .show()
                .html(data)
                .css({ position: 'absolute', color: '#000',
                    left: e.pageX-100, top: e.pageY-100
            });
                }
            });
            
        });
        $('.showHinhPB').mouseleave(function (e) {
           
             $('#divIntro').hide();
        });
        $('.ShowImageTSPB').click(function(e){
        	var bophan = encodeURIComponent($(this).data('his'));
        	var loc = encodeURIComponent($(this).data('loc'));
        	
        	var url = 'lichsuTSPB?id='+this.id+'&His='+bophan+'&Loc='+loc;
        	window.open(url,'blank');
        });

        $('#phanquyen input:checkbox').change(function(e){
        	if(this.checked)
        		$.ajax({
        			type:"GET",
        			url:this.name,
        			data:{
        				Manv:this.value,
        				chon:1
        			},
        			success:function(data){
        				alert(data);
        			}
        		});
        	else
        		$.ajax({
        			type:"GET",
        			url:this.name,
        			data:{
        				Manv:this.value,
        				chon:0
        			},
        			success:function(data){
        				alert(data);
        			}
        		});
        });
        tscn();GetMaNV();formatGiatri();
        getSelectColumn();
        Nhapso();
        deleteSo();
        getBDInfo();
        getDataBaoTri();
        quanlytaisan();
        thongtinsuatantrongngay();
        thongtinsuatanngaymai();        
       	getSuatAnPhong();
       	void_main_Modulejs();
        $('#formNhapCH').DataTable();
        $('#baoduong').DataTable();
        $('#ICT').DataTable();
        $('#player').DataTable();
        Profile();
        NhapTen();
        btnNextMonth();
				}
			})
		}
	})();
	</script>

</body>

</html>
