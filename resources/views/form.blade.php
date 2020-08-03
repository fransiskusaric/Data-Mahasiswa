<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}" />
    <style>
        body{
            background-color: slategray;
        }

        .btn-default:hover, .btn-default:focus{
            background-color: #AAAAAA;
        }
    </style>
</head>
<body>
    @yield('content')
    {{csrf_field()}}
    <input type="hidden" name="id" value="<?php echo $mahasiswa->id ?? '' ?>" />
    <div class="input-group">
        <input type="text" name="nama" class="form-control" required="required" value="<?php echo $mahasiswa->nama ?? '' ?>" placeholder="Masukan Nama"/>
    </div>
    <div class="input-group">
        <input type="text" name="nim" class="form-control" required="required" value="<?php echo $mahasiswa->nim ?? '' ?>" placeholder="Masukan NIM"/>
    </div>
    <div class="input-group">
        <select name="idJurusan" class="form-control" required="required">
            @if(!empty($mahasiswa))
                <option value='<?php echo $mahasiswa->idJurusan ?>' selected hidden><?php echo $mahasiswa->jurusan->jurusan ?></option>
            @endif
            @if(empty($mahasiswa))
                <option value='' seleced hidden>Pilih Jurusan</option>
            @endif
            @foreach($listJurusan as $row)
                <option value='<?php echo $row->id ?>'><?php echo $row->jurusan ?></option>
            @endforeach
        </select>
    </div>
    <div class="input-group">
        <input type="text" name="TglMasuk" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" required="required" value="<?php echo $mahasiswa->TglMasuk ?? '' ?>" placeholder="Masukan Tanggal Masuk"/>
    </div>
    <div class="form-group">
        <input type="text" name="TglKeluar" class="form-control" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $mahasiswa->TglKeluar ?? '' ?>" placeholder="Masukan Tanggal Keluar"/>
    </div>
    @yield('close')
</body>
</html>