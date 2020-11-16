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
                    <option value='<?php echo $student->grade_id ?>' selected hidden><?php echo $student->grades->grade ?></option>
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
                @if(!empty($student))
                    <option value='<?php echo $student->grade_id ?>' selected hidden><?php echo $student->grades->grade ?></option>
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
                    <option value='<?php echo $student->major_id ?? '' ?>' selected hidden><?php echo $student->majors->major ?? 'Pilih Jurusan' ?></option>
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
                    <option value='<?php echo $student->classroom ?>' selected hidden><?php echo $student->classes->room ?></option>
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
            <input type="text" name="enroll_date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" required="required" value="<?php echo $student->enroll_year ?? '' ?>" placeholder="Masukan Tanggal Masuk"/>
        </div>
        <div>
            <input type="text" name="grad_date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $student->grad_year ?? '' ?>" placeholder="Masukan Tanggal Lulus"/>
        </div>
        @yield('close')
    </div>
    <script type="text/javascript" src="{{ asset('js/topnav.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/formstudent.js') }}"></script>
    <!-- <script> //onload hide class
        document.onreadystatechange = () => {
            if(document.readyState === 'interactive') {
                var grade = document.getElementById("grade");
                var check = [];
                var hide = document.getElementsByClassName("hide");
                for(var i = 0; i < hide.length; i++)
                    check[i] = hide[i].getAttribute("data-check-grade");
                for(var i = 0; i < hide.length; i++) {
                    if(check[i] == grade.value)
                        hide[i].hidden = false;
                    else
                        hide[i].hidden = true;
                }
            }
        }
    </script> -->
</body>
</html>