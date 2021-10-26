@extends('layouts.registration')

@section('content')
<div class="container page">
    <div class="jumbotron-fluid">
        <h1 id="register-header">Registrace</h1>
        
        <form method="POST" action="{{ route('register') }}" id="registerForm" name="registerForm">
            @csrf
            <div class="input-group col-xs-4">
                <b>Uživatelské jméno</b><br>
                <div class="register">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        <a href="#" class="form-icon" data-toggle="popover" data-trigger="focus" title="Formát uživatelského jména" data-placement="bottom" 
                                data-content="Uživatelské jméno musí být alespoň 4 znaky dlouhé a může obsahovat pouze malá/velká písmena, číslice a některé speciální znaky. (., -, _)">
                                <i class="material-icons">person</i>
                        </a>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </input>
                </div>
            </div>

            <div class="input-group col-xs-4">
                <b>E-mailová adresa</b><br>
                <div class="register">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    <a href="#" class="form-icon" data-toggle="popover" data-trigger="focus" title="Vaše E-mailová adresa" data-placement="bottom" 
                        data-content="Zadaná adresa bude použita pouze jako možnost obnovy v případě zapomenutého hesla.">
                            <i class="material-icons">alternate_email</i>
                    </a>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </input>
                </div>
            </div>

            <div class="input-group col-xs-4">
            <b>Heslo</b><br>
                <div class="register">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <a href="#" class="form-icon" data-toggle="popover" data-trigger="focus" title="Doporučený formát hesla" data-placement="bottom" 
                        data-content="Heslo musí být alespoň 6 znaků dlouhé a obsahovat přinejmenším alespoň jednu číslici. Doporučujeme použít heslo o délce alespoň 8 znaků s použitím speciálních znaků a číslic.">
                            <i class="material-icons">password</i>
                        </a>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </input>
                </div>
            </div>

            <div class="input-group col-xs-4">
                <b>Ověření hesla</b>
                <div class="register">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <i class="material-icons form-icon">password</i>
                    </input>
                </div>
            </div>

            <div class="input-group col-xs-3">
                    <button type="submit" class="btn btn-primary button-yellow btn-group-lg btn-block">
                        Registrovat
                    </button>
            </div>
        </form>
    </div>
</div>
@endsection
