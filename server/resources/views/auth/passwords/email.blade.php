@extends('layouts.app_only_content')

@section('title')
パスワード再設定
@endsection

@section('content')
<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><a href="{{ route('home') }}"><img src="/images/signin-image.jpg" alt="sing up image"></a></figure>
                </div>

                <div class="reset-form" style="padding-top: 90px;">
                    <h3 class="form-title">パスワード再設定</h3>

                    @include('error_card_list')

                    @if (session('status'))
                    <div class="card-text alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="register-form" id="login-form">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="メール送信">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection