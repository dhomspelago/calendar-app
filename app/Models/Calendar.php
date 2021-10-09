<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_from',
        'date_to',
        'month_year',
    ];

    protected $casts = [
        'date_from' => 'date',
        'date_to' => 'date',
    ];

    protected $with = [
        'events',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function saveEvents($request)
    {
        if ($this->events->isNotEmpty()) {
            $this->events()->delete();
        }

        $eventDates = CarbonPeriod::create($request->input('dateFrom'), $request->input('dateTo'))->toArray();

        $eventDays = $request->except(['event', 'dateFrom', 'dateTo']);

        foreach ($eventDates as $eventDate) {
            foreach ($eventDays as $day => $value) {
                $date = $eventDate->format('D') === ucfirst($day) ? $eventDate : null;

                if (! is_null($date)) {
                    $this->events()->create([
                        'date' => $date,
                        'name' => $request->input('event'),
                    ]);
                }
            }
        }
    }

    public function getCalendarEvents()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();
        $dates = CarbonPeriod::create($startOfMonth, $endOfMonth)->toArray();

        $calendarDates = [];
        foreach ($dates as $date) {
            $isPushed = false;
            foreach ($this->events as $event) {
                if ($event->date->equalTo($date)) {
                    array_push($calendarDates, [
                        'date' => $date->format('d D'),
                        'event' => $event->name,
                    ]);

                    $isPushed = true;
                }
            }
            if (! $isPushed) {
                array_push($calendarDates, [
                    'date' => $date->format('d D'),
                ]);
            }
        }

        return $calendarDates;
    }

    public static function getCalendar($currentMonthYear)
    {
        $calendar = Calendar::query()->firstWhere('month_year', $currentMonthYear);
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = $startOfMonth->copy()->endOfMonth();
        $dates = CarbonPeriod::create($startOfMonth, $endOfMonth)->toArray();
        $calendarDates = [];

        foreach ($dates as $date) {
            $isPushed = false;
            if ($calendar) {
                foreach ($calendar->events as $event) {
                    if ($event->date->equalTo($date)) {
                        array_push($calendarDates, [
                            'date' => $date->format('d D'),
                            'event' => $event->name,
                        ]);

                        $isPushed = true;
                    }
                }
            }
            if (! $isPushed) {
                array_push($calendarDates, [
                    'date' => $date->format('d D'),
                ]);
            }
        }

        return $calendarDates;
    }
}
