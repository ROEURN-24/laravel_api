<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'age',
        'province',
        'score',
        'phone_number',
    ];

    /**
     * The attributes that should be appended to the model's array form.
     *
     * @var array<string>
     */

     
    protected $appends = ['status'];

    /**
     * Accessor for the status attribute.
     * Computes the status based on the score.
     *
     * @return string
     */
    public function getStatusAttribute(): string
    {
        return $this->score >= 50 ? 'Pass' : 'Fail';
    }

    /**
     * Retrieve all students.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function list()
    {
        $data = self::all();
        return $data;
    }

    /**
     * Store or update a student record.
     * If an ID is provided, it updates the existing record.
     * If no ID is provided, it creates a new record.
     *
     * @param \Illuminate\Http\Request $request
     * @param int|null $id
     * @return self
     */
    public static function store($request, $id = null)
    {
        $data = $request->only('name', 'age', 'province', 'score', 'phone_number');
        return self::updateOrCreate(['id' => $id], $data);
    }
}
