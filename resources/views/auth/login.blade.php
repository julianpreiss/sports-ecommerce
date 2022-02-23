@extends('layouts.main')

@section('title', 'Login')

@section('content')

<section>
    <form action="{{route('auth.login')}}" method="POST" class="p-5 col-12 offset-md-2 col-md-8 m-auto">
        @csrf
        <div class="form-group">
            <label for="email" class="font-weight-bold">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-control"
                @error('email') aria-describedby="error-email" @enderror
                value="{{ old('email') }}"
                >
        </div>
        <div class="form-group">
            <label for="password" class="font-weight-bold">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary d-block px-4 mt-5">Iniciar sesión</button>


    </form>
</section>

@endsection
