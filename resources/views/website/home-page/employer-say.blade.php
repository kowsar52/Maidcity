 <!-- testimonial-area -->
 <section class="services-area services-bg" data-background="assets/website/img/bg/h2_testimonial_bg.jpg">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-xl-6 col-lg-8">
                 <div class="section-title white-title text-center mb-50 tg-heading-subheading animation-style2">
                     <h2 class="title tg-element-title text-uppercase">{{ __('general.what_our_employers_say') }}</h2>
                 </div>
             </div>
         </div>
         <div class="row services-active">
             @if(!empty($employerSay->items))
                @foreach($employerSay->items as $key => $emp)
                     <div class="col-lg-4">
                         <div class="services-item">
                             <div class="services-content">
                                 <div class="content-top">
                                     <p class="show-read-more">{{ $emp['review_description'] }}</p>
                                 </div>
                                 <div class="avatar-info mt-2">
                                     <h5 class="mb-0">{{ $emp['employer_name'] }}</h5>
                                     {{--<p class="mb-0">{{ isset($emp['date']) ? Carbon\Carbon::parse($emp['date'])->format('d F Y') : '' }}</p>--}}
                                 </div>
                             </div>
                         </div>
                     </div>
                @endforeach
             @else
                 <div class="col-lg-4">
                     <div class="services-item">
                         <div class="services-content">
                             <div class="content-top">
                                 <p class="show-read-more">{{__('general.employer_say') }}</p>
                             </div>
                             <div class="avatar-info mt-2">
                                 <h5 class="mb-0">{{ __('general.mr_robey_alexa') }}</h5>
                                 {{--<p class="mb-0">{{ __('general.10_september_2023') }}</p>--}}
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4">
                     <div class="services-item">
                         <div class="services-content">
                             <div class="content-top">
                                 <p class="show-read-more">{{__('general.employer_say2') }}</p>
                             </div>
                             <div class="avatar-info mt-2">
                                 <h5 class="mb-0">{{ __('general.cheng') }}</h5>
                                 {{--<p class="mb-0">{{ __('general.10_september_2023') }}</p>--}}
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4">
                     <div class="services-item">
                         <div class="services-content">
                             <div class="content-top">
                                 <p class="show-read-more">{{__('general.employer_say3') }}</p>
                             </div>
                             <div class="avatar-info mt-2">
                                 <h5 class="mb-0">{{ __('general.christine') }}</h5>
                                 {{--<p class="mb-0">{{ __('general.10_september_2023') }}</p>--}}
                             </div>
                         </div>
                     </div>
                 </div>
             @endif
         </div>
     </div>
 </section>
 <!-- testimonial-area-end -->
