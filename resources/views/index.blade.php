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

    <div class="lg:grid lg:grid-cols-3 lg:gap-4">
      <div class="input-side">
        <div class="mb-4 my-event">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="event">
            My Event
          </label>
          <input
            id="event" type="text"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
          >
        </div>
        <div class="mb-4 date">
          <div class="grid grid-cols-2 gap-2">
            <div>
              <label class="block text-gray-700 text-sm font-bold mb-2" for="date-from">
                From
              </label>
              <input
                id="date-from" type="date"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              >
            </div>
            <div>
              <label class="block text-gray-700 text-sm font-bold mb-2" for="date-from">
                To
              </label>
              <input
                id="date-from" type="date"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              >
            </div>
          </div>
        </div>
        <div class="mb-4 days grid lg:grid-cols-7 grid-cols-3">
          <div class="monday">
            <input id="monday" type="checkbox">
            <label class="text-gray-700 text-sm font-bold" for="monday">
              Mon
            </label>
          </div>
          <div class="tuesday">
            <input id="tueday" type="checkbox">
            <label class="text-gray-700 text-sm font-bold" for="tueday">
              Tue
            </label>
          </div>
          <div class="wednesday">
            <input id="wednesday" type="checkbox">
            <label class="text-gray-700 text-sm font-bold" for="wednesday">
              Wed
            </label>
          </div>
          <div class="thursday">
            <input id="thursday" type="checkbox">
            <label class="text-gray-700 text-sm font-bold" for="thursday">
              Thu
            </label>
          </div>
          <div class="friday">
            <input id="friday" type="checkbox">
            <label class="text-gray-700 text-sm font-bold" for="friday">
              Fri
            </label>
          </div>
          <div class="saturday">
            <input id="saturday" type="checkbox">
            <label class="text-gray-700 text-sm font-bold" for="saturday">
              Sat
            </label>
          </div>
          <div class="sunday">
            <input id="sunday" type="checkbox">
            <label class="text-gray-700 text-sm font-bold" for="sunday">
              Sun
            </label>
          </div>
        </div>
        <div class="mb-4">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Save
          </button>
        </div>
      </div>
      <div class="col-span-2 calendar-side">
        <div class="mb-4">
          <h1 class="text-3xl font-bold">Jul 2021</h1>
        </div>
        <div class="table w-full">
          <div class="py-4 border-b-2 border-t-2 border-gray-300 grid grid-cols-3 gap-2">
            <div class="date">
              1 Sun
            </div>
            <div class="my-event col-span-2">
              My Event
            </div>
          </div>
          <div class="py-4 border-b-2 border-gray-300 grid grid-cols-3 gap-2 bg-green-100">
            <div class="date">
              1 Sun
            </div>
            <div class="my-event col-span-2">
              My Event
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
