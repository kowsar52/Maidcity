<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('general.print_pdf_title')}}</title>
    <link rel="stylesheet" href="{{asset('assets/website/css/fontawesome-all.min.css')}}">

    <style>
        @page { margin: 60px 50px; }
        header {
            position: fixed;
            top: -25;
            width: 100%;
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

        .blue_color {
            color: #ED1C24;
            font-weight: bold;
        }

        .flag-img {
            width: 20%;
        }

        .between-row {
            width: 50%;
            float: left;
        }

        .text-right {
            text-align: right !important;
        }

        .mt-3 {
            margin-top: 1.5rem;
        }

        .py-2 {
            padding-top: 0.80rem;
            padding-bottom: 0.80rem;
        }

        .w-90 {
            width: 90%;
        }

        .border-top-4 {
            border-top: 4px solid #dee2e6 !important;
        }

        .fw-bold {
            font-weight: bold;
        }

        .border-bottom-dot {
            border-bottom-style: dotted;
        }

        .w-50 {
            width: 50% !important;
        }

        .w-100 {
            width: 100%;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 20px;
        }

        table th, td {
            text-align: left;
            padding: 0.6rem 0.6rem;
            font-size: 0.8rem;

        }

        .card-heading {
            border-top: 2px solid #ED1C24;
            border-bottom: 1px solid #ccc;
            background: rgba(204, 204, 204, .05);
            color: #ED1C24;
            font-size: 1rem;
            padding: 0.5rem 0.2rem;
            margin-bottom: 21px;
        }

        p {
            font-size: 0.8rem;
        }
        .list-items {
            border: none !important;
            border-bottom: 1px solid #bebebe !important;
            font-size: 0.8rem;
            font-weight: bold;
           position: relative;
        }
        .position-left {
            position: absolute;
            left: 0;
            top: -20px;
        }
        .position-right {
            position: absolute;
            right: 0;
            top: -20px
        }
        .text-success {
            color: #219653;
        }
        .text-danger {
            color: #FF3C3C;
        }
        .text-warning {
            color: #FFB930;
        }
        .text-center {
            text-align: center;
        }
        .table-primary-dark {
            --bs-table-bg: #009efb;
            --bs-table-striped-bg: #009efb;
            --bs-table-striped-color: #000;
            --bs-table-active-bg: #009efb;
            --bs-table-active-color: #000;
            --bs-table-hover-bg: #009efb;
            --bs-table-hover-color: #000;
            color: #000;
            border-color: #009efb;
        }

        /*.table-bottom-dot th ,td {*/
        /*    border-bottom-style: dotted;*/
        /*}*/
        .table-heading-color {
            background-color: #F14E54;
            color: white;
        }
        .work-td {
            width: 40%;
            padding-right: 10px;
            position: relative;
        }
        .work-td-div {
            position: absolute;
            right: 0;
            border-bottom: 1px solid #bebebe !important;
        }
        .mt-long {
            margin-top: 550px;
        }
        .logo {
            width: 11%;
        }

        .pagenum:before {
            content: counter(page);
        }
        .pt-0 {
            padding-top: 0;
        }
        .max-he {
            max-height: 500px !important;
        }
        .border-dark {
            border: solid 1px black;!important;
        }
    </style>
</head>
<body style="font-family: 'Plus Jakarta Sans', 'sans-serif'">
    <div>
        <header style="border-bottom: 1px solid !important;">
            <img src="{{ asset('assets/website/img/logo/logo.png') }}" alt="Logo" class="logo">
            <small style="font-style: italic; color: #0a53be">{{__('general.website_link')}}</small>
        </header>
        <main>
            @include('website.bio-data.print-pdf.ref-no')
            @include('website.bio-data.print-pdf.profile-detail')
            @include('website.bio-data.print-pdf.maid-intro')
            @include('website.bio-data.print-pdf.medical')
            @include('website.bio-data.print-pdf.skill')
            @include('website.bio-data.print-pdf.additional_info')
            @include('website.bio-data.print-pdf.work-experience')
            @include('website.bio-data.print-pdf.prefrence-of-work')
        </main>
    </div>
</body>
</html>
