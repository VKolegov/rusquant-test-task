<?php

namespace App\Infrastructure\Laravel\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Infrastructure\Laravel\Models\FeedbackModel
 *
 * @property string $ulid
 * @property string|null $author_name
 * @property string $email
 * @property string $text
 * @property \Illuminate\Support\Carbon $created_at
 * @mixin \Eloquent
 */
class FeedbackModel extends Model
{
    use HasUlids;

    protected $table = 'feedbacks';
    protected $primaryKey = 'ulid';

    public const UPDATED_AT = null;

    protected $guarded = [
        'ulid',
    ];
}
