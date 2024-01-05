<!-- contact-area -->
<section class="contact-area contact-bg" data-background="assets/img/bg/contact_bg.jpg"
         style="background-image: url('assets/img/bg/contact_bg.jpg');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="inner-contact-info">
                    @if (Route::currentRouteName() == 'website.home-page')
                        <h2 class="title">{{ __('general.contact_us') }}</h2>
                    @else
                        <h2 class="title">{{ __('general.our_office_address') }}</h2>
                    @endif
                    @if(isset(\App\Services\GeneralService::getContactDetail()->items))
                        @foreach(\App\Services\GeneralService::getContactDetail()->items as $key => $value)
                            <div class="contact-info-item">
                                <h5 class="title-two">{{ $value['branch_title'] }}</h5>
                                <ul class="list-wrap">
                                    <li>{{ $value['address'] }}</li>
                                    <li>{{ isset($value['contact_1']) ? $value['contact_1'].',' : '' }}
                                        {{ isset($value['contact_2']) ? __('general.fax').': '. $value['contact_2'] : ''}}</li>
                                    <li>{{ $value['email'] }}</li>
                                </ul>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-7">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="contact-form">
                    {{ html()->form('POST', route('website.contact-us-store'))->open() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-grp">
                                {{ html()->text('name')->placeholder('Name *') }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-grp">
                                {{ html()->email('email')->placeholder('E-mail *') }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-grp">
                                {{ html()->number('phone')->placeholder('Phone *') }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-grp">
                                {{ html()->text('subject')->placeholder('Subject *') }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-grp">
                                {{ html()->textarea('message')->placeholder('Message *') }}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <div id="orchardMap" style="display: none;">
                                        <iframe
                                            src="https://maps.google.com/maps?q=Maidcity%20Orchard,%20545%20Orchard%20Road,%20Far%20East%20Shopping%20Centre,%20Singapore,%20Singapore%20238882&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                            frameborder="0" scrolling="no"
                                            style="width: 100%; height: 301px;"></iframe>
                                        <a href="https://www.eireportingonline.com"
                                           style="color:#fff !important; position:absolute !important; top:0 !important; z-index:0 !important;">ei
                                            reporting online</a>
                                    </div>
                                    <div id="kovanMap">
                                        <iframe
                                            src="https://maps.google.com/maps?q=Maidcity%20Kovan,%20205%20Hougang%20St%2021,%20Heartland%20Mall%20Kovan,%20Singapore%20530205&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                            frameborder="0" scrolling="no"
                                            style="width: 100%; height: 301px;"></iframe>
                                        <a href="https://www.eireportingonline.com"
                                           style="color:#fff !important; position:absolute !important; top:0 !important; z-index:0 !important;">ei
                                            reporting</a>
                                    </div>
                                    <div id="clementiMap" style="display: none;">
                                        <iframe
                                            src="https://maps.google.com/maps?q=Maidcity%20Clementi,%20432%20Clementi%20Ave%203,%20Singapore%20120432&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                            frameborder="0" scrolling="no"
                                            style="width: 100%; height: 301px;"></iframe>
                                        <a href="https://www.eireportingonline.com"
                                           style="color:#fff !important; position:absolute !important; top:0 !important; z-index:0 !important;">ei
                                            reporting</a>
                                    </div>
                                    <div id="toaPayohMap" style="display: none;">
                                        <iframe
                                            src="https://maps.google.com/maps?q=Maidcity%20Toa%20Payoh,%2085%20Lor%204%20Toa%20Payoh,%20Singapore%20310085&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                            frameborder="0" scrolling="no"
                                            style="width: 100%; height: 301px;"></iframe>
                                        <a href="https://www.eireportingonline.com"
                                           style="color:#fff !important; position:absolute !important; top:0 !important; z-index:0 !important;">ei
                                            reporting online</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p>{{ __('general.attend_enquiry') }}</p>
                            <div class="mb-4">
                                {{--<div class="form-check form-check-inline">
                                    {{ html()->radio('branch',true)->value('orchard')->class('form-check-input')->id('orchard')->attribute('onclick','changeMap(this)')->required() }}
                                    {{ html()->label()->text(__('general.orchard'))->for('orchard') }}
                                </div>--}}
                                <div class="form-check form-check-inline">
                                    {{ html()->checkbox('branch[]')->value('kovan')->class('form-check-input')->id('kovan')->attribute('onclick','changeMap(this)') }}
                                    {{ html()->label()->text(__('general.kovan'))->for('kovan') }}
                                </div>
                                <div class="form-check form-check-inline">
                                    {{ html()->checkbox('branch[]')->value('clementi')->class('form-check-input')->id('clementi')->attribute('onclick','changeMap(this)') }}
                                    {{ html()->label()->text(__('general.clementi'))->for('clementi') }}
                                </div>
                                <div class="form-check form-check-inline">
                                    {{ html()->checkbox('branch[]')->value('toa_payoh')->class('form-check-input')->id('toa-payoh')->attribute('onclick','changeMap(this)') }}
                                    {{ html()->label()->text(__('general.toa_payoh'))->for('toa-payoh') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit">{{ __('general.submit_now') }}</button>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="contact-shape">
        <img src="assets/img/images/contact_shape.png" alt="">
    </div>
</section>
<!-- contact-area-end -->
