<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalendarStoreRequest;
use App\Models\Calendar;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $currentMonthYear = Carbon::now()->format('F Y');
        $calendar = Calendar::query()->firstWhere('month_year', $currentMonthYear);

        return response()->json([
            'dates' => $calendar->getCalendarEvents(),
            'monthYear' => $currentMonthYear,
        ]);
    }

    public function store(CalendarStoreRequest $request)
    {
        $calendar = Calendar::query()->updateOrCreate(
            ['month_year' => Carbon::now()->format('F Y')],
            [
                'date_from' => $request->input('dateFrom'),
                'date_to' => $request->input('dateTo'),
            ]
        );

        $calendar->saveEvents($request);

        return response()->json('success');
    }
}
