<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Desiflight Email</title>

  <style type="text/css">
    
    /* Outlines the grids, remove when sending */

    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }

    /* MEDIA QUERIES */
    @media all and (max-width:639px){ 
      .wrapper{ width:320px!important; padding: 0 !important; }
      .container{ width:300px!important;  padding: 0 !important; }
      .mobile{ width:300px!important; display:block!important; padding: 0 !important; }
      .img{ width:100% !important; height:auto !important; }
      *[class="mobileOff"] { width: 0px !important; display: none !important; }
      *[class*="mobileOn"] { display: block !important; max-height:none !important; }
    }

  </style>    
</head>
<body style="margin:0; padding:0; background-color:#ffffff;">
  
  <h3>{{$mailHeading}}</h3>
  <p>Below is the request for Quote.</p>
  <span style="display: block; width: 640px !important; max-width: 640px; height: 1px" class="mobileOff"></span>
  
  <center>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="top">

          <table width="640" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#FFFFFF">
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
            <tr>
              <td align="center" valign="top">

                <table width="600" cellpadding="5" cellspacing="0" border="1" class="container">
                  <tr>
                    <th width="300" class="mobile" align="center" valign="top">
                      Trip Type
                    </th>
                    <td width="300" class="mobile" align="center" valign="top">
                      {{$tripType}}
                    </td>
                  </tr>
                  <tr>
                    <th width="300" class="mobile" align="center" valign="top">
                      Depart On
                    </th>
                    <td width="300" class="mobile" align="center" valign="top">
                      {{$depart}}
                    </td>
                  </tr>
                  @if($return)
                  <tr>
                    <th width="300" class="mobile" align="center" valign="top">
                      Return On
                    </th>
                    <td width="300" class="mobile" align="center" valign="top">
                      {{$return}}
                    </td>
                  </tr>
                  @endif
                  <tr>
                    <th width="300" class="mobile" align="center" valign="top">
                      Starting Location
                    </th>
                    <td width="300" class="mobile" align="center" valign="top">
                      {{$starting}}
                    </td>
                  </tr>
                  <tr>
                    <th width="300" class="mobile" align="center" valign="top">
                      Ending Location
                    </th>
                    <td width="300" class="mobile" align="center" valign="top">
                      {{$ending}}
                    </td>
                  </tr>
                  <tr>
                    <th width="300" class="mobile" align="center" valign="top">
                      Passengers
                    </th>
                    <td width="300" class="mobile" align="center" valign="top">
                      Adult: {{$passAdult}}, Child: {{$passChild}}, Infants: {{$passInfants}}
                    </td>
                  </tr>
                  <tr>
                    <th width="300" class="mobile" align="center" valign="top">
                      Email
                    </th>
                    <td width="300" class="mobile" align="center" valign="top">
                      {{$email}}
                    </td>
                  </tr>
                  <tr>
                    <th width="300" class="mobile" align="center" valign="top">
                      Telephone
                    </th>
                    <td width="300" class="mobile" align="center" valign="top">
                      {{$telephone}}
                    </td>
                  </tr>
                </table>

              </td>
            </tr>
            <tr>
              <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
            </tr>
          </table>
            
        </td>
      </tr>
    </table>
  </center>
</body>
</html>