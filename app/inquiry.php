<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inquiry';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
  protected $fillable = ['inquiries_name', 'nationality', 'inquiries_email', 'inquiries_phone','extra_content','inquiries_lname'];

    
}
