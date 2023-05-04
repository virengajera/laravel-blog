<x-layout>
@push('styles')
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
@endpush
@include('partials._header')

<x-flash-message/>
<div class="user-form-body px-5">

<div class="login-form">
    <form action="/login" method="POST">
        @csrf
		<div class="avatar">
			<img src="{{ asset('images/avatar.png') }}" alt="Avatar">
		</div>
        <h2 class="text-center">User Login</h2>   
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Enter email" required="required">
        </div>
        @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>   
        @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror     
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Log in</button>
        </div>
		<div class="bottom-action clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a>
        </div>
    </form>
    <p class="text-center small">Don't have an account? <a href="/register">Sign up here!</a></p>
    <p class="text-center small">Go back Home <a href="/">Click here</a></p>
</div>

</div>

</x-layout>