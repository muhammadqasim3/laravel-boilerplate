@extends('layouts.main')
@section('content')

<!-- ============================================================== -->
<!-- BODY START HERE -->
<!-- ============================================================== -->
<div class="custom-slider">
  <div class="carousel slide topslider" data-ride="carousel" id="carousel-example-generic">
    <ol class="carousel-indicators">
      <li class="active" data-slide-to="0" data-target="#carousel-example-generic"></li>
      <li class="" data-slide-to="1" data-target="#carousel-example-generic"></li>
      <li data-slide-to="2" data-target="#carousel-example-generic"></li>
      <li data-slide-to="3" data-target="#carousel-example-generic"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img alt="" src="{{asset('images/banner-sec.jpg')}}">
        <div class="sliderItem">
          <div class="container">
            <div class="row flexRow">
              <div class="col-md-6 col-sm-6 col-xs-12 flexCol">
                <div>
                  <div class="slider-content">
                    <h1 class="wow animated fadeInUp" data-wow-delay="0.1s">Online EMDR Therapy</h1>
                    <p class="wow animated fadeInUp" data-wow-delay="0.4s">Online mental health advisory service is here to provide help with mental health difficulties in the comfort of one’s own home.</p>
                    <p class="wow animated fadeInUp" data-wow-delay="0.5s">The use of online EMDR therapy as a way of addressing trauma and other mental health difficulties is becoming more widespread as it  represents an easy way to access evidence-based treatment from wherever you are.</p>
                    <p class="wow animated fadeInUp" data-wow-delay="0.6s">You can access online EMDR and mental health advisory using CBT approach here.</p>
                    
                    <div class="btn-sec wow animated fadeInUp" data-wow-delay="0.8s">
                      <a href="#">Book Appointment</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><a class="left carousel-control" data-slide="prev" href="#carousel-example-generic" role="button"><span class="sr-only">Previous</span></a> <a class="right carousel-control" data-slide="next" href="#carousel-example-generic" role="button"><span class="sr-only">Next</span></a>
    </div>
  </div>
</div>
<section class="help-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 centerCol">
        <div class="heading">
          <h2 class="wow animated fadeInUp" data-wow-delay="0.2s">I can help with</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="help-slider">
      @foreach($_getProblems as $_getProblem)
        <div>
          <div class="help-info wow animated fadeInUp" data-wow-delay="0.1s">
            <div class="helpytag"><img alt="" src="{{asset($_getProblem->image)}}"></div>
            <div class="help-text">
              <a href="{{route('iCanHelpWith')}}#{{$_getProblem->problem_name}}"><h5>{{$_getProblem->problem_name}}</h5></a>
              <?php print_r($_getProblem->short_description) ?>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<section class="story-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12">
      <h2 class="wow animated fadeInDown">About Me</h2><img alt="" class="thumbnail wow animated fadeInUp" data-wow-delay="0.1s" src="{{asset('images/story-img.jpg')}}"></div>
      <div class="col-md-4 col-sm-4 col-xs-12">
        @if(Auth::user()->role == 1)
          <button id="check"  data-id="1" data-title="{{$_Banner->content}}" data-toggle="tooltip" title="Edit Content"  class="btn btn-danger btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></button>
        @endif
        <div class="story-info wow animated fadeInUp" data-wow-delay="0.1s">
          <?php print_r($_cmsAbout->editor_content) ?>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12">
	  <form method="POST" action="{{route('requestSubmit')}}" class="wow animated fadeInUp" data-wow-delay="0.3s">
        @csrf
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <h5>Request<br>
              For Information</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input placeholder="Your Name" name="name" type="text" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input placeholder="Your Email" name="email" type="email" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input placeholder="Your Phone" name="phone" type="text" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <textarea cols="30" id="" name="message" placeholder="Message" rows="5" required></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <button>Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<section class="what-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-12 centerCol">
        <h1 class="text-center">What do I offer</h1>
      </div>
    </div>
    @if($_getProblems)
      <?php $sum = count($_getProblems); ?>
    @foreach($_getServices as $_getService)
    <?php
      $num = $sum%2;
      if($num == 0){
    ?>
    <div class="row flexRow">
      <div class="col-md-6 col-sm-6 col-xs-12"><img alt="" class="wow animated fadeInLeft" data-wow-delay="0.1s" src="{{asset($_getService->image)}}"></div>
      <div class="col-md-6 col-sm-6 col-xs-12 flexCol">
        <div>
          <div class="what-info wow animated fadeInRight" data-wow-delay="0.3s">
            <h2>{{$_getService->service_name}}</h2>
            <?php print_r($_getService->description) ?>
          </div>
        </div>
      </div>
    </div>
    <?php $sum--;} ?>
    <?php if($num==1){?>
    <div class="row flexRow">
      <div class="col-md-6 col-sm-6 col-xs-12 flexCol">
        <div>
          <div class="what-info wow animated fadeInLeft" data-wow-delay="0.3s">
            <h2>{{$_getService->service_name}}</h2>
            <?php print_r($_getService->description) ?>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12"><img alt="" class="wow animated fadeInRight" data-wow-delay="0.5s" src="{{asset('images/what02.jpg')}}"></div>
    </div>
    <?php $sum--;} ?>
    @endforeach
    @endif
  </div>
</section>
<div class="faqsec">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-6 centerCol">
        <div class="heading text-center">
          <h2 class="wow animated fadeInUp" data-wow-delay="0.1s">Frequently Asked Questions</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div aria-multiselectable="true" class="panel-group" id="accordion" role="tablist">
          @foreach($_getFaqs as $_getFaq)
          <div class="panel panel-defaul">
            <div class="panel-heading" id="headingOne" role="tab">
              <h4 class="panel-title"><a aria-controls="collapse{{$_getFaq->id}}" aria-expanded="false" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse{{$_getFaq->id}}" role="button">{{$_getFaq->question}}</a></h4>
            </div>
            <div aria-expanded="false" aria-labelledby="headingOne" class="panel-collapse collapse" id="collapse{{$_getFaq->id}}" role="tabpanel" style="height: 0px;">
              <div class="panel-body">
                <?php print_r($_getFaq->answer) ?>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@include('extends.contact-form');
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title">Editor Modal</h4> -->
      </div>
      <form method="post" action="{{route('frontEditorSubmit')}}">
        @csrf
        <div class="modal-body">
          <input type="hidden" name="editor_key" value="about">
          <input type="hidden" name="editor_id" value="{{$_cmsAbout->id}}">
          <textarea class="form-control" id="about-ckeditor" name="editor_content"><?php print_r($_cmsAbout->editor_content) ?></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Apply</button>
        </div>
      </form>
    </div>
  </div>
</div> 
<!-- ============================================================== -->
<!-- BODY END HERE -->
<!-- ============================================================== -->

@endsection
@section('css')
<style>

</style>
@endsection
@section('js')
<script>
CKEDITOR.replace( 'about-ckeditor' );

$('button#check').on('click', function(e) {
    e.preventDefault();
    var id = $(this).data('id');
    $('#myModal').data('id', id).modal('show');
    $("#mytextarea").html($(this).data("title"));
}); 
</script>
<script type="text/javascript">
  
</script>
@endsection