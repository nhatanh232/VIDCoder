@extends('datlich.honviet.kethuahv')
@section('body')
      <div class="panel panel-primary">

             <div class="panel-heading"><div class="dropdown" style=" text-align: center;">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background: #4CAF50" ><h1>ĐÀO TẠO</h1>
  <span class="caret"></span></button>
<ul class="dropdown-menu" style="width: 100%;
    padding: 0px 10px;
    text-align: left;
    background: #e6e6e6;
    border-bottom: 1px solid white; 
    
   "> <li><a href="{{route('tongviechv')}}">Danh sách công việc các phòng</a></li>
    <li><a href="{{ route('events.indexhvh')}}">PHÒNG HỌP</a></li>
    <li><a href="{{ route('events.indexhvtv1')}}">TƯ VẤN 1</a></li>
    <li><a href="{{ route('events.indexhvtv2')}}">TƯ VẤN 2</a></li>
    <li><a href="{{ route('events.indexhvtv3')}}">TƯ VẤN 3</a></li>
    
  </ul>

</div></div></div>


              <div class="panel-body">    

                   {!! Form::open(array('route' => 'events.addhvdt','method'=>'POST','files'=>'true')) !!}
                    <div class="row">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                          @if (Session::has('success'))
                             <div class="alert alert-success">{{ Session::get('success') }}</div>
                          @elseif (Session::has('warnning'))
                              <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                          @elseif (Session::has('datphong'))
                           <div class="alert alert-danger">{{ Session::get('datphong') }}</div>
                          @endif

                      </div>
<input type="text" value="Phòng Đào tạo Hồn Việt" name="diadiem" style="display: none">
                      <div class="col-xs-4 col-sm-4 col-md-3">
                        <div class="form-group">
                            {!! Form::label('event_name','Tên công việc') !!}
                            <div class="">
                            {!! Form::text('event_name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>
<div class="col-xs-4 col-sm-4 col-md-2">
                        <div class="form-group">
                            {!! Form::label('event_name','Mời tham dự') !!}
                            <div class="">
                           <select id="multiple-checkboxes" multiple style="display: none;">
            @foreach($email as $key)
            <option value="{{$key->email}}"> {{$key->name}}</option>
            @endforeach
        
        </select>
        <div class="btn-group"><input type="text" class="form-control" id="dev-table-filter" data-action="filter2" data-filters="#title" placeholder="Tìm kiếm" /><button type="button" class="multiselect dropdown-toggle btn btn-default" data-toggle="dropdown" title="None selected" style="width: 190px"><span class="multiselect-selected-text" id="show">None selected</span> <b class="caret"></b></button>
            <ul class="multiselect-container dropdown-menu" id="title">
              
                @foreach($email as $key)
                <li><a tabindex="0"><label class="checkbox" >
                     <input type="checkbox" value="{{$key->email}}" name="checkbox[]">{{$key->name}}<p>
                     <span>{{$key->email}} </span></p></label></a></li>
                     @endforeach 
            </ul></div>
                            {!! $errors->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>
                   <div class="col-xs-4 col-sm-4 col-md-2">   
                     <div class="form-group" >
      <label for="comment">Nội dung</label>
      <textarea class="form-control" rows="3" id="comment" name="noidung"></textarea>
    </div></div>
                      <div class="col-xs-3 col-sm-3 col-md-2">
                        <div class="form-group">
                          {!! Form::label('start_date','Start Date:') !!}
                          <div class="">
                    <!--    {!! Form::date('start_date', null, ['class' => 'form-control']) !!} -->
                          <input class="form-control" name="start_date" type="datetime-local" id="start_date">
                          {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-3 col-sm-3 col-md-2">
                        <div class="form-group">
                          {!! Form::label('end_date','End Date:') !!}
                          <div class="">
                        <!--   {!! Form::date('end_date', null, ['class' => 'form-control']) !!} -->
                          <input class="form-control" name="end_date" type="datetime-local" id="end_date">
                          {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                      {!! Form::submit('Đặt lịch',['class'=>'btn btn-primary']) !!}
                      </div>

                    </div>
                   {!! Form::close() !!}

             </div>

            </div>

            <div class="panel panel-primary">
              <div class="panel-heading">MY Event Details</div>
              <div class="panel-body" >
               {!! $calendar->calendar() !!}
  			  {!! $calendar->script() !!}
              </div>
            </div>

   

@endsection