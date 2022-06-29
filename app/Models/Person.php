<?php

namespace App\Models;

use App\Enums\GenderEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'persons'; // Laravel persons tablosunu people olarak çevirdiği için eklendi.

    /**
     * @var string[]
     */
    protected $fillable = ['name', 'birthday', 'gender'];

    /**
     * @var string[]
     */
    protected $dates = ['created_at', 'updated_at', 'birthday'];

    /**
     * @return void
     */
    public static function boot(): void
    {
        parent::boot();

        static::deleting(function ($person) {
            $person->address()->delete();
        });
    }

    /**
     * @return HasOne
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class, 'person_id', 'id');
    }

    /**
     * @param $value
     *
     * @return string|null
     */
    public function getGenderAttribute($value): ?string
    {
        return GenderEnum::getGender($value);
    }

}
