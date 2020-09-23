<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contact;
use App\VisitsCustomer;

class ContactsWarehouse extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts_warehouses';
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
    public function warehouses()
    {
        return $this->hasMany(VisitsCustomer::class);
    }
}
