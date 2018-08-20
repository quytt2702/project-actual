<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="">
  <style>
  * {
    font-family: 'Helvetica Neue', 'Arial';
  }

  .btn {
    color: #fff;
    display: inline-block;
    font-weight: 400;
    text-align: center;
    user-select: none;
    border: 1px solid transparent;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: .25rem;
    text-decoration: none;
  }

  .btn-primary {
    background-color: #337ab7;
    border-color: #2e6da4;
  }

  .btn-primary:hover {
    box-shadow: 1px 0 0 0;
    background-color: #2e6da4
  }

  .btn-success {
    background-color: #5cb85c;
    border-color: #4cae4c;
  }

  .btn-success:hover {
    box-shadow: 1px 0 0 0;
    background-color: #4cae4c
  }

  .btn-warning {
    background-color: #bd2130;
    border-color: #b21f2d;
  }

  .btn-warning:hover {
    box-shadow: 1px 0 0 0;
    background-color: #b21f2d;
  }

  .btn-danger {
    background-color: #d9534f;
    border-color: #d43f3a;
  }

  .btn-danger:hover {
    box-shadow: 1px 0 0 0;
    background-color: #d43f3a;
  }

  .btn-red {
    background-color: #f44336;
  }
  </style>
</head>
<body>
  <div class="gmail_quote">
    <div style="margin:0px;background-color:#f4f3f4;font-family:Helvetica,Arial,sans-serif;font-size:12px" text="#444444" bgcolor="#F4F3F4" link="#21759B" alink="#21759B" vlink="#21759B" marginheight="0" marginwidth="0">
      <table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#F4F3F4">
        <tbody>
          <tr>
            <td style="padding:15px">
              <center>
                <table width="550" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff">
                  <tbody>
                    <tr>
                      <td align="left"><div style="border:none">
                        <table style="line-height:1.6;font-size:12px;font-family:Helvetica,Arial,sans-serif;border:solid 1px #ffffff;color:#444" border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                          <tbody>
                            <tr style="background:#2e3291">
                              <td style="line-height:25px;padding:10px 20px;text-align:center; width: 550px;">
                                <h1 style="color:#fff;font-size:30px;text-align:center">@yield('master.title')</h1>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <table style="margin-right:30px;margin-left:30px;color:#444;line-height:1.6;font-size:12px;font-family:Arial,sans-serif" border="0" width="490" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
                          <tbody>
                            <tr>
                              <td colspan="2">
                                <div style="line-height:1.6">
                                  <div style="font-size:16px; display:block;">
                                    @yield('master.content')
                                  </div>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </center>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>
</body>
</html>
