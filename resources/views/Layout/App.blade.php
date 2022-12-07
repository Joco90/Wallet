<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('Layout.head')
    <body>
        @include('Layout.Partials.topBar')
        <div class="container-fluid">
            <div class="row">
                @include('Layout.Partials.leftBar')

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" onload="readTableRight()" id="revenuAdd">
                    @yield('content')
                </main>

            </div>
        </div>

    @include('Layout.foot')
    </body>
</html>

