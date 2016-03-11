<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>测试examlearning</title>
    <link rel="stylesheet" href="/assets/css/all.css">
    <link rel="stylesheet" href="/assets/css/app.css">
</head>
<body>
    @include('partials.nav')
    <div class="content">
            @yield('content')
    </div>
    @include('partials.footer')
    <script src="/assets/js/all.js"></script>
    <script src="/assets/js/questionSelects.js"></script>
    <script src="/assets/js/exam.js"></script>

    <script>
        $(".js-example-basic-multiple").select2();
    </script>
</body>
</html>