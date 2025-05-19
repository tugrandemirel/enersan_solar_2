<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="Solatec - Solar and Renewable Energy Template">
    <link href="assets/images/favicon/favicon.png" rel="icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title")</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Rubik:400,500,600,700%7cRoboto:400,500,700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    <link rel="stylesheet" href="{{ asset("assets/front/css/libraries.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/front/css/style.css") }}">
    @stack("css")
</head>

<body>
<div class="wrapper">
    <div class="preloader">
        <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->
    @include("front.layouts.header")
    @yield("content")
    @include("front.layouts.footer")
    <button id="scrollTopBtn"><i class="fas fa-long-arrow-alt-up"></i></button>

</div><!-- /.wrapper -->
<script src="{{ asset("assets/front/js/jquery-3.5.1.min.js") }}"></script>
<script src="{{ asset("assets/front/js/plugins.js") }}"></script>
<script src="{{ asset("assets/front/js/main.js") }}"></script>
@stack("js")
</body>

</html>
