@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center mb-3">ĐĂNG NHẬP</div>
                

                   
                    <div class="card-body">
                        @if (session('warning'))
                        <span class=" alert-warning help-block">
                            {{ session('warning') }}
                        </span>
                    @endif       
                       
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Địa chỉ email: </label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu:</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            Ghi nhớ mật khẩu
                                        </label>
                                    </div>  
                                </div>
                            </div>
    
                            <div class="row mb-0 justify-content-center mb-3">
                                <div class="col-md-8 offset-md-2 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Đăng nhập
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                           Quên mật khẩu?
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group text-center">
    
                                <a class="btn btn-primary mb-2 col-4" href="{{ URL::to('auth/facebook') }}"><i class="fab fa-facebook"></i> Đăng nhập bằng Facebook</a><br>
                                <a class="btn btn-danger mb-2 col-4" href="{{ URL::to('auth/google') }}">
                                    <i class="fab fa-google"></i>  Đăng nhập bằng Google
                                </a>
                            </div>
                        </form>
                        
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
