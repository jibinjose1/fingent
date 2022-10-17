<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" integrity="sha512-QfDd74mlg8afgSqm3Vq2Q65e9b3xMhJB4GZ9OcHDVy1hZ6pqBJPWWnMsKDXM7NINoKqJANNGBuVRIpIJ5dogfA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- javascript and jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom styles-->
    <link rel="stylesheet" href="/assets/css/custom.css">

    <!-- Select2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.full.min.js"></script>

    <!-- toastr-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.0/css/toastr.min.css" integrity="sha512-kbfyniEdAn65kDvQuBaFsC6PcEZuqCv3wXD5SrSqMJvZAWy/XZhf2ByMHgHJ2h/2FJl+o/P0LBToducs2oKnTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.0/css/toastr.css" integrity="sha512-IGwkFtlId2R+5O765etYgj+NFf1fTfb1Kf98HiJTzqo5KaHskkErldvO7jW1pFUZZyqQLgKZmnCPNm6CwjY4rQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.0/js/toastr.js" integrity="sha512-uB84KL69yTwjmCPpaQQ1Mz1EVEjlJskbITfaRJVi8glR3xF5x9vVLI52rv1Dj7FGDW7L0UFkJ34UrdMMS6zjJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- toastr-->

    <title>
        @if(View::hasSection('title'))
            @yield('title')
        @else
            Student Management System
        @endif
    </title>
    @stack('styles')
</head>
<body>
    @yield('content')
    @stack('scripts')
    @if(Session::has('toastr'))
        @if(Session::has('type') && Session::has('message'))
            <script> 
                toastr.{{Session::get('type')}}('{{Session::get('message')}}');
            </script>
        @endif
    @endif
</body>
</html>