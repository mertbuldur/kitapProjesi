@extends('layouts.app')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{route('index')}}">Anasayfa</a></li>
                    <li class="active">Kayıt Ol</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="register">
        <div class="container">
            <div class="register-top heading">
                <h2>KAYIT OL</h2>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="register-main">
                <div class="col-md-6 account-left">
                    <input class="{{ $errors->has('name') ? ' is-invalid' : '' }}"  name="name" value="{{ old('name') }}" placeholder="Adınız" type="text" tabindex="1" required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif



                    <input class="{{ $errors->has('name') ? ' is-invalid' : '' }}"  name ="email" value="{{ old('email') }}" placeholder="Email Adresiniz" type="text" tabindex="3" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif


                    <input id="password"  class="{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" placeholder="Şifreniz"  name="password"  tabindex="4" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <input id="password-confirm" type="password" placeholder="Şifreniz Tekrar"  name="password_confirmation" required>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="address submit">
                <input type="submit" value="Submit">
            </div>
            </form>
        </div>
    </div>








@endsection
