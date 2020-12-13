<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width:device-width, initial-scale:1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://mdbootstrap.com/docs/jquery/utilities/borders/" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
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
        </div>
    </div>
    <div class="main">
        @yield('content')
        {{csrf_field()}}
        <input type="hidden" name="s_id" value="<?php echo $student->s_id ?? '' ?>" />
        <div class="input-group">
            <input type="text" name="name" class="form-control" required="required" value="<?php echo $student->name ?? '' ?>" placeholder="Masukan Nama"/>
        </div>
        <div class="input-group">
            <input type="text" name="student_id" class="form-control" required="required" value="<?php echo $student->student_id ?? '' ?>" placeholder="Masukan NISN"/>
        </div>
        <div class="input-group">
            <input type="text" name="address" class="form-control" required="required" value="<?php echo $student->address ?? '' ?>" placeholder="Masukan Alamat Tempat Tinggal"/>
        </div>
        <div class="input-group">
            <input type="text" name="city" class="form-control" required="required" value="<?php echo $student->city ?? '' ?>" placeholder="Masukan Kota Lahir"/>
        </div>
        <div class="input-group">
            <input type="text" name="birth_date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" required="required" value="<?php echo $student->birth_date ?? '' ?>" placeholder="Masukan Tanggal Lahir"/>
        </div>
        <div class="input-group">
            <input type="text" name="phone" class="form-control" required="required" value="<?php echo $student->phone ?? '' ?>" placeholder="Masukan No Telp"/>
        </div>
        <div class="input-group">
            <select id="grades" name="grade_id" class="form-control" required="required" onchange="checkGrade()">
                @if(!empty($student))
                    <option value='<?php echo $student->grade_id ?>' selected hidden><?php echo $student->grade ?></option>
                @endif
                @if(empty($student))
                    <option value='' selected hidden>Pilih Tingkat</option>
                @endif
                @foreach($grade as $g)
                    <option value='<?php echo $g->grade_id ?>'><?php echo $g->grade ?></option>
                @endforeach
            </select>
        </div>
        <div class="input-group">
            @if(!empty($student))
                <select id="subgrades" name="subgrade_id" class="form-control" required="required" onchange="checkSubgrade()">
            @else
                <select id="subgrades" name="subgrade_id" class="form-control" required="required" onchange="checkSubgrade()" disabled>
            @endif
                <option value='' selected hidden>Pilih Kelas</option>
                @if(!empty($student))
                    <option value='<?php echo $student->subgrade_id ?>' selected hidden><?php echo $student->subgrade ?></option>
                @endif
                @if(empty($student))
                    <option value='' selected hidden>Pilih Kelas</option>
                @endif
                @foreach($subgrade as $sg)
                    <option class="subgrade" value='<?php echo $sg->subgrade_id ?>'><?php echo $sg->subgrade ?></option>
                @endforeach
            </select>
        </div>
        @if(!empty($student))
            <div id="formmajor" <?php if($student->grade_id == 4){echo 'class="input-group"';} ?>>
                <select id="majors" name="major_id" class="form-control" onchange="checkMajor()" <?php if($student->grade_id == 5){echo 'required="required"';}else{echo 'disabled';} ?>>
        @else
            <div id="formmajor">
                <select id="majors" name="major_id" class="form-control" onchange="checkMajor()" disabled>
        @endif
                <option value='' selected hidden>Pilih Jurusan</option>
                @if(!empty($student))
                    <option value='<?php echo $student->major_id ?? '' ?>' selected hidden><?php echo $student->major ?? 'Pilih Jurusan' ?></option>
                @endif
                @if(empty($student))
                    <option value='' selected hidden>Pilih Jurusan</option>
                @endif
                @foreach($major as $m)
                    <option class="major" value='<?php echo $m->major_id ?>'><?php echo $m->major ?></option>
                @endforeach
            </select>
        </div>
        <div class="input-group">
            @if(!empty($student))
                <select id="classes" name="classroom_id" class="form-control" required="required" onchange="checkClass()">
            @else
                <select id="classes" name="classroom_id" class="form-control" required="required" onchange="checkClass()" disabled>
            @endif
                <option value='' selected hidden>Pilih Ruang Kelas</option>
                @if(!empty($student))
                    <option value='<?php echo $student->classroom_id ?>' selected hidden><?php echo $student->classroom ?></option>
                @endif
                @if(empty($student))
                    <option value='' selected hidden>Pilih Ruang Kelas</option>
                @endif
                @foreach($classes as $c)
                    <option class="classroom" value='<?php echo $c->classroom_id ?>'><?php echo $c->classroom ?></option>
                @endforeach
            </select>
        </div>
        <div class="input-group">
            <input type="text" name="enroll_date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" required="required" value="<?php echo $student->enroll_date ?? '' ?>" placeholder="Masukan Tanggal Masuk"/>
        </div>
        <div>
            <input type="text" name="grad_date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $student->grad_date ?? '' ?>" placeholder="Masukan Tanggal Lulus"/>
        </div>
        <div class="form-group" style="float:right">
            @if(!empty($student))
                <a class="button cancel" href="/studentinformation/detailstudent/{{$student->s_id}}">Cancel</a>
            @else
                <a class="button cancel" href="/studentinformation">Cancel</a>
            @endif
        </div>
        @yield('close')
    </div>
    <script type="text/javascript" src="{{ asset('js/topnav.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/formstudent.js') }}"></script>
    <script type="text/javascript"> //open menu
        var button = document.getElementById("myMenu"), count = 0;
        button.onclick = function() {
            count += 1;
            if(count % 2 == 1) openNav();
            else closeNav();
        };
    </script>
    <script type="text/javascript"> //onload hide subgrade, class, major
        document.addEventListener('readystatechange', function() { 
            if(document.readyState === "complete") {
                var grade = document.getElementById("grade");
                var subgrade = document.getElementById("subgrades");
                var sg = document.getElementsByClassName("subgrade");
                var classroom = document.getElementsByClassName("classroom");
                switch(grade.value) {
                    case '1': hideNShow(sg, 0, 2, false); break;
                    case '2': hideNShow(sg, 2, 8, false); break;
                    case '3': hideNShow(sg, 8, 11, false); break;
                    case '4': hideNShow(sg, 11, 14, false);
                }
                switch(subgrade.value) {
                    case '1': hideNShow(classroom, 53, 55, false); break;
                    case '2': hideNShow(classroom, 55, 57, false); break;
                    case '3': hideNShow(classroom, 29, 33, false); break;
                    case '4': hideNShow(classroom, 33, 37, false); break;
                    case '5': hideNShow(classroom, 37, 41, false); break;
                    case '6': hideNShow(classroom, 41, 45, false); break;
                    case '7': hideNShow(classroom, 45, 49, false); break;
                    case '8': hideNShow(classroom, 49, 53, false); break;
                    case '9': hideNShow(classroom, 20, 23, false); break;
                    case '10': hideNShow(classroom, 23, 26, false); break;
                    case '11': hideNShow(classroom, 26, 29, false);
                }
            }
        })
    </script>
</body>
</html>