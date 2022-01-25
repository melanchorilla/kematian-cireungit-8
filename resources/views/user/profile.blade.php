@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Profil</h1>

    <div class="row mt-4">
        <div class="col-md-6">
            <form method="post" action="/profile/{$user->id}">
                @csrf
                {{ method_field('PUT') }}
                @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
                @endforeach
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" disabled>
                </div>
                <div class="form-group">
                    <label for="current_password">Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                </div>
                <div class="form-group">
                    <label for="new_password">Password Baru</label>
                    <input type="password" class="form-control" id="new_password" name="new_password">
                </div>
                <div class="form-group">
                    <label for="new_confirm_password">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="new_confirm_password" name="new_confirm_password">
                </div>
                <button type="submit" class="btn btn-primary">Edit Profil</button>
            </form>
        </div>
    </div>

</div>
@endsection