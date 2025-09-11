
<!DOCTYPE html>
<html lang="fr">
    
    <head>
        @include('partials.header')
        @yield('styles')
    </head>
    <body>
        @if (empty(trim($__env->yieldContent('hideNav'))))
            <header>
                @include('partials.nav')
            </header>
        @endif
        <main>
            @yield('content')
        </main>

       @if (empty(trim($__env->yieldContent('hideFooter'))))
            @include('partials.footer')
       @endif
    </body>
</html>