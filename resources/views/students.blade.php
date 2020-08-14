<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://mdbootstrap.com/docs/jquery/utilities/borders/" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <script type="text/javascript" src="{{ asset('js/sort.js') }}"></script>
    <!-- untuk paging -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #819399">
    @include('topnav')
    <div class="sidenav">
        <div style="width:100%;height:60px;border-bottom: 1px solid rgb(195, 255, 252);">
            <h1><a href="/"><img width="120" height="50" src="/images/logo-project.png"/></a></h1>
        </div>
        <div style="padding-top:20px">
            <a href="/teacherinformation">Teacher Information</a>
            <a style="color:white" href="/studentinformation">Student Information</a>
            <a href="#clients">Schedule</a>
            <a href="#contact">Contact</a>
        </div>
    </div>
    <div id="main" class="main">
        <div class="card-body">
            @if(!empty($list_student))
            <h1>DAFTAR SISWA</h1>
            <div style="font-size:14px">
                <label>Number of rows :</label> 
                <input type="number" id="number" style="width:50px" name="number" min="1" value="20" />
            </div>
            <div id="data_table">
                @include('tablestudent')
            </div>
            @endif
        </div>
    </div>
<script> //paging with ajax
    $(document).ready(function(){
        $(document).on('click', '.main a', function(event){
            event.preventDefault(); //prevent refresh page
            var page = $(this).attr('href').split('page=')[1];
            var row = document.getElementById("number").value;
            fetch_page(page, row);
        });

        function fetch_page(page, row){
            $.ajax({
                url:"/studentinformation/fetch_student?page="+page,
                type: "get",
                data: {"rows" : row},
                success:function(data){
                    $('#data_table').html(data);
                }
            })
        }
    });
</script>
<script> //number of rows
    document.getElementById("number").addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault(); //prevent refresh page
            var num = document.getElementById("number").value;
            fetch_rows(num);
        }
    });

    function fetch_rows(num){
        $.ajax({
            url:"/studentinformation?number="+num,
            type: "get",
            data: {"rows" : num},
            success:function(data){
                $('#data_table').html(data);
            }
        })
    }
</script>
<script> //open modal
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