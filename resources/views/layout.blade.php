<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tim.dev</title>
        <link rel="stylesheet" href="../css/app.css">
       
    </head>
    <body>
        <div class="container">
        <div class="row">
            @if (Session::has('notif'))
               <div class="alert-success" id="flash_message"> {{ Session::get('notif') }}</div>
            @endif
        </div>
           @yield('content')
        </div>
    </body>
</html>
