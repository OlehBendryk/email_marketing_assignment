<?php

namespace App\Services;


use App\Models\Customer;


class CustomerService
{
    protected mixed $model;

    public function __construct()
    {
        $this->model = app(Customer::class);
    }

    /**
     * @param  array  $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        $customer = $this->model;

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
