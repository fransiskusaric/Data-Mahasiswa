<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <!-- import untuk daterange -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- import icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- import untuk live search -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style>
        body{
            background-color: slategray;
        }

        .btn-tambah { 
            background-image: url('/images/add-icon.png'); 
            background-size: cover; 
            width: 36px; 
            height: 36px; 
            font-size: 2rem; 
        }

        .btn-tambah:hover{
            width: 40px; 
            height: 40px; 
        }

        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        .modal-content {
            background-color: #286EB4;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 15%;
        }
    </style>
</head>
<body>
   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header gainsboro">
            @if(session('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ session('error') }}</strong>
                </div>
            @endif
        </div>
        <div class="card-body gainsboro">
            <div class="column small">
                <div style="max-width:400px;margin:auto;float:left">
                    <div class="input-icons"> 
                        <i class="fa fa-search icon"></i>
                        <input type="text" class="form-control" onkeyup="search()" id="search" placeholder="Search Nama.." />
                    </div>
                </div>
                <button id="myBtn" class="btn dropbtn">Filter</button>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close-md">&times;</span>
                        <form method="get" action="/filterMhs/{TglFilter}/{TglMasuk}/{TglKeluar}">
                            <select name="TglFilter" class="form-control" required="required" style="margin-bottom:3px">
                                <option value='from'>Tanggal Masuk</option>
                                <option value='to'>Tanggal Keluar</option>
                            </select>
                            <input type="text" name="TglMasuk" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="From" />
                            <input type="text" name="TglKeluar" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="To" style="margin-top:3px;margin-bottom:3px"/>
                            <div class="form-group">
                                <input type="submit" class="btn btn-white" value="Search"/>
                            </div>
                        </form>
                    </div>
                </div>
                <button onclick="window.location='{{url("/createMhs")}}'" class="btn btn-tambah gainsboro"></button>
            </div>
            <div class="column big">
                <form style="border: 4px solid #a1a1a1;padding: 5px;" action="{{ url('mahasiswaview') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary" style="float:right">Import File</button>
                    @csrf
                    <input type="file" name="file_mahasiswa" />
                </form>
            </div>
        </div>
        @include('tbmahasiswa')
    </div>
</div>
<script> //open modal
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close-md")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script> //search by name
    function search() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("table_mahasiswa");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
</script>
<script> //sorting
    function GetFormattedDate(date) {
        if(date == ''){
            date = new Date().toJSON().slice(0,10);
            var dd = date.substr(8, 2);
            var mm = date.substr(5, 2);
            var yyyy = date.substr(0, 4);

            date = dd + '-' + mm + '-' + yyyy;
        }
        var d = date.toString().split("-");
        var newDate = new Date(+d[2], d[1] - 1, +d[0]);
        
        return newDate;
    }

    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("table_mahasiswa");
        switching = true;
        //Set the sorting direction to ascending:
        dir = "asc"; 
        /*Make a loop that will continue until no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare, one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                if(n == 3 || n == 4) {
                    x = GetFormattedDate(x.innerHTML);
                    y = GetFormattedDate(y.innerHTML);
                } 
                /*check if the two rows should switch place, based on the direction, asc or desc:*/
                if (dir == "asc") {
                    if(isNaN(x)){
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch= true;
                            break;
                        } 
                    } else {
                        if( n != 3 && n != 4){
                            if (Number(x.innerHTML) > Number(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            if (x > y) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch= true;
                                break;
                            }
                        }
                    }
                } else if (dir == "desc") {
                    if(isNaN(x)){
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch= true;
                            break;
                        } 
                    } else {
                        if( n != 3 && n != 4){
                            if (Number(x.innerHTML) < Number(y.innerHTML)) {
                                shouldSwitch = true;
                                break;
                            }
                        } else {
                            if (x < y) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch= true;
                                break;
                            }
                        }
                    } 
                }
            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                //Each time a switch is done, increase this count by 1:
                switchcount ++;      
            } else {
                /*If no switching has been done AND the direction is "asc", set the direction to "desc" and run the while loop again.*/
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>
<!-- <script>
    //daterange
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'right',
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
            //apply value to <input>
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            var fromDate, toDate, filter, table, tr, td, i, txtValue;
            fromDate = $(this).value.substr(0, $(this).value.indexOf(' '));
            toDate = $(this).valule.substr($(this).value.indexOf('-') + 2);
            //filter

            filter = input.value.toUpperCase();
            table = document.getElementById("table_mahasiswa");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }       
            }
        });

        $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });
</script> -->
</body>
</html>