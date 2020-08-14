<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://mdbootstrap.com/docs/jquery/utilities/borders/" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <script type="text/javascript" src="{{ asset('js/snackbar.js')}}"></script>
</head>
<body style="background-color: #819399">
    @include('topnav')
    <div class="sidenav">
        <div style="width:100%;height:60px;border-bottom: 1px solid rgb(195, 255, 252);">
            <h1><a href="/"><img width="120" height="50" src="/images/logo-project.png"/></a></h1>
        </div>
        <div style="padding-top:20px">
            <a href="/teacherinformation">Teacher Information</a>
            <a href="/studentinformation">Student Information</a>
            <a href="#clients">Schedule</a>
            <a href="#contact">Contact</a>
        </div>
    </div>
    <div class="main">
        <p style="text-align:center">Isi homepage<p>
    </div>
<script>
    // Get the modal
    var modal = document.getElementsByClassName("modal");

    // Get the button that opens the modal
    var btn = document.getElementsByClassName("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close-md");
    
    // When the user clicks the button, open the modal 
    btn[0].onclick = function() {
        modal[0].style.display = "block";
    }
    btn[1].onclick = function() {
        modal[1].style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span[0].onclick = function() {
        modal[0].style.display = "none";
    }
    span[1].onclick = function() {
        modal[1].style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>