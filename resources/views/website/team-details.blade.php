@extends('layouts.website')
@section('css-after')
@endsection
@section('content')
    <!-- breadcrumb-area -->
    @include('layouts.website-components.breadcrumb')
    <!-- breadcrumb-area-end -->

    <!-- team-details-area -->
    <section class="team-details-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="team-details-info-wrap">
                        <div class="team-details-thumb">
                            <img src="assets/img/team/team_details_img.jpg" alt="">
                        </div>
                        <div class="team-details-info">
                            <ul class="list-wrap">
                                <li><i class="flaticon-phone-call"></i>+123 8989 444</li>
                                <li><i class="flaticon-mail"></i>info@gmail.com</li>
                                <li><i class="flaticon-location"></i>256 Avenue, Mark Street, Newyork City</li>
                            </ul>
                            <div class="td-info-bottom">
                                <a href="#" class="btn btn-three">Contact With Me</a>
                                <a href="#" class="share-btn"><img src="assets/img/icons/share.svg" alt="">Share</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="team-details-content">
                        <h2 class="title">Leslie Alexander</h2>
                        <span>Finance Advisor</span>
                        <p>Estibulum ac diam sit amet quam vehicula elementum sed sit amet dui Sed porttitor lect us
                            nibh. Praesent sapien massa, convallis a pellentesquam vehiculaestibulum ac diam sit amet
                            quam vehicula elementumsit amet dui Sed porttitor lectus nibPraesent sapien massa convallis
                            a pellentese nec diam sit amet quam vehicula.</p>
                        <div class="team-skill-wrap">
                            <h3 class="title-two">My Expertise & Skills</h3>
                            <p>When an unknown printer took a galley of type and scrambled it to make a type specimen
                                book It has survived not only five centuries</p>
                            <div class="progress-wrap">
                                <div class="progress-item">
                                    <h6 class="title">Finance Consultancy</h6>
                                    <div class="progress" role="progressbar" aria-label="Example with label"
                                         aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar wow slideInLeft" data-wow-delay=".1s"
                                             style="width: 65%"><span>65%</span></div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <h6 class="title">Business</h6>
                                    <div class="progress" role="progressbar" aria-label="Example with label"
                                         aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar wow slideInLeft" data-wow-delay=".2s"
                                             style="width: 80%"><span>80%</span></div>
                                    </div>
                                </div>
                                <div class="progress-item">
                                    <h6 class="title">Marketing</h6>
                                    <div class="progress" role="progressbar" aria-label="Example with label"
                                         aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar wow slideInLeft" data-wow-delay=".3s"
                                             style="width: 90%"><span>90%</span></div>
                                    </div>
                                </div>
                            </div>
                            <p>Estibulum ac diam sit amet quam vehicula elementum sed sit amet dui Sed porttitor lect us
                                nibh. Praesent sapien massa, convallis a pellentesquam vehiculaestibulum ac diam sit
                                amet quam vehicula elementumsit amet dui Sed porttitor lectus nibPraesent sapien massa
                                convallis a pellentese nec diam sit amet quam vehicula.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team-details-area-end -->
@endsection
@section('innerScriptFiles')
@endsection
@section('innerScript')
@endsection
