<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('general.mom_pdf_title')}}</title>
    <link rel="stylesheet" href="{{asset('assets/website/css/fontawesome-all.min.css')}}">

    <style>
        @page {
            margin: 60px 50px;
        }

        header {
            position: fixed;
            top: -35;
            width: 100%;
            border-bottom: 1px solid;
        }

        footer {
            position: fixed;
            left: 0;
            right: 0;
            bottom: -31px;
            color: black;
            font-size: 0.9em;
            font-weight: bold;
            text-align: center;
        }

        .page-number:before {
            content: "A-" counter(page);
        }

        h5, p {
            margin: 0;
        }

        .top-heading {
            text-align: center;
            font-size: 15px;
            margin: 15px 0;
        }

        .top-paragraph {
            font-size: 11px;
            margin: 0;
        }

        .border-text {
            font-size: 11px;
            border: 1px solid black;
            width: 13px;
            height: 13px;
            float: left;
            text-align: center;
        }

        .table {
            font-size: 13px;
            width: 100%;
            margin-bottom: 11px;
        }

        .profile-picture {
            width: 100%;
            height: 459px;
            border: 0.1rem solid black;
        }

        .page-break {
            page-break-after: always;
        }

        .text-danger {
            color: red;
        }
    </style>
</head>
<body style="font-family: 'Plus Jakarta Sans', 'sans-serif'">
<div>
    <main>
        @include('website.bio-data.mom-pdf.components.header')
        @include('website.bio-data.mom-pdf.ref-no')
        @include('website.bio-data.mom-pdf.personal-information')
        @include('website.bio-data.mom-pdf.medical-history')
        @include('website.bio-data.mom-pdf.others')
        @include('website.bio-data.mom-pdf.skill-of-mdw')
        @include('website.bio-data.mom-pdf.employment-history-of-the-mdw')
        @include('website.bio-data.mom-pdf.availability-of-mdw')
        @include('website.bio-data.mom-pdf.other-remarks')
        @include('website.bio-data.mom-pdf.additional-detail')
        {{--        @include('website.bio-data.mom-pdf.skill-of-fdw')--}}
        {{--        @include('website.bio-data.mom-pdf.work-experience')--}}
        {{--        @include('website.bio-data.mom-pdf.preference-of-work')--}}
    </main>
</div>
</body>
</html>
