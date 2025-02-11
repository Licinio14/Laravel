@extends('layouts.fo_layout')

@section('content')

    <form method="POST" action="{{route('password.update')}}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" readonly name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ request()->email }}">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" @error('password') is-invalid @enderror>
            @error('password')
                <div class="invalid-feedback">{{ $message }} </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password Confirmation</label>
            <input type="password" class="form-control" name="password_confirmation">

        </div>
        <input type="hidden" name="token" class="form-control" value="{{ request()->route('token') }}">
        <button type="submit" class="btn btn-primary">Submit</button>
        <br><br>
    </form>

@endsection
