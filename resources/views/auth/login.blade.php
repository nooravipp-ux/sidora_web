@extends('layouts.app')
@section('title', 'SIDORA | LOGIN')

@section('content')
<section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center mt-5">
                <div class="col-xl-5 col-lg-5 col-md-5">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-success mb-4">Login</h1>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="Enter Email Address...">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group  pt-3">
                                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small text-left pt-3 pb-3">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-lg btn-success btn-user btn-block">
                                                Login
                                            </button>
                                            <hr>

                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
@endsection