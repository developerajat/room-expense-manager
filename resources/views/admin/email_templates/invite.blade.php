
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Facebook sharing information tags -->
    <meta property="og:title" content="invitation">
    <link rel="icon" type="image/x-icon" href="{{ $message->embed(public_path('assets/img/icons/favicon.ico')) }}">
    <title>Expense Manager</title>
    <style type="text/css">
        #outlook a {
            padding: 0;
        }

        body {
            width: 100% !important;
        }

        .ReadMsgBody {
            width: 100%;
        }

        .ExternalClass {
            width: 100%;
        }

        body {
            -webkit-text-size-adjust: none;
        }

        body {
            margin: 0;
            padding: 0;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table td {
            border-collapse: collapse;
        }

        #backgroundTable {
            height: 100% !important;
            margin: 0;
            padding: 0;
            width: 100% !important;
        }

     
        body,
        #backgroundTable {
            /*@editable*/
            background-color: #FAFAFA;
        }

   
        #templateContainer {
            /*@editable*/
            border: 1px none #DDDDDD;
        }

    
        h1,
        .h1 {
            /*@editable*/
            color: #202020;
            display: block;
            /*@editable*/
            font-family: 'Nunito Sans', sans-serif;
            /*@editable*/
            font-size: 24px;
            /*@editable*/
            font-weight: bold;
            /*@editable*/
            line-height: 100%;
            margin-top: 20px;
            margin-right: 0;
            margin-bottom: 20px;
            margin-left: 0;
            /*@editable*/
            text-align: center;
        }


        h2,
        .h2 {
            /*@editable*/
            color: #202020;
            display: block;
            /*@editable*/
            font-family: 'Nunito Sans', sans-serif;
            /*@editable*/
            font-size: 30px;
            /*@editable*/
            font-weight: bold;
            /*@editable*/
            line-height: 100%;
            margin-top: 0;
            margin-right: 0;
            margin-bottom: 10px;
            margin-left: 0;
            /*@editable*/
            text-align: center;
        }

        h3,
        .h3 {
            /*@editable*/
            color: #202020;
            display: block;
            /*@editable*/
            font-family: 'Nunito Sans', sans-serif;
            /*@editable*/
            font-size: 26px;
            /*@editable*/
            font-weight: bold;
            /*@editable*/
            line-height: 100%;
            margin-top: 0;
            margin-right: 0;
            margin-bottom: 10px;
            margin-left: 0;
            /*@editable*/
            text-align: center;
        }

        h4,
        .h4 {
            /*@editable*/
            color: #202020;
            display: block;
            /*@editable*/
            font-family: 'Nunito Sans', sans-serif;
            /*@editable*/
            font-size: 22px;
            /*@editable*/
            font-weight: bold;
            /*@editable*/
            line-height: 100%;
            margin-top: 0;
            margin-right: 0;
            margin-bottom: 10px;
            margin-left: 0;
            /*@editable*/
            text-align: center;
        }

 
        #templatePreheader {
            /*@editable*/
            background-color: #FAFAFA;
        }


        .preheaderContent div {
            /*@editable*/
            color: #505050;
            /*@editable*/
            font-family: 'Nunito Sans', sans-serif;
            /*@editable*/
            font-size: 10px;
            /*@editable*/
            line-height: 100%;
            /*@editable*/
            text-align: left;
        }


        .preheaderContent div a:link,
        .preheaderContent div a:visited,
        .preheaderContent div a .yshortcuts {
            /*@editable*/
            color: #336699;
            /*@editable*/
            font-weight: normal;
            /*@editable*/
            text-decoration: underline;
        }

        .preheaderContent img {
            display: inline;
            height: auto;
            margin-bottom: 10px;
            max-width: 280px;
        }

 
        #templateHeader {
            /*@editable*/
            background-color: #FFFFFF;
            /*@editable*/
            border-bottom: 0;
        }


        .headerContent {
            /*@editable*/
            color: #202020;
            /*@editable*/
            font-family: 'Nunito Sans', sans-serif;
            /*@editable*/
            font-size: 34px;
            /*@editable*/
            font-weight: bold;
            /*@editable*/
            line-height: 100%;
            /*@editable*/
            padding: 0;
            /*@editable*/
            text-align: left;
            /*@editable*/
            vertical-align: middle;
            background-color: #FAFAFA;
            padding-bottom: 14px;
        }


        .headerContent a:link,
        .headerContent a:visited,
        .headerContent a .yshortcuts {
            /*@editable*/
            color: #336699;
            /*@editable*/
            font-weight: normal;
            /*@editable*/
            text-decoration: underline;
        }

        #headerImage {
            height: auto;
            max-width: 400px !important;
        }


        #templateContainer,
        .bodyContent {
            /*@editable*/
            background-color: #FFFFFF;
        }


        .bodyContent div {
            /*@editable*/
            color: #505050;
            /*@editable*/
            font-family: 'Nunito Sans', sans-serif;
            /*@editable*/
            font-size: 14px;
            /*@editable*/
            line-height: 150%;
            /*@editable*/
            text-align: left;
        }


        .bodyContent div a:link,
        .bodyContent div a:visited,
        .bodyContent div a .yshortcuts {
            /*@editable*/
            color: #22a8ff;
            /*@editable*/
            font-weight: normal;
            /*@editable*/
            text-decoration: underline;
        }

        .bodyContent img {
            display: inline;
            height: auto;
            margin-bottom: 10px;
            max-width: 280px;
        }

   
        #templateFooter {
            /*@editable*/
            background-color: #FFFFFF;
            /*@editable*/
            border-top: 0;
        }

 
        .footerContent {
            background-color: #fafafa;
        }

        .footerContent div {
            /*@editable*/
            color: #707070;
            /*@editable*/
            font-family: 'Nunito Sans', sans-serif;
            /*@editable*/
            font-size: 11px;
            /*@editable*/
            line-height: 150%;
            /*@editable*/
            text-align: left;
        }


        .footerContent div a:link,
        .footerContent div a:visited,
        .footerContent div a .yshortcuts {
            /*@editable*/
            color: #336699;
            /*@editable*/
            font-weight: normal;
            /*@editable*/
            text-decoration: underline;
        }

        .footerContent img {
            display: inline;
        }

        #social {
            /*@editable*/
            background-color: #FAFAFA;
            /*@editable*/
            border: 0;
        }


        #social div {
            /*@editable*/
            text-align: left;
        }


        #utility {
            /*@editable*/
            background-color: #FFFFFF;
            /*@editable*/
            border: 0;
        }

   
        #utility div {
            /*@editable*/
            text-align: left;
        }

        #monkeyRewards img {
            display: inline;
            height: auto;
            max-width: 280px;
        }



        .buttonText {
            color: #fff;
            background: #22a8ff;
            text-decoration: none;
            font-weight: normal;
            display: block;
            border-radius: 100px;
            padding: 14px 80px;
            font-family: 'Nunito Sans', sans-serif font-size: 18px;
        }

        #supportSection,
        .supportContent {
            background-color: white;
            font-family: 'Nunito Sans', sans-serif;
            font-size: 12px;
            border-top: 1px solid #22a8ff;
        }

        .bodyContent table {
            padding-bottom: 10px;
        }


        .footerContent p {
            margin: 0;
            margin-top: 2px;
        }

        .headerContent.centeredWithBackground {
            background-color: #F4EEE2;
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            h1 {
                font-size: 40px !important;
            }

            .content {
                font-size: 22px !important;
            }

            .bodyContent p {
                font-size: 22px !important;
            }

            .buttonText {
                font-size: 22px !important;
            }

            p {

                font-size: 16px !important;

            }

            .footerContent p {
                padding-left: 5px !important;
            }

            .mainContainer {
                padding-bottom: 0 !important;
            }
        }

    </style>
</head>

<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"
    style="width:100% ;-webkit-text-size-adjust:none;margin:0;padding:0;background-color:#FAFAFA;">
    <center>
        <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable"
            style="height:100% ;margin:0;padding:0;width:100% ;background-color:#FAFAFA;">
            <tr>
                <td align="center" valign="top" style="border-collapse:collapse;">
                    <table border="0" cellpadding="10" cellspacing="0" width="450" id="templatePreheader"
                        style="background-color:#FAFAFA;">
                        <tr>
                            <td valign="top" class="preheaderContent" style="border-collapse:collapse;">
                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                    <tr>
                                        <td valign="top" style="border-collapse:collapse;">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <!-- // End Template Preheader \\ -->
                    <table border="0" cellpadding="0" cellspacing="0" width="450" id="templateContainer"
                        style="border:1px none #DDDDDD;background-color:#FFFFFF;">
                        <tr>
                            <td align="center" valign="top" style="border-collapse:collapse;">
                                <!-- // Begin Template Header \\ -->
                                <table border="0" cellpadding="0" cellspacing="0" width="450" id="templateHeader"
                                    style="background-color:#FFFFFF;border-bottom:0;">
                                    <tr>
                                        <td class="headerContent centeredWithBackground"
                                            style="border-collapse:collapse;color:#202020;font-family:'Nunito Sans', sans-serif;font-size:34px;font-weight:bold;line-height:100%;padding:0;text-align:center;vertical-align:middle;background-color: #22a8ff33;padding-bottom:20px;padding-top:20px;">
                                            <!-- // Begin Module: Standard Header Image \\ -->
                                            <img width="130"
                                                src="{{ $message->embed(public_path('assets/img/brand/new-logo.png')) }}"
                                                style="width:130px;max-width:130px;border:0;height:auto;line-height:100%;outline:none;text-decoration:none;"
                                                id="headerImage campaign-icon">
                                            <!-- // End Module: Standard Header Image \\ -->
                                        </td>
                                    </tr>
                                </table>
                                <!-- // End Template Header \\ -->
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" style="border-collapse:collapse;">
                                <table border="0" cellpadding="0" cellspacing="0" width="450" id="templateBody">
                                    <tr>
                                        <td valign="top" class="bodyContent"
                                            style="border-collapse:collapse;background-color:#FFFFFF;">
                                            <table border="0" cellpadding="20" cellspacing="0" width="100%"
                                                style="padding-bottom:10px;">
                                                <tr>
                                                    <td valign="top"
                                                        style="padding-bottom:1rem;border-collapse:collapse;"
                                                        class="mainContainer">
                                                        <div
                                                            style="text-align:center;color:#505050;font-family:'Nunito Sans', sans-serif;font-size:14px;line-height:150%;">
                                                            <h1 class="h1"
                                                                style="color:#202020;display:block;font-family:'Nunito Sans', sans-serif;font-size:24px;font-weight:bold;line-height:100%;margin-top:20px;margin-right:0;margin-bottom:20px;margin-left:0;text-align:center;">
                                                                Hi {{ $first_name }}!</h1>
                                                            <p>You are invited to Expense Manager. Please click on the link to sign up!</p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="border-collapse:collapse;">
                                                        <table border="0" cellpadding="0" cellspacing="0"
                                                            style="padding-bottom:10px;">
                                                            <tbody>
                                                                <tr align="center">
                                                                    <td align="center" valign="middle"
                                                                        style="border-collapse:collapse;">
                                                                <a class="buttonText" href="{{$link}}" target="_blank"
                                                                            style="color: #fff;background: #22a8ff;text-decoration: none;font-weight: 700;display: block;border-radius:100px;padding: 14px 80px;font-family:'Nunito Sans', sans-serif; font-size: 18px;">Register Now</a>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- // End Module: Standard Content \\ -->
                                        </td>
                                    </tr>
                                </table>
                                <!-- // End Template Body \\ -->
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" style="border-collapse:collapse;">
                                <table border="0" cellpadding="10" cellspacing="0" width="450" id="supportSection"
                                    style="background-color:white;font-family:'Nunito Sans', sans-serif;font-size:12px;border-top:1px solid #22a8ff;">
                                    <tr>
                                        <td valign="top" class="supportContent"
                                            style="border-collapse:collapse;background-color:white;font-family:'Nunito Sans', sans-serif;font-size:12px;border-top:1px solid #22a8ff;">
                                            <!-- // Begin Module: Standard Footer \\ -->
                                            <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                <tr>
                                                    <td valign="top" width="100%" style="border-collapse:collapse;">
                                                        <br>
                                                        <div
                                                            style="text-align: center; color: #5c5c5c;     font-size: 14px;">
                                                            <p>© Copyrights {{ date('Y') }} | All rights reserved&nbsp;
                                                            </p>
                                                        </div>
                                                        <br>
                                                    </td>
                                                </tr>
                                            </table>
                                            <!-- // End Module: Standard Footer \\ -->
                                        </td>
                                    </tr>
                                </table>
                                <!-- // Begin Support Section \\ -->
                            </td>
                        </tr>
                    </table>
                    <br>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
