<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Http\RedirectResponse;


class CustomersController extends BaseController
{
    private CustomerService $customerService;

    public function __construct(CustomerService $customerService)
    {
        parent::__construct();
        $this->customerService = $customerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(5);

        return view('admin.customers.index')
            ->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * @param  \App\Http\Requests\CreateCustomerRequest  $request
     */
    public function store(CreateCustomerRequest $request)
    {
        $customer = $this->customerService->create($request->all());

        return redirect()
            ->route('customer.index')
            ->with('success', "Customer {$customer['first_name']} {$customer['last_name']} has been created");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $customer = Customer::findOrFail($id);

        return view('admin.customers.show')
            ->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $customer = Customer::findOrFail($id);

        return view('admin.customers.edit')
            ->with('customer', $customer);
    }

    /**
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCustomerRequest $request, int $id): RedirectResponse
    {
        $customer = $this->customerService->update($request->all(), $id);

        return redirect()
            ->route('customer.show', $customer);
    }

    /**
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $customer = $this->customerService->delete($id);

        return redirect()
            ->route('customer.index')
            ->with('success', "Customer {$customer['first_name']} {$customer['last_name']} has been deleted");
    }
}
