<?php namespace Lifeids\AbuseReportable\Traits;

use Lifeids\AbuseReportable\Models\Report;
use Illuminate\Database\Eloquent\Model;

trait AbuseReportable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function abusereports()
    {
        return $this->morphMany(AbuseReport::class, 'abusereportable');
    }

    /**
     * @param $data
     * @param Model $reportable
     *
     * @return $this
     */
    public function abusereport($data, Model $abusereportable)
    {
        $abusereport = (new AbuseReport())->fill(array_merge($data, [
            'abusereporter_id' => $abusereportable->id,
            'reporter_type' => get_class($abusereportable),
        ]));

        $this->abusereports()->save($abusereport);

        return $abusereport;
    }

    public function getreportsCountAttribute()
    {
        return $this->abusereports()->count();
    }
}
