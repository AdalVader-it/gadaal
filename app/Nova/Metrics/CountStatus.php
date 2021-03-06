<?php

namespace App\Nova\Metrics;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;
use App\Survey;
class CountStatus extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public $name ="Survey Status";

    public function calculate(Request $request)
    {
        return $this->count($request, Survey::class, 'status_id')
                ->label(function ($label){
                    switch ($label) {
                        case '2':
                            return 'Not Fixed';
                        case 1:
                            return 'Fixed';
                    }
                });
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'CountStatus';
    }
}
