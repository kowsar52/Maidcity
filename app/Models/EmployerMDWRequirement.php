<?php

namespace App\Models;

use App\Enum\TableEnum;
use App\Models\Authorization\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployerMDWRequirement extends Model
{
    use HasFactory;
    protected $table = TableEnum::EMPLOYER_MDW_REQUIREMENTS;
    protected $casts = [
        'answer1' => 'array',
        'answer2' => 'array',
        'answer3' => 'array',
        'answer5' => 'array',
    ];
    protected $fillable = [
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'answer5',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class,'user_id','user_id');
    }
}
