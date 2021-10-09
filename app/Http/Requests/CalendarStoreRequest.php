<?php

namespace App\Http\Requests;

use App\Rules\CurrentMonthRule;
use Illuminate\Foundation\Http\FormRequest;
use function Symfony\Component\Translation\t;

class CalendarStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event' => ['required', 'max:255',],
            'dateFrom' => ['required', 'date', new CurrentMonthRule()],
            'dateTo' => ['required', 'date', new CurrentMonthRule()],
            'mon' => $this->requiredDay('mon'),
            'tue' => $this->requiredDay('tue'),
            'wed' => $this->requiredDay('wed'),
            'thu' => $this->requiredDay('thu'),
            'fri' => $this->requiredDay('fri'),
            'sat' => $this->requiredDay('sat'),
            'sun' => $this->requiredDay('sun'),
        ];
    }

    private function requiredDay($day)
    {
        $days = array_diff([
            'mon',
            'tue',
            'wed',
            'thu',
            'fri',
            'sat',
            'sun',
        ], [$day]);

        return 'required_without_all:' . implode(',', $days);
    }
}
