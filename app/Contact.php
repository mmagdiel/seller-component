<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ContactsWarehouse;
use App\SellersCordinate;
use App\VisitsCustomer;

class Contact extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts';
    public function warehouses()
    {
        return $this->hasMany(ContactsWarehouse::class);
    }
    public function visits()
    {
        return $this->hasMany(VisitsCustomer::class);
    }
    public function selers()
    {
        return $this->hasMany(SellersCordinate::class);
    }
}
