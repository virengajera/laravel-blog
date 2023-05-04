<x-layout>
    @push('styles')
        <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    @endpush
    @include('partials._header')
    <div class="user-form-body px-">
    
    <div class="login-form">
        <form action="/register" method="POST">
            @csrf
            <div class="avatar">
                <img src="{{ asset('images/avatar.png') }}" alt="Avatar">
            </div>
            <h2 class="text-center">User Registration</h2>   

            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Enter name" required="required"  value="{{old('name')}}">
            </div>   
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Enter email" required="required" value="{{old('email')}}">
            </div>

            @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required" value="{{old('password')}}">
            </div>   

            
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
     
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
            </div>

        </form>
        <p class="text-center small">Already have account <a href="/login">Login Here</a></p>
        <p class="text-center small">Go back Home <a href="/">Click here</a></p>
    </div>
    
    </div>
    
    </x-layout>