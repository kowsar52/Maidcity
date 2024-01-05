@extends('layouts.website')
@section('css-after')
    <style>
        .show-read-more .more-text{
            display: none;
        }
        .slider_img_h {
            height: 430px !important;
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
        .text-stroke {
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: var(--tg-black);
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
            const maxLength = 73;
            $(".show-read-more").each(function(){
                const myStr = $(this).text();
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
@endsection