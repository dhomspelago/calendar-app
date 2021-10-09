<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>{{ config('app.name') }}</title>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body class="bg-gray-900">
<div id="app" class="container mx-auto">
  <div class="w-full py-4 px-8 bg-white shadow-lg rounded-lg my-10">
    <div class="w-full border-b-2 border-gray-500 mb-10 py-2">
      <h1 class="text-xl font-bold">Calendar</h1>
    </div>

    <calendar />
  </div>
</div>
</body>
</html>
