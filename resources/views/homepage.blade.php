<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://mdbootstrap.com/docs/jquery/utilities/borders/" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
</head>
<body style="background-color: #819399">
    @include('topnav')
    <div id="main">
        <h1>Website Data Siswa<h1>
        <div class="grid-container">
            <p id="teacherShort">Gambar guru</p>
            <p id="studentShort">Gambar student</p>
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
    <script> //link gui
        document.getElementById("teacherShort").addEventListener("click", function() {
            window.location.href ="/teacherinformation"
        });
        document.getElementById("studentShort").addEventListener("click", function() {
            window.location.href ="/studentinformation"
        });
    </script>
</body>
</html>