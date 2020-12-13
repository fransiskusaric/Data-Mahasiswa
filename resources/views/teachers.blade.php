<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://mdbootstrap.com/docs/jquery/utilities/borders/" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <!-- import icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- untuk paging -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        #ateacher { color: #f1f1f1; }
    </style>
</head>
<body style="background-color: #819399">
    @include('topnav')
    <div id="main" class="main">
        @if (session('success'))
            <div class="alert success">
                <button data-dismiss="alert">
                    <span class="close-md">&times;</span>
                </button>
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        @if (session('delete'))
            <div class="alert">
                <button data-dismiss="alert">
                    <span class="close-md">&times;</span>
                </button>
                <strong>{{ session('delete') }}</strong>
            </div>
        @endif
        <div class="card-body">
            <h1>DAFTAR GURU</h1>
            <div style="font-size:14px">
                <label>Number of rows :</label> 
                <input type="number" id="number" style="width:50px" name="number" min="1" value="20" />
            </div>
            <button onclick="window.location='{{url("/createteacher")}}'" class="btn btn-tambah"></button>
            <div style="max-width:400px;margin:auto;float:right">
                <div class="input-icons"> 
                    <i class="fa fa-search icon"></i>
                    <input type="text" id="search" class="form-control search" placeholder="Search Nama.." />
                </div>
            </div>
            @if(count($list_teacher) > 0)
                <div id="data_table">
                    @include('tableteacher')
                </div>
            @else
                <h2>Tidak ditemukan data guru</h2>
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
    <script type="text/javascript"> //paging with ajax
        $(document).ready(function(){
            $(document).on('click', '.page a', function(event){
                event.preventDefault(); //prevent refresh page
                var page = $(this).attr('href').split('page=')[1];
                var num = document.getElementById("number").value;
                var search = document.getElementById("search").value;
                fetch_page(page, num, search);
            });

            function fetch_page(page, num, search){
                $.ajax({
                    url:"/teacherinformation/fetch_teacher?page="+page,
                    type: "get",
                    data: {"rows" : num, "search" : search},
                    success:function(data){
                        $('#data_table').html(data);
                    }
                })
            }
        });
    </script>
    <script type="text/javascript"> //number of rows
        document.getElementById("number").addEventListener("keyup", function(event) {
            if (event.keyCode === 13) {
                event.preventDefault(); //prevent refresh page
                var num = document.getElementById("number").value;
                var search = document.getElementById("search").value;
                fetch_rows(num, search);
            }
        });

        function fetch_rows(num, search){
            $.ajax({
                url:"/teacherinformation?number="+num,
                type: "get",
                data: {"rows" : num, "search" : search},
                success:function(data){
                    $('#data_table').html(data);
                }
            })
        }
    </script>
    <script type="text/javascript"> //search
        $('.search').on('keyup',function(){
            $value = $(this).val();
            var num = document.getElementById("number").value;
            $.ajax({
                url: "/teacherinformation?search="+$value,
                type: "get",
                data: {"search" : $value, "rows" : num},
                success:function(data){
                    $('#data_table').html(data);
                }
            });
        })
    </script>
</body>
</html>