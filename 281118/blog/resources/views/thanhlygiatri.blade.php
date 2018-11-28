  <ul class="templatemo-project-gallery" >
                       @foreach($thanhly as $key)
                        <li class="col-lg-2 col-md-2 col-sm-2  gallery gallery-graphic" >
                            <!-- <a class="colorbox" href="{{URL::asset('layouts/images/thanhly')}}/{{$key->Hinh}}" data-group="gallery-graphic"> -->
                                <div class="templatemo-project-box tlgt">

                                    <img src="{{URL::asset('layouts/images/thanhly')}}/{{$key->Hinh}}" class="img-responsive" alt="gallery" />

                                    <div class="project-overlay countdown">
                                        <h5>{{$key->MTS}}</h5>
                                        <p>{{str_limit($key->Mota,60,'....')}}</p>
                                        <hr/>
                                        <h5  data-countdown="{{$key->Thoihan}}">{{$key->Thoihan}}</h5>
                                    </div> 
                                </div>
                            </a>
                        <div class="row">
                            <div class="col-md-12">
                                <h6><span style="font-weight: bold;">{{$key->Ten}}</span></h6>
                            </div>

                            <div class="col-md-12">
                                <h4>
                                    <span class="txt_orange">Giá:</span>
                                    <span>{{$key->Giadexuat}} VNĐ</span>
                                </h4>
                            </div>
                         
                            <div class="col-md-12 text-right">
                                <span style="color: white; background: red; font-weight: bold;"><h7 data-countdown="{{$key->Thoihan}}">{{$key->Thoihan}}</h7></span>
                            </div>
                        </div>
                     </li>
                     @endforeach
                 </ul>
                   
             </div>
                       <div class="clearfix"></div>
                       <div class="col-sm-2 float-right">{{$thanhly->links()}}</div>
                   </div></div>
                           </div> <!-- /.container -->
        </div>
        <script>
// Set the date we're counting down to
$('[data-countdown]').each(function() {
   var $this = $(this), finalDate = $(this).data('countdown');
    console.log($this.text());
    var countDownDate = new Date($this.text()).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    $this.html(days + " Ngày " + hours + "h"
    + minutes + "m" + seconds+"s");
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        $this.html("Hết hạn");
    }
}, 1000);
});
detailTLGT();
</script>     