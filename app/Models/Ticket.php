<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ticket extends Model
{

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'title',
            'description',
            'priority',
            'status',
            'comment',
            'assigned_by',
            'assigned_to',
        ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    //    protected $casts
    //        = [
    //            'id'          => 'integer',
    //            'assigned_by' => 'integer',
    //            'assigned_to' => 'integer',
    //        ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function assignedBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to', 'id');
    }

}
