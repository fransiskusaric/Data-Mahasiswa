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
            <a style="color:white" href="/teacherinformation">Teacher Information</a>
            <a href="/studentinformation">Student Information</a>
            <a href="#clients">Schedule</a>
        </div>
    </div>
    <div class="main">
        @yield('content')
        {{csrf_field()}}
        <input type="hidden" name="t_id" value="<?php echo $teacher->t_id ?? '' ?>" />
        <label for="namet">Nama</label>
        <div class="input-group">
            <input type="text" id="namet" name="name" class="form-control" required="required" value="<?php echo $teacher->name ?? '' ?>" placeholder="Masukan Nama"/>
        </div>
        <label for="idt">Teacher Id</label>
        <div class="input-group">
            <input type="text" id="idt" name="teacher_id" class="form-control" required="required" value="<?php echo $teacher->teacher_id ?? '' ?>" placeholder="Masukan ID"/>
        </div>
        <label for="addresst">Alamat</label>
        <div class="input-group">
            <input type="text" id="addresst" name="address" class="form-control" required="required" value="<?php echo $teacher->address ?? '' ?>" placeholder="Masukan Alamat Tempat Tinggal"/>
        </div>
        <label for="cityt">Kota</label>
        <div class="input-group">
            <input type="text" id="cityt" name="city" class="form-control" required="required" value="<?php echo $teacher->city ?? '' ?>" placeholder="Masukan Kota Lahir"/>
        </div>
        <label for="birtht">Tanggal Lahir</label>
        <div class="input-group">
            <input type="text" id="birtht" name="birth_date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" required="required" value="<?php echo $teacher->birth_date ?? '' ?>" placeholder="Masukan Tanggal Lahir"/>
        </div>
        <label for="phonet">Nomor Telepon</label>
        <div class="input-group">
            <input type="text" id="phonet" name="phone" class="form-control" required="required" value="<?php echo $teacher->phone ?? '' ?>" placeholder="Masukan No Telp"/>
        </div>
        <label for="gradet">Tingkat Instansi</label>
        <div class="input-group">
            <select id="gradet" name="grade_id" class="form-control" onchange="empty()" required="required">
                @if(!empty($teacher))
                    <option value='<?php echo $teacher->grade_id ?>' selected hidden><?php echo $teacher->grades->grade ?? '' ?></option>
                @endif
                @if(empty($teacher))
                    <option value='' selected hidden>Pilih Tingkat Instansi</option>
                @endif
                @foreach($grade as $g)
                    <option value='<?php echo $g->grade_id ?>'><?php echo $g->grade ?></option>
                @endforeach
            </select>
        </div>
        <label for="courset">Mata Pelajaran yang Diampu</label>
        <div class="input-group">
            <select id="courset" name="course_id" class="form-control" required="required">
                <option value='' selected hidden>Pilih Mata Pelajaran</option>
                @if(!empty($teacher))
                    <option value='<?php echo $teacher->course_id ?>' selected hidden><?php echo $teacher->courses->course ?></option>
                @endif
                @if(empty($teacher))
                    <option value='' selected hidden disabled>Pilih Mata Pelajaran</option>
                @endif
                @foreach($course as $c)
                    <option class="hidect" value='<?php echo $c->course_id ?>'><?php echo $c->course ?></option>
                @endforeach
            </select>
        </div>
        <label for="indatet">Tanggal Masuk</label>
        <div class="input-group">
            <input type="text" id="indatet" name="in_date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" required="required" value="<?php echo $teacher->in_date ?? '' ?>" placeholder="Masukan Tanggal Masuk"/>
        </div>
        <label for="outdatet">Tanggal Keluar</label>
        <div style="width:100%">
            <input type="text" id="outdatet" name="out_date" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $teacher->out_date ?? '' ?>" placeholder="Masukan Tanggal Keluar"/>
        </div>
        @yield('close')
    </div>
    <script type="text/javascript" src="{{ asset('js/topnav.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/formteacher.js')}}"></script>
    <script type="text/javascript"> //open menu
        var button = document.getElementById("myMenu"), count = 0;
        button.onclick = function() {
            count += 1;
            if(count % 2 == 1) openNav();
            else closeNav();
        };
    </script>
    <script> //onload hide options
        document.onreadystatechange = () => {
            if(document.readyState === 'interactive') checkGrade();
        }
    </script>
</body>
</html>