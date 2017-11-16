<?php namespace Lifeids\AbuseReportable\Contracts;

use Illuminate\Database\Eloquent\Model;

interface AbuseReportable
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function abusereports();

    /**
     * @param $data
     * @param Model $reportable
     *
     * @return mixed
     */
    public function abusereport($data, Model $reportable);
}
