@extends('datxe.datxekethua')
@section('body')
      <div class="panel panel-primary">

             <div class="panel-heading"><div class="dropdown" style=" text-align: center; color: yellow">
<h1>ĐẶT XE ZINGER</h1>

</div></div></div>


              <div class="panel-body">    

                   {!! Form::open(array('route' => 'events.addzinger','method'=>'POST','files'=>'true')) !!}
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

                      <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            {!! Form::label('event_name','Tên công việc') !!}
                            <div class="">
                            {!! Form::text('event_name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>
                       <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            {!! Form::label('di','Điểm đi') !!}
                            <div class="">
                            {!! Form::text('di', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('di', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>
                       <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            {!! Form::label('toi','Điểm đến') !!}
                            <div class="">
                            {!! Form::text('toi', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('toi', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                      </div>


                      <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                          {!! Form::label('start_date','Start Date:') !!}
                          <div class="">
                    <!--    {!! Form::date('start_date', null, ['class' => 'form-control']) !!} -->
                          <input class="form-control" name="start_date" type="datetime-local" id="start_date">
                          {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                        </div>
                      </div>

                      <div class="col-xs-2 col-sm-2 col-md-2">
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