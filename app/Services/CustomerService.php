<?php

namespace App\Services;


use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;


class CustomerService
{
    /**
     * @param  array  $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        $customer = new Customer();

        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->email = $data['email'];
        $customer->birth_date = $data['birth_date'];
        $customer->sex = $data['sex'];

        $customer->save();

        return $customer;
    }

    public function update(array $data, int $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->first_name = $data['first_name'];
        $customer->last_name = $data['last_name'];
        $customer->email = $data['email'];
        $customer->birth_date = $data['birth_date'];
        $customer->sex = $data['sex'];

        $customer->save();

        return $customer;
    }

    public function delete(int $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return $customer;
    }

}
