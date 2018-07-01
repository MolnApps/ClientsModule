<?php

namespace Modules\Clients\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Clients\Entities\Client;
use Modules\Addresses\Entities\Address;
use Modules\CustomFields\Entities\CustomFieldValue;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class, 50)->create()->each(function ($c) {
            $c->addresses()->save(factory(Address::class)->make());
            $c->customFieldValues()->save(factory(CustomFieldValue::class)->make());
        });
    }
}
