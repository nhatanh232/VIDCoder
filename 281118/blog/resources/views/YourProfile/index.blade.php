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
         <!-- Phần của mình hihi <3 -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Data Order Chart</h4>
                  <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div id="data-order"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
          <hr>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Bảng chi tiết các sự kiện nội bộ đã tham gia</div>
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