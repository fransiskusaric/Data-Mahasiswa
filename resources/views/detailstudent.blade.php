<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://mdbootstrap.com/docs/jquery/utilities/borders/" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <style>
        #astudent { color: #f1f1f1; }
    </style>
</head>
<body style="background-color: #819399">
    @include('topnav')
    <div id="main" class="main">
        <div class="card-body">
            <p>Nama<span style="display:inline-block; width: 14px;"></span>: {{$student->name}}</p>
            <p>Tingkat<span style="display:inline-block; width: 4px;"></span>: </p>
            <p>Kelas<span style="display:inline-block; width: 20px;"></span>:</P>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/topnav.js')}}"></script>
    <script type="text/javascript"> //open menu
        var button = document.getElementById("myMenu"), count = 0;
        button.onclick = function() {
            count += 1;
            if(count % 2 == 1) openNav();
            else closeNav();
        };
    </script>
</body>
</html>