@extends('YourProfile.MasterPage')
@section('body')
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">Thông tin điểm cống hiến</li>
          </ol>
          <div class="row">
             <div class="col-lg-4">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-pie"></i>
                 Biểu đồ số giờ đào tạo</div>
                <div class="card-body">
                  <canvas id="myPieChart" width="100%" height="105"></canvas>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
              </div>
            </div>
            <!-- right -->
               <div class="col-lg-8">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-chart-pie"></i>
                 Giờ tham gia hoạt động cả năm</div>
                <div class="card-body">
                  <div class="row">
                     <!-- div 1 -->
           
              <div class="col-xl-4 col-sm-3 mb-3">
                <div class="card text-white Tamly o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-smile"></i>
                    </div>
                    <div class="mr-5">Tâm Lý: <label>{{$Tamly != null ? $Tamly->Diem : 0}} giờ</label></div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              <!-- end div 1 -->
              <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white Chuyenmon o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-book"></i>
                    </div>
                    <div class="mr-5">Chuyên Môn: <label>{{$Chuyenmon != null ? $Chuyenmon->Diem : 0}} giờ</label></div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white Kynang o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-camera"></i>
                    </div>
                    <div class="mr-5">Kỹ Năng: <label>{{$Kynang != null ? $Kynang->Diem : 0}} giờ</label></div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white Kienthuc o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-lightbulb"></i>
                    </div>
                    <div class="mr-5">Kiến Thức: <label>{{$Kienthuc != null ? $Kienthuc->Diem : 0}} giờ</label></div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
                <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white Congdong o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-users"></i>
                    </div>
                    <div class="mr-5">Cộng Đồng: <label>{{$Congdong !== null ? $Congdong->Diem : 0}} giờ</label></div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
               <div class="col-xl-4 col-sm-6 mb-3">
                <div class="card text-white Thechat o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-bicycle"></i>
                    </div>
                    <div class="mr-5">Thể Chất: <label>{{$Thechat != null ? $Thechat->Diem : 0}} giờ</label></div>

                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
        
                <!-- end -->
            </div>
                  </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
              </div>
            </div>
            <!-- end right -->
        



          </div>


          <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Biểu đồ điểm cống hiến</div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated {{$updatetimeCH->updated_at}}</div>
          </div>
          <div class="card mb-3">
            <div class="container-fluid">
<div class='tableauPlaceholder' id='viz1545808933802' style='position: relative'><noscript><a href='#'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;ND&#47;ND7FXBJ6N&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='path' value='shared&#47;ND7FXBJ6N' /> <param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;ND&#47;ND7FXBJ6N&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /></object></div>                
<script type='text/javascript'>                    var divElement = document.getElementById('viz1545808933802');                    var vizElement = divElement.getElementsByTagName('object')[0];                    vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.75)+'px';                    var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script>

          </div>
          <hr>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Bảng chi tiết sự kiện đã tham gia</div>
              <?php $i = 1 ; ?>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
     
      <th >Tên Sự Kiện</th>
      <th >Ngày Tham Gia</th>
      <th >TL</th>
      <th >KT</th>
      <th >KN</th>
      <th >CM</th>
      <th >CĐ</th>
      <th >TC</th>
    </tr>
  </thead>
  <tbody>
    @foreach($Conghien as $key)
    <tr>
      <td>{{$key->Tenhoatdong}}</td>
      <td>{{date('d-m-Y',strtotime($key->Ngayhoatdong))}}</td>      
      <td>{{$key->TL}}</td>
      <td>{{$key->KT}}</td>
      <td>{{$key->KN}}</td>
      <td>{{$key->CM}}</td>
      <td>{{$key->CD}}</td>
      <td>{{$key->TC}}</td>

    </tr>
    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated {{$updatetimeDT->updated_at}}</div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
            <script src="{{URL::asset('YourProfile/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('YourProfile/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{URL::asset('YourProfile/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Page level plugin JavaScript-->
    <script src="{{URL::asset('YourProfile/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{URL::asset('YourProfile/js/sb-admin.min.js')}}"></script>
         <script src="{{URL::asset('YourProfile/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{URL::asset('YourProfile/js/demo/chart-bar-demo.js')}}"></script>
    <script src="{{URL::asset('YourProfile/js/demo/chart-pie-demo.js')}}"></script>

@endsection