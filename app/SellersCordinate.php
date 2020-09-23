<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contact;

class SellersCordinate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sellers_cordinates';
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
