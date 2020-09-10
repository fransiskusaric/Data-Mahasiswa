<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://mdbootstrap.com/docs/jquery/utilities/borders/" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <!-- untuk paging -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #819399">
    @include('topnav')
    <div class="sidenav">
        <div style="width:100%;height:60px;border-bottom: 1px solid rgb(195, 255, 252);">
            <h1><a href="/"><img width="120" height="50" src="/images/logo-project.png"/></a></h1>
        </div>
        <div style="padding-top:20px">
            <a style="color:white" href="/teacherinformation">Teacher Information</a>
            <a href="/studentinformation">Student Information</a>
            <a href="#clients">Schedule</a>
        </div>
    </div>
    <div id="main" class="main">
        <div class="card-body">
            @if(!empty($list_teacher))
            <h1>DAFTAR GURU</h1>
            <div style="font-size:14px">
                <label>Number of rows :</label> 
                <input type="number" id="number" style="width:50px" name="number" min="1" value="20" />
            </div>
            <div id="data_table">
                @include('tableteacher')
            </div>
            @endif
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/topnav.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/sort.js') }}"></script>
    <script> //paging with ajax
        $(document).ready(function(){
            $(document).on('click', '.page a', function(event){
                event.preventDefault(); //prevent refresh page
                var page = $(this).attr('href').split('page=')[1];
                var row = document.getElementById("number").value;
                fetch_page(page, row);
            });

            function fetch_page(page, row){
                $.ajax({
                    url:"/teacherinformation/fetch_teacher?page="+page,
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
                url:"/teacherinformation?number="+num,
                type: "get",
                data: {"rows" : num},
                success:function(data){
                    $('#data_table').html(data);
                }
            })
        }
    </script>
</body>
</html>