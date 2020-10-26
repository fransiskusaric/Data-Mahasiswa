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
    <style>
        #astudent { color: #f1f1f1; }
    </style>
</head>
<body style="background-color: #819399">
    @include('topnav')
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
    <script type="text/javascript" src="{{ asset('js/topnav.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/sort.js') }}"></script>
    <script type="text/javascript"> //open menu
        var button = document.getElementById("myMenu"), count = 0;
        button.onclick = function() {
            count += 1;
            if(count % 2 == 1) openNav();
            else closeNav();
        };
    </script>
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
</body>
</html>