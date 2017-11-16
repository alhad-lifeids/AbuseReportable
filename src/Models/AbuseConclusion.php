<?php

namespace Lifeids\AbuseReportable\Models;

use Illuminate\Database\Eloquent\Model;

class AbuseConclusion extends Model
{
    /**
     * @var string
     */
    protected $table = 'abusereports_conclusions';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $casts = ['meta' => 'array'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conclusion()
    {
        return $this->belongsTo(AbuseReport::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function judge()
    {
        return $this->morphTo();
    }
}
