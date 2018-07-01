<?php

namespace Modules\Clients\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Addresses\Entities\Address;
use Modules\CustomFields\Entities\CustomFieldValue;

class Client extends Model
{
    protected $fillable = ['name'];

    public function addresses()
    {
        return $this->morphToMany(Address::class, 'addressable');
    }

    public function customFieldValues()
    {
        return $this->morphToMany(CustomFieldValue::class, 'custom_field_valuable');
    }

    public function toVue()
    {
        return [
            'id' => $this->id, 
            'basicInfo' => [
                'name' => $this->name,
            ],
            'addresses' => $this->addresses()->get()->toArray(),
            'customFields' => $this->customFieldValues()->get()->toArray()
        ];
    }
}
