 <!-- testimonial-area -->
 <section class="services-area services-bg bg-light" >
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-xl-6 col-lg-8">
                 {{-- <div class="section-title white-title text-center mb-50 tg-heading-subheading animation-style2">
                     <h2 class="title tg-element-title text-uppercase">{{ __('general.what_our_employers_say') }}</h2>
                 </div> --}}
                 <div class="sec-title text-center mb-5">
                    <span class="sub-text text-dark mb-3">Testimonials</span>
                    <h2 class="title tg-element-title text-uppercase text-danger">
                        {{ __('general.what_our_employers_say') }}
                    </h2>
            </div>
             </div>
         </div>
         <div class="row services-active">
             @if(!empty($employerSay->items))
                @foreach($employerSay->items as $key => $emp)
                     <div class="col-lg-4">
                         {{-- <div class="services-item">
                             <div class="services-content">
                                 <div class="content-top">
                                     <p class="show-read-more">{{ $emp['review_description'] }}</p>
                                 </div>
                                 <div class="avatar-info mt-2">
                                     <h5 class="mb-0">{{ $emp['employer_name'] }}</h5>
                                     <p class="mb-0">{{ isset($emp['date']) ? Carbon\Carbon::parse($emp['date'])->format('d F Y') : '' }}</p>
                                 </div>
                             </div>
                         </div> --}}
                         <div class="testi-item">
                            <div class="item-content">
                                <span>
                                    <img src="{{ asset('assets/images/quote3.png') }}" alt="testimonial">
                                </span>
                                <p class="show-read-more">“{{ $emp['review_description'] }}”</p>
                            </div>
                            <div class="testi-content">
                                <div class="ratting">
                                    <img src="{{ asset('assets/images/ratting.png') }}" alt="">
                                </div>
                                <div class="testi-name">{{ $emp['employer_name'] }}</div>
                                <span class="testi-title">{{ isset($emp['date']) ? Carbon\Carbon::parse($emp['date'])->format('d F Y') : '' }}</span>
                            </div>
                        </div>
                     </div>
                @endforeach
             @else
                 
                 <div class="col-lg-4">
                    <div class="testi-item">
                        <div class="item-content">
                            <span>
                                <img src="{{ asset('assets/images/quote3.png') }}" alt="testimonial">
                            </span>
                            <p class="show-read-more">“{{__('general.employer_say') }}”</p>
                        </div>
                        <div class="testi-content">
                            <div class="ratting">
                                <img src="{{ asset('assets/images/ratting.png') }}" alt="">
                            </div>
                            <div class="testi-name">{{ __('general.cheng') }}</div>
                            <span class="testi-title">{{  __('general.10_september_2023')  }}</span>
                        </div>
                    </div>
                 </div>
                 <div class="col-lg-4">
                    <div class="testi-item">
                        <div class="item-content">
                            <span>
                                <img src="{{ asset('assets/images/quote3.png') }}" alt="testimonial">
                            </span>
                            <p class="show-read-more">“{{__('general.employer_say2') }}”</p>
                        </div>
                        <div class="testi-content">
                            <div class="ratting">
                                <img src="{{ asset('assets/images/ratting.png') }}" alt="">
                            </div>
                            <div class="testi-name">{{ __('general.cheng') }}</div>
                            <span class="testi-title">{{  __('general.10_september_2023')  }}</span>
                        </div>
                    </div>
                 </div>
                 <div class="col-lg-4">
                    <div class="testi-item">
                        <div class="item-content">
                            <span>
                                <img src="{{ asset('assets/images/quote3.png') }}" alt="testimonial">
                            </span>
                            <p class="show-read-more">“{{__('general.employer_say3') }}”</p>
                        </div>
                        <div class="testi-content">
                            <div class="ratting">
                                <img src="{{ asset('assets/images/ratting.png') }}" alt="">
                            </div>
                            <div class="testi-name">{{ __('general.cheng') }}</div>
                            <span class="testi-title">{{  __('general.10_september_2023')  }}</span>
                        </div>
                    </div>
                 </div>
                 
             @endif
         </div>
     </div>
 </section>
 <!-- testimonial-area-end -->

 <!-- Testimonial Section Start -->
 <div id="rs-testimonial" class="rs-testimonial testimonial-style3 bg11 d-none">
    <div class="testi-bg pt-115 pb-120 md-pt-75 md-pb-80">
        <div class="container">
              <div class="sec-title text-center mb-55 md-mb-35">
                      <span class="sub-text green-color yellow-color">Testimonials</span>
                      <h2 class="title white-color">
                          Whats Our Valued Customers<br>
                          Saying About Us.
                      </h2>
              </div>
            <div class="rs-carousel owl-carousel">
                  <div class="testi-item">
                      <div class="item-content">
                          <span>
                              <img src="{{ asset('assets/images/quote3.png') }}" alt="testimonial">
                          </span>
                          <p>“Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway.”</p>
                      </div>
                      <div class="testi-content">
                          <div class="ratting">
                              <img src="{{ asset('assets/images/ratting.png') }}" alt="">
                          </div>
                          <div class="testi-name">Tanner Joni</div>
                          <span class="testi-title">CEO, Max Housing</span>
                      </div>
                  </div>
                  <div class="testi-item">
                      <div class="item-content">
                          <span>
                              <img src="{{ asset('assets/images/quote3.png') }}" alt="testimonial">
                          </span>
                          <p>“Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway.”</p>
                      </div>
                      <div class="testi-content">
                          <div class="ratting">
                              <img src="{{ asset('assets/images/ratting.png') }}" alt="">
                          </div>
                          <div class="testi-name">Tanner Joni</div>
                          <span class="testi-title">CEO, Max Housing</span>
                      </div>
                  </div>
                  <div class="testi-item">
                      <div class="item-content">
                          <span>
                              <img src="{{ asset('assets/images/quote3.png') }}" alt="testimonial">
                          </span>
                          <p>“Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway.”</p>
                      </div>
                      <div class="testi-content">
                          <div class="ratting">
                              <img src="{{ asset('assets/images/ratting.png') }}" alt="">
                          </div>
                          <div class="testi-name">Tanner Joni</div>
                          <span class="testi-title">CEO, Max Housing</span>
                      </div>
                  </div>
                  
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Section End -->


