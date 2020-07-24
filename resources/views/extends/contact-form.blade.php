<div class="get-free-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-7 col-xs-12 centerCol">
        <div class="heading text-center">
          <h2 class="wow  fadeInUp animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Get Free<span>Consultancy</span></h2>
          
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-12 centerCol">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="media">
          <h4 class="media-heading">Email</h4>
          <div class="media-left"><img alt="" src="{{asset('images/iconic-07.png')}}"></div>
          <div class="media-body">
            <p><a href="mailto:{{ App\Http\Traits\HelperTrait::returnFlag(218) }}">{{ App\Http\Traits\HelperTrait::returnFlag(218) }}</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="media no-border">
          <h4 class="media-heading">Phone</h4>
          <div class="media-left"><img alt="" src="{{asset('images/iconic-09.png')}}"></div>
          <div class="media-body">
            <p><a href="tel:{{ App\Http\Traits\HelperTrait::returnFlag(59) }}"><strong>{{ App\Http\Traits\HelperTrait::returnFlag(59) }}</strong></a></p>
          </div>
        </div>
      </div>  
      </div>
      
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <form method="POST" action="{{route('conatctFromInquiry')}}">
        @csrf
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input placeholder="Full Name" name="fname" type="text" required>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input placeholder="Email" name="email" type="text" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input placeholder="Phone Number" name="phone" type="text" required>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input placeholder="Subject" name="subject" type="text" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <textarea cols="30" id="" name="message" placeholder="Comment" rows="6" required></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <button>Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
