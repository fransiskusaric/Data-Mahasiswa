@extends('form')

@section('title', 'Add Mahasiswa')

@section('content')
    <div class="container">
        <div class="card-body bg-light" style="margin-top:25px;">
            <h3 style="text-align:center">Add Mahasiswa</h3>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            @endif
            <form method="post" action="/storeData">
@endsection

@section('close')
                <div class="form-group">
                    <input type="submit" class="btn btn-default" value="Submit"/>
                </div>
            </form>
        </div>        
    </div>
@endsection