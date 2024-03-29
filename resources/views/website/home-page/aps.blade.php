  <!-- aps-area -->
  <section class="about-area-three">
      <div class="container">
          <div class="row align-items-center justify-content-center">
              <div class="col-lg-6 col-md-9">
                  <div class="about-img-wrap-three">
                      <img src="{{ isset($apsImage1->items) ? asset('storage/'.$apsImage1->items) : asset('assets/website/img/images/aps.png') }}" alt=""
                          data-aos="fade-down-right" data-aos-delay="0" width="405px" height="297px">
                      <img src="{{ isset($apsImage2->items) ? asset('storage/'.$apsImage2->items) : asset('assets/website/img/images/h2_about_img02.jpg') }}" alt=""
                          data-aos="fade-left" data-aos-delay="400" width="247px" height="247px">
                      <div class="experience-wrap" data-aos="fade-up" data-aos-delay="300">
                      </div>
                  </div>
              </div>
              {{-- <div class="col-lg-6">
                  <div class="about-content-three">
                      <div class="section-title-two mb-20 tg-heading-subheading animation-style3">
                          <span class="sub-title">{{ __('general.aps') }}</span>
                          <h2 class="title tg-element-title">{{ __('general.advance_placement_scheme_aps') }}</h2>
                      </div>
                      <p class="info-one">{{ isset($apsDescription->items) ? $apsDescription->items : __('general.aps_intro') }}</p>
                      <div class="about-list-two">
                          <ul class="list-wrap">
                              @if(isset($apsList->items) && !empty($apsList->items))
                                  @foreach($apsList->items as $list)
                                      @foreach($list as $l)
                                          <li><i class="fas fa-arrow-right"></i>{{ $l }}</li>
                                      @endforeach
                                  @endforeach
                              @else
                                  <li><i class="fas fa-arrow-right"></i>{{ __('general.face_to_face_interview') }}</li>
                                  <li><i class="fas fa-arrow-right"></i>{{ __('general.better_matching') }}</li>
                                  <li><i class="fas fa-arrow-right"></i>{{ __('general.fast_deploment_3_days') }}</li>
                                  <li><i class="fas fa-arrow-right"></i>{{ __('general.by_ministry_of_Manpower_mom') }}</li>
                              @endif
                          </ul>
                      </div>
                  </div>
              </div> --}}
              <div class="col-xl-6 col-lg-6">
                <div class="about-right-side">
                    <div class="section-heading mb-55">
                        <div class="section-heading-top mb-20">
                            {{-- <img src="assets/images/icons/section-icon-1.png" alt=""> --}}
                            {{-- <h5 class="sub-title"><span>01</span> About Us</h5> --}}
                        </div>
                        <h2 class="section-title">{{ __('general.advance_placement_scheme_aps') }}</h2>
                        <div class="section-content">
                            <p>{{ isset($apsDescription->items) ? $apsDescription->items : __('general.aps_intro') }}</p>
                        </div>
                    </div>
                    <div class="about-list mt-none-25">
                        @if(isset($apsList->items) && !empty($apsList->items))
                        @foreach($apsList->items as $list)
                        @foreach($list as $l)
                        <div class="single-item d-flex align-items-center mt-25">
                            <div class="icon">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                            <span>{{ $l }}</span>
                        </div>
                        @endforeach
                        @endforeach
                        @else
                        <div class="single-item d-flex align-items-center mt-25">
                            <div class="icon position-relative">
                                <i class="fas fa-arrow-right owl_icon"></i>
                            </div>
                            <span>{{ __('general.face_to_face_interview') }}</span>
                        </div>
                        <div class="single-item d-flex align-items-center mt-25">
                            <div class="icon position-relative">
                                <i class="fas fa-arrow-right owl_icon"></i>
                            </div>
                            <span>{{ __('general.better_matching') }}</span>
                        </div>
                        <div class="single-item d-flex align-items-center mt-25">
                            <div class="icon position-relative">
                                <i class="fas fa-arrow-right owl_icon"></i>
                            </div>
                            <span>{{ __('general.fast_deploment_3_days') }}</span>
                        </div>
                        <div class="single-item d-flex align-items-center mt-25">
                            <div class="icon position-relative">
                                <i class="fas fa-arrow-right owl_icon"></i>
                            </div>
                            <span>{{ __('general.by_ministry_of_Manpower_mom') }}</span>
                        </div>
                        @endif
                       
                    </div>
                </div>
            </div>
          </div>
      </div>
      <div class="about-shape-wrap-two">
          <img src="{{ asset('assets/website/img/images/h2_about_shape01.png') }}" alt="">
          <img src="{{ asset('assets/website/img/images/h2_about_shape02.png') }}" alt="">
          <img src="{{ asset('assets/website/img/images/h2_about_shape03.png') }}" alt="" data-aos="fade-left"
              data-aos-delay="500">
      </div>
{{--      <div class="text-center mt-5">--}}
{{--          <a href="{{ route('website.aps') }}" class="btn btn-primary">{{ __('general.learn_more') }}</a>--}}
{{--      </div>--}}
  </section>
  <!-- aps-area-end -->
