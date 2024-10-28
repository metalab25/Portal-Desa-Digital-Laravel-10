<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{ config('app.name') }} | {{ $page }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="{{ config('app.name') }} | {{ $page }}">
    <meta name="author" content="Happy Agung">
    <meta name="description" content="Portal Desa Digital">
    <meta name="keywords" content="Portal Desa Digital">
    @if ($setting->icon == null)
        <link rel="shortcut icon" href="{{ '/assets/dashboard/img/AdminLTELogo.png' }}" type="image/x-icon" />
    @else
        <link rel="shortcut icon" href="{{ asset('storage/' . $setting->icon) }}" type="image/x-icon" />
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
        integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
        integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ '/assets/dashboard/css/adminlte.css' }}">
    <link rel="stylesheet" href="{{ '/assets/dashboard/css/custom-style.css' }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
        integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
</head>


<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    @include('sweetalert::alert')
    <div class="app-wrapper">
        @include('dashboard.layouts.topbar')
        @include('dashboard.layouts.sidebar')

        <main class="app-main">
            @include('dashboard.layouts.breadcrumb')
            @yield('content')
        </main>

        @include('dashboard.layouts.footer')
    </div>
