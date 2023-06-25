<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Repositories\CustomerRepository;
use App\Services\CustomerService;
use Illuminate\Http\RedirectResponse;


class CustomersController extends BaseController
{
    private CustomerService $customerService;
    private CustomerRepository $customerRepository;

    public function __construct(
        CustomerService $customerService,
        CustomerRepository $customerRepository
    ) {
        parent::__construct();
        $this->customerService = $customerService;
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = $this->customerRepository->getAllWithPagination();

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
        $customer = $this->customerRepository->getById($id);

        return view('admin.customers.show')
            ->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $customer = $this->customerRepository->getById($id);

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
