<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Message from Contact Us Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        /**
         * Google webfonts. Recommended to include the .woff version for cross-client compatibility.
         */
        @media screen {
            @font-face {
                font-family: 'Source Sans Pro';
                font-style: normal;
                font-weight: 400;
                src: local('Source Sans Pro Regular'), local('SourceSansPro-Regular'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/ODelI1aHBYDBqgeIAH2zlBM0YzuT7MdOe03otPbuUS0.woff) format('woff');
            }
            @font-face {
                font-family: 'Source Sans Pro';
                font-style: normal;
                font-weight: 700;
                src: local('Source Sans Pro Bold'), local('SourceSansPro-Bold'), url(https://fonts.gstatic.com/s/sourcesanspro/v10/toadOcfmlt9b38dHJxOBGFkQc6VGVFSmCnC_l7QZG60.woff) format('woff');
            }
        }
        /**
         * Avoid browser level font resizing.
         * 1. Windows Mobile
         * 2. iOS / OSX
         */
        body,
        table,
        td,
        a {
            -ms-text-size-adjust: 100%; /* 1 */
            -webkit-text-size-adjust: 100%; /* 2 */
        }
        /**
         * Remove extra space added to tables and cells in Outlook.
         */
        table,
        td {
            mso-table-rspace: 0pt;
            mso-table-lspace: 0pt;
        }
        /**
         * Better fluid images in Internet Explorer.
         */
        img {
            -ms-interpolation-mode: bicubic;
        }
        /**
         * Remove blue links for iOS devices.
         */
        a[x-apple-data-detectors] {
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            color: inherit !important;
            text-decoration: none !important;
        }
        /**
         * Fix centering issues in Android 4.4.
         */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
        body {
            width: 100% !important;
            height: 100% !important;
            padding: 0 !important;
            margin: 0 !important;
        }
        /**
         * Collapse table borders to avoid space between cells.
         */
        table {
            border-collapse: collapse !important;
        }
        a {
            color: #1a82e2;
        }
        img {
            height: auto;
            line-height: 100%;
            text-decoration: none;
            border: 0;
            outline: none;
        }
    </style>

</head>
<body style="background-color: #e9ecef;">
@php
    $branch = [];
    if (in_array('kovan@maidcity.com.sg',$model->branch_enquiry)){
        $branch[] = __('general.kovan');
    }
    if (in_array('clementi@maidcity.com.sg',$model->branch_enquiry)){
        $branch[] = __('general.clementi');
    }
    if (in_array('toapayoh@maidcity.com.sg',$model->branch_enquiry)){
        $branch[] = __('general.toa_payoh');
    }
@endphp
<!-- start body -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 135px;">

    <!-- start logo -->
    <tr>
        <td align="center" bgcolor="#e9ecef">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                <tr>
                    <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                <tr>
                    <td align="center" valign="top" style="padding: 36px 24px;">
                        <a href="{{ route('website.home-page') }}" target="_blank" style="display: inline-block;">
                            <img src="{{ asset('assets/website/img/logo/logo.png') }}" alt="Logo" border="0" style="display: block; width: 153px;">
                        </a>
                    </td>
                </tr>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- end logo -->

    <!-- start copy block -->
    <tr>
        <td align="center" bgcolor="#e9ecef">
            <!--[if (gte mso 9)|(IE)]>
            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                <tr>
                    <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

                <!-- start copy -->
                <tr>
                    <td align="left" bgcolor="#ffffff" style="padding: 24px; font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 24px;">
                        <p style="margin-bottom: 0;">
                            Hi there,
                        </p>
                        <p style="margin-bottom: 0;">
                            This message is for
                            @foreach($branch as $b)
                                {{ $b }}
                                @if(!$loop->last)
                                    and
                                @endif
                            @endforeach
                        </p>
                        <p style="margin-bottom: 0;">
                            Please contact the following customer regarding Maid Ref No: {{\App\Services\FdwBioDataService::getPrefixId($model->fdwBioData->id) ?? ''}}
                        </p>
                        <h5 style="margin-bottom: 0;">Client’s Information</h5>
                        <table style="width: 100%;">
                            <tr>
                                <th style="text-align: left;">Name</th>
                                <td>{{$model->employer->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">Phone</th>
                                <td>{{$model->employer->contact_number ?? ''}}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">Email</th>
                                <td>{{$model->employer->email ?? ''}}</td>
                            </tr>
                            <tr>
                                <th style="text-align: left;">Message from Client</th>
                                <td>{{ $model->message ?? '' }}</td>
                            </tr>
                        </table>
                        <p style="margin-bottom: 0;">
                            Thank you.
                        </p>
                    </td>
                </tr>
                <!-- end copy -->

            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
    <!-- end copy block -->

</table>
<!-- end body -->

</body>
</html>
