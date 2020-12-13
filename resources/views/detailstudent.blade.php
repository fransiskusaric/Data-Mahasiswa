<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://mdbootstrap.com/docs/jquery/utilities/borders/" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <!-- jQuesry ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <style>
        #astudent { color: #f1f1f1; }
    </style>
</head>
<body style="background-color: #819399">
    @include('topnav')
    <div id="main" class="main">
        <div class="card-body">
            @if (session('success'))
                <div class="alert success">
                    <button data-dismiss="alert">
                        <span class="close-md">&times;</span>
                    </button>
                    <strong>{{ session('success') }}</strong>
                </div>
            @endif
            <div class="link">
                <a href="/studentinformation">DAFTAR SISWA</a>
                <p> >> </p>
                <a href="/studentinformation/detailstudent/{{$student->s_id}}">DETAIL SISWA</a>
            </div>
            <div style="padding-top:30px;">
                <p>Nama<span style="display:inline-block; width: 33px;"></span>: {{$student->name}} [<a href='/studentinformation/detailstudent/edit/{{$student->s_id}}'>Edit</a>]</p>
                <p>Student Id<span style="display:inline-block; width: 2px;"></span>: {{$student->student_id}}</p>
                <p>Tingkat<span style="display:inline-block; width: 23px;"></span>: {{$student->grade}}</p>
                <p>Kelas<span style="display:inline-block; width: 39px;"></span>: {{$student->classroom}}</P>
                <p>Wali Kelas<span style="display:inline-block; width: 4px;"></span>: {{$student->teacher}}</P>
            </div>
            <form id="form_score">
                {{ csrf_field() }}
                <input type="hidden" id="s_id" name="s_id" value="{{$student->s_id}}" />
                <table id="score">
                    <thead>
                        <tr>
                            <th>Mata Pelajaran</th>
                            <th>Tugas</th>
                            <th>UTS</th>
                            <th>UAS</th>
                            <th>Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studentcourse as $course)
                            <tr>
                                <td><input type="hidden" class="score_id" name="score_id" value="<?php echo $course->score_id ?? '' ?>" />{{$course->course}}</td>
                                <td><input class="task" name="task" type="number" min="0" max="100" value="{{$course->task}}" /></td>
                                <td><input class="mid_test" name="mid_test" type="number" min="0" max="100" value="{{$course->mid_test}}" /></td>
                                <td><input class="final_test" name="final_test" type="number" min="0" max="100" value="{{$course->final_test}}" /></td>
                                <td>{{$course->score}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <input type="submit" class="btn btn-default" value="Save" onclick="showToast()"/>
            </form>
            <div id="toast">Scores have been saved.</div>
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
    <script type="text/javascript"> //save score
        $('#form_score').on('submit',function(event){
            event.preventDefault();

            let s_id = $('#s_id').val();
            let score_id = $('.score_id').map((_,id) => id.value).get();
            let task = $('.task').map((_,t) => t.value).get();
            let mid_test = $('.mid_test').map((_,m) => m.value).get();
            let final_test = $('.final_test').map((_,f) => f.value).get();

            console.log(score_id);
            console.log(task);
            console.log(mid_test);
            console.log(final_test);

            $.ajax({
                url: "/savescore",
                type: "POST",
                data: {
                    "s_id": s_id,
                    "score_id": score_id,
                    "task": task,
                    "mid_test": mid_test,
                    "final_test": final_test,
                    "_token": '{{ csrf_token() }}'
                },
                success:function(){
                },
            });
        });
    </script>
    <script type="text/javascript"> //show toast
        function showToast() {
            var x = document.getElementById("toast");
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>
</body>
</html>