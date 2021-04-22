<!DOCTYPE html>
<html xmlns=“https://www.w3.org/1999/xhtml”>
<head>
    <title>Proforma invoice</title>
    <meta http–equiv=“Content-Type” content=“text/html; charset=UTF-8” />
    <meta http–equiv=“X-UA-Compatible” content=“IE=edge” />
    <meta name=“viewport” content=“width=device-width, initial-scale=1.0 “ />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:italic,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
          #outlook a{
        padding:0;
      }
      body{
        width:100% !important;
      }
      .ReadMsgBody{
        width:100%;
      }
      .ExternalClass{
        width:100%;
      }
        body{
            font-family: "Nunito Sans", sans-serif !important;
        }
        body{
        -webkit-text-size-adjust:none;
      }
      body{
        margin:0;
        padding:0;
      }
      img{
        border:0;
        height:auto;
        line-height:100%;
        outline:none;
        text-decoration:none;
        width: 100%;
      }
      table td{
        border-collapse:collapse;
      }
      table.table-info tr {
    border-top: 1px solid black;
    border-left: unset;
}
table.table-info tr td{border-right: 1px solid #000;padding: 5px;}
table.table-info tr td:last-child{border-right: unset;}
.table-info tr td {
    font-size: 14px;
}
.table-info tr td{width: 25%;}
/* .bold-td {
    width: 307px;
} */
.bg-color {
    background: #22a7ff1f;

}
.two-th th{
    padding: 5px;border-right: 1px solid #000;
}
.two-th th:last-child{border-right:none}
.amount-table{border-collapse: collapse;}
.amount-table tr{
    border-top: 1px solid black;
}
.amount-table tr td{padding: 9px;}
table{border-spacing: 0px;}
    </style>
    </head>
    <body>
      <table cellspacing="0" cellpadding="0" style="width:54%;margin: 50px auto;" >
         <tr>
             <td>
                <tr style="background-color: #96cbea45;">
                    <td style="display: block;padding: 50px 100px 100px;">
                        <table style="width: 100%;border-collapse: collapse;">
                             <tr>
                             <td><figure style="margin: 0px 0px 25px 0;text-align: center;"><img src="{{ $message->embed(public_path('assets/img/brand/new-logo.png')) }}" alt="" style="max-width: 180px;" ></figure></td>
                             </tr>   
                            <!-- <tr>
                                <td style="width:100%;text-align:center;font-size: 15px;
                                line-height: 24px;
                                font-weight: 700;
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                padding: 0;">
                                    <h2 style="
                                    margin: 0px;
                                    font-weight: 400;
                                    text-transform: capitalize;
                                    padding-top: 10px;
                                    font-size: 30px;
                                    font-weight: 700;
                                    color: black;
                                    text-decoration: underline;
                                    width:100%;
                                    display: block;
                                    text-align: center;
                                    ">Proforma invoice</h2>
                                    C-127, Phase-8,Industrial Area,<br>
                                    Mohali-160055,<br>
                                    Punjab PH (0172) 4008203<br> 
                                </td>
                            </tr> -->
                            <tr style="text-align: center;">
                            <td>
                            <h1 style="
                            margin: 0px;
                            font-size: 32px;
                            color: #8096bb;
                            font-weight: 700;
                            padding-top: 5px;

                            ">{{$invoice->client_name}}</h1>
                            <p style="
                            margin: 0px;
                            font-size: 16px;
                            padding: 2px 0 80px;
                            ">{{$invoice->client_email}}</p>
                            </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="width:100%;">
                                        <tr >
                                            <th style="text-transform: uppercase;text-align: center;
                                        font-size: 18px;
                                        letter-spacing: 2px;
                                        color: #8096bb;
                                        font-weight: 600;padding-bottom: 10px;
                                            ">invoice date</th>
                                            <th style="text-transform: uppercase;text-align: center;
                                                    font-size: 18px;
                                        letter-spacing: 2px;
                                        color: #8096bb;
                                        font-weight: 600;padding-bottom: 10px;
                                            ">invoice number</th>
                                            <th style="text-transform: uppercase;text-align: center;
                                                    font-size: 18px;
                                        letter-spacing: 2px;
                                        color: #8096bb;
                                        font-weight: 600;padding-bottom: 10px;
                                            ">invoice due date</th>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">{{ date('d-m-Y',strtotime( $invoice->created_at) )}}</td>
                                            <td style="text-align: center;">{{$invoice->invoice_number}}</td>
                                            <td style="text-align: center;">{{ date('d-m-Y',strtotime($invoice->due_date) ) }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <!--  -->
               <tr>
                   <td>
                       <tr>
                           <td>
                            <table style="
                            width: 100%;
                            text-align: left;
                            padding: 64px 24px 0px;background: #cccccc2e;
                            ">
                                <tr style="background-color: #8096bb;">
                                    <th style="
                                    border: 1px solid #00000061;
                                    border-right: 0px;
                                    border-left: 0px;padding-left: 10px;color: #fff;
                                    ">Description</th>
                                    <th style="
                                        border: 1px solid #00000061;
                                        border-left: 0px;
                                        padding: 18px 0px;
                                        border-right: 0px;color: #fff;
                                    ">Amount {{$invoice->currency->symbol }}</th>
                                </tr>
                                @foreach($invoice->invoiceAmounts as $invoiceAmounts) 
                                <tr>
                                    <td style="
                                    padding: 15px 0;
                                    font-size: 18px;padding-left: 10px;background: #e3f1f9;
                                    ">{{$invoiceAmounts->description}}</td>
                                    <td style="
                                        padding: 15px 0;
                                        font-size: 18px;background: #e3f1f9;
                                    ">{{$invoice->currency->symbol }} {{$invoiceAmounts->amount}}</td>
                                </tr>
                                @endforeach
                            </table>
                           </td>
                       </tr>
                   </td>
               </tr>

               <tr style="background: #cccccc2e;"> 
                   <td style="padding: 0px 24px 0px;">
                           <table style="width: 100%;margin-top:40px;">
                               <tr>
                                  <td>
                                   
                                            <table>
                                                <tr>
                                                    <h2 style="    
                                                    margin: 0px 0px 12px;
                                                    font-size: 18px;">Bank Details</h2>
                                                    <P style="margin: 0px 0px 8px;font-size: 16px;">Account Name : Mohiwalz</P>
                                                    <P style="margin: 0px 0px 8px;font-size: 16px;">Account Number : 50200011811999</P>
                                                    <P style="margin: 0px 0px 8px;font-size: 16px;">Swift Code : HDFCINBB </P>
                                                    <P style="margin: 0px 0px 8px;font-size: 16px;">Routing Number : HDFC0000056 </P>
                                                    <P style="margin: 0px 0px 8px;font-size: 16px;">Bank Name : HDFC Bank</P>
                                                    <P style="margin: 0px 0px 8px;font-size: 16px;">Bank Address : Mohali Branch, S.C.F. 19, Phase 7</P>
                                                    <P style="margin: 0px 0px 8px;font-size: 16px;"> SAS Nagar, Mohali, Distt.- Ropar Mohali</P>
                                                    <P style="margin: 0px 0px 8px;font-size: 16px;"> 160061.PUNJAB</P>
                                                    
                                                    
                                                </tr>
                                            </table>
                                        
                                        
                                  </td>

                                  <td style="vertical-align: baseline;">
                                     
                                              <table style="width: 100%;text-align: left;">
                                                  <tr>
                                                    <!-- <tr>
                                                        <th >dd</th>
                                                        <th>dddd</th>
                                                    </tr> -->
                                                    <!-- <tr>
                                                        <td style="padding: 14px;">SUBTOTAL</td>
                                                        <td>$400</td>
                                                    </tr> -->
                                                    <tr style="background: #8096bb;">
                                                      <td style="padding: 14px;color: #fff;font-weight: 700;font-size: 18px;">TOTAL</td>
                                                      <td style="color: #fff;font-weight: 700;font-size: 18px;">{{$invoice->currency->symbol }} {{$invoice->total_amount}}</td>
                                                  </tr> 
                                                  </tr>
                                              </table>
                                         
                                      
                                      
                                  </td>
                                  
                               </tr>
                           </table>

                   </td>
               </tr>
             </td>
         </tr>
      </table>
    </body>
</html>















