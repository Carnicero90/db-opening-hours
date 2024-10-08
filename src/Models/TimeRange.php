<?php

declare(strict_types=1);

namespace Datomatic\DatabaseOpeningHours\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * @property DateTimeInterface $start
 * @property DateTimeInterface $end
 * @property string $description
 * @property-read string $notation
 */
final class TimeRange extends Model
{
    protected $table = 'opening_hours_time_ranges';

    protected $fillable = ['start', 'end', 'description'];

    protected $casts = [
        'id' => 'int',
        'day_id' => 'int',
        'start' => 'datetime',
        'end' => 'datetime',
        'description' => 'string',
    ];

    protected $appends = ['notation'];

    public function notation(): Attribute
    {
        return Attribute::get(function (): string {
            return sprintf('%s-%s', $this->start->format('H:i'), $this->end->format('H:i'));
        });
    }
}
