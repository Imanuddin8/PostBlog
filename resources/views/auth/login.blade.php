@extends('auth.main')

@section('title', 'Login')

@section('konten')
<div style="height:100vh; display:flex; justify-content:center; align-items:center">
    <form method="POST" action="{{ route('auth.login') }}">
        @csrf
        <div>
            <div
                class="row justify-content-center align-items-center"
            >
                <div class="col-11 col-lg-9 rounded p-5" style="background: #F8F9FA">
                    <div
                        class="row justify-content-between align-items-center g-2"
                    >
                        <div class="col-12 col-lg-6">
                            <h1>Post Blog</h1>
                            <p class="fs-4">Share your story to the world</p>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div
                                class="row justify-content-center align-items-center g-3"
                            >
                                <div class="col-12 col-lg-9 text-center">
                                    <div class="d-flex align-items-center">
                                        <span class="me-auto fw-bold fs-2">Login</span>
                                        <a href="{{url('/')}}">
                                            <i class="fa-solid fa-xmark fs-4 text-danger"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-9 text-center">
                                    @if (session('error'))
                                        <div class="bg-danger p-2 text-center text-white rounded">
                                            <span>{{session('error')}}</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 col-lg-9">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                                </div>
                                <div class="col-12 col-lg-9 d-grid mb-3">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                                <div class="col-12 col-lg-9 d-grid">
                                    <p class="fw-bold">Don't have an account yet?</p>
                                    <a href="{{route('auth.registration')}}" class="btn btn-primary">Sign Up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
