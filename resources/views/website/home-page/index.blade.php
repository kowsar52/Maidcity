@extends('layouts.website')
@section('css-after')
    <style>
        /* .show-read-more .more-text{
            display: none;
        } */
        .slider_img_h {
            height: 600px !important;
            object-fit: cover !important;
        }
        .breadcrumb-bg::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 97%;
            background: var(--tg-secondary-color);
            opacity: .85;
            z-index: -1;
        }
        /* The overlay effect - lays on top of the container and over the image */
        .overlay {
            position: absolute;
            bottom: 10px;
            background: rgb(36 35 35 / 50%); /* Black see-through */
            width: 100%;
            height: 100%;
            transition: .5s ease;
            opacity:.8;
            color: white;
            font-size: 20px;
            padding: 20px;
            text-align: center;
            z-index: 99;
        }
        .carousel-caption {
            position: absolute;
            right: 15%;
            top: 50%;
            left: 50%;
            /* padding-top: 1.25rem; */
            /* padding-bottom: 1.25rem; */
            color: #fff;
            text-align: center;
            transform: translate(-50%, -50%);
            z-index: 999;
        }
        .text-stroke {
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: var(--tg-black);
        }
        .recommended-mdw-card{
            height: 300px;
            position: relative;
            box-shadow: 0px 0px 10px 5px rgba(221,221,221,0.75);
            border:none;
            border-radius: .5rem;
        }
        .avatar-div img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
        .flag-div img{
            width: 25px;
            height: 20px;
            border-radius: 2px;
        }
        /* The overlay effect - lays on top of the container and over the image */
        .card-overlay {
            position: absolute;
            bottom: 0;
            background: #cd8285;
            color: white !important;
            width: 100%;
            transition: opacity 0.5s ease, transform 0.5s ease; /* Added transform for fade-in effect */
            opacity: 0;
            font-size: 14px;
            padding: 12px;
            transform: translateY(20px); /* Initial position, adjust as needed */
            border-radius: 0 0 0.5rem 0.5rem ;
        }

        /* When you mouse over the container, fade in the overlay */
        .recommended-mdw-card:hover .card-overlay {
            opacity: 1;
            transform: translateY(0); /* Move the overlay to its original position */
        }
        @media only screen and (max-width: 579px) {
            .slider_img_h {
                height: 195px !important;
            }
        }
    </style>
@endsection
@section('content')
    @include('website.home-page.banner')
    @include('website.home-page.aps')
    <!-- brand-area-end -->

    <!-- services-area -->
    <div data-background="assets/website/img/bg/services_bg02.jpg">

        @include('website.services.services-area')
    </div>
    <!-- services-area-end -->
    @include('website.bio-data.maids')
    @include('website.home-page.employer-say')
    @include('website.contact-us.contact-area')
@endsection
@section('innerScriptFiles')
@endsection
@section('innerScript')
<script>
    $(document).ready(function(){
        console.log('alamin');

           const maxLength = 73;
           $(".show-read-more").each(function(){
               const myStr = $(this).text();
               console.log(myStr);
               if($.trim(myStr).length > maxLength){
                   const newStr = myStr.substring(0, maxLength);
                   const removedStr = myStr.substring(maxLength, $.trim(myStr).length);
                   $(this).empty().html(newStr);
                   $(this).append(' <a href="javascript:void(0);" class="read-more">...read more</a>');
                   $(this).append('<span class="more-text">' + removedStr + '</span>');
               }
           });
           $(".read-more").click(function(){
               $(this).siblings(".more-text").contents().unwrap();
               $(this).remove();
           });
       });
</script>
    <script>
       
        /*--------------------------
     slider carousel
---------------------------- */
var intro_carousel = $('.intro-carousel');
intro_carousel.owlCarousel({
	loop:true,
	nav:true,
	autoplay:false,
	dots:false,
	navText: ["<i class='fa fa-chevron-left owl_icon'></i>","<i class='fa fa-chevron-right owl_icon'></i>"],
	responsive:{
		0:{
			items:1
		},
		600:{
			items:1
		},
		1000:{
			items:1
		}
	}
});
var testimonial_carousel = $('.rs-carousel');
testimonial_carousel.owlCarousel({
	loop:true,
	nav:true,
	autoplay:false,
	dots:false,
	responsive:{
		0:{
			items:1
		},
		600:{
			items:2
		},
		1000:{
			items:3
		}
	}
});
    </script>
@endsection
