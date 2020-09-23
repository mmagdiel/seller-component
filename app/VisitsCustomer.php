<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contact;
use App\ContactsWarehouse;

class VisitsCustomer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'visits_customers';
    public function seller()
    {
        return $this->belongsTo(Contact::class,'foreign_key');
    }
    public function warehouse()
    {
        return $this->belongsTo(ContactsWarehouse::class,'foreign_key');
    }
}
