<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="joco alarson">
    <meta name="generator" content="Hugo 0.104.2">
    <link rel="stylesheet" href="{{asset('Asset/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Asset/css/signin.css')}}">
   </head>
    <body>
        <style>
            .bd-placeholder-img {
              font-size: 1.125rem;
              text-anchor: middle;
              -webkit-user-select: none;
              -moz-user-select: none;
              user-select: none;
            }

            @media (min-width: 768px) {
              .bd-placeholder-img-lg {
                font-size: 3.5rem;
              }
            }

            .b-example-divider {
              height: 3rem;
              background-color: rgba(0, 0, 0, .1);
              border: solid rgba(0, 0, 0, .15);
              border-width: 1px 0;
              box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            .b-example-vr {
              flex-shrink: 0;
              width: 1.5rem;
              height: 100vh;
            }

            .bi {
              vertical-align: -.125em;
              fill: currentColor;
            }

            .nav-scroller {
              position: relative;
              z-index: 2;
              height: 2.75rem;
              overflow-y: hidden;
            }

            .nav-scroller .nav {
              display: flex;
              flex-wrap: nowrap;
              padding-bottom: 1rem;
              margin-top: -1px;
              overflow-x: auto;
              text-align: center;
              white-space: nowrap;
              -webkit-overflow-scrolling: touch;
            }
        </style>



        <div class="card text-center w-100 m-auto form-signin">
            @include('Layout.Partials.alert')
            <div class="card-header mb-3 fw-normal">
              <h1 class="h3">Connectez-vous</h1>
            </div>
            <div class="card-body">
              <form action="{{route('connexion')}}" method="POST" class="row g-3 needs-validation">
                    @csrf
                <div class="mb-O">
                  <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" value="{{old('email')}}" placeholder="Addresse mail">
                  @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
                </div>
                <div class="mb-O">
                  <input type="password" name="passwords" class="form-control {{ $errors->has('passwords') ? ' is-invalid' : '' }}" id="password" value="{{old('passwords')}}" placeholder="Password">
                @if ($errors->has('passwords'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('passwords') }}</strong>
                  </span>
                @endif
                </div>

                <div class="checkbox mb-0">
                    <input type="checkbox" value="remember-me"> Remember me

                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Connexion</button>
              </form>
            </div>

        </div>
    </body>
</html>
