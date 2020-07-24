<!-- Begin: FOOTER -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-xs-12 col-sm-4">
        <div class="ftr_txt">
          <a href="{{url('/')}}"><img alt="" src="{{ asset($logo->img_path) }}"></a>
          <p>Online mental health advisory service is here to provide help with mental health difficulties in the comfort of one’s own home.</p>
        </div>
      </div>
      <div class="col-md-2 col-xs-12 col-sm-2">
        <div class="ftr_txt">
          <h2>Quick Links</h2>
          <ul>
            <li>
              <a class="active" href="{{url('/')}}">Home</a>
            </li>
            <li>
              <a href="{{ url('about') }}">About me</a>
            </li>
            <li>
              <a href="{{url('/faqs')}}">Faq’s</a>
            </li>
            <li>
              <a href="{{url('/resource')}}">Resources</a>
            </li>
            <li>
              <a href="{{url('/emdr-therapy')}}">EMDR
              Therapy</a>
            </li>
            <li>
              <a href="{{url('/cognitive-behavioural')}}">CBT Informed Interventions</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-4  col-sm-4 col-xs-12">
        <div class="ftr_txt">
          <h2>Contact Info</h2>
          <div class="info_img">
            <i class="fa fa-phone"></i>
            <div class="info_txt">
              <a href="tel:{{ App\Http\Traits\HelperTrait::returnFlag(59) }}">{{ App\Http\Traits\HelperTrait::returnFlag(59) }}</a>
            </div>
          </div>
          <div class="info_img">
            <i class="fa fa-envelope"></i>
            <div class="info_txt">
              <a href="mailto:{{ App\Http\Traits\HelperTrait::returnFlag(218) }}">{{ App\Http\Traits\HelperTrait::returnFlag(218) }}</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3  col-sm-3 col-xs-12">
        <div class="ftr_txt">
          <h2>Social links</h2>
          <div class="ftr_social">
            <a href="{{ App\Http\Traits\HelperTrait::returnFlag(682) }}" target="_blank"><i aria-hidden="true" class="fa fa-facebook"></i></a>
             <a href="{{ App\Http\Traits\HelperTrait::returnFlag(1960) }}" target="_blank"><i aria-hidden="true" class="fa fa-twitter"></i></a> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copyrght">
    <p>{{ App\Http\Traits\HelperTrait::returnFlag(499) }}</p>
  </div><a class="show" id="button"></a>
</footer>
<!-- END Footer -->