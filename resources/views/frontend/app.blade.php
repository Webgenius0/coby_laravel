@php
$systemSetting = App\Models\Setting::first();
@endphp

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $title ?? '' }} | {{$systemSetting->system_name ?? env('APP_NAME')}}</title>
  <link rel="icon" type="image/png" href="./assets/images/favicon.png" />

  @include('frontend.partials.style')
</head>

<body>
  @include('frontend.partials.header')
  <main>
    @yield('content')
  </main>
  @include('frontend.partials.footer')
  @include('frontend.partials.script')
</body>

</html>