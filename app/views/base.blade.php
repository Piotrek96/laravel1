<!-- app/views/layouts/base.blade.php -->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel App</title>
    @section('head')
     {{ HTML::style('styles/bootstrap.css'); }}
     {{ HTML::script('scripts/jquery.min.js'); }}
     {{ HTML::script('scripts/bootstrap.min.js'); }}
    @show
</head>
<body>
<div class="container">
    @yield('body')
 </div>
</body>
</html>