<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\CreateGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Repositories\CustomerRepository;
use App\Repositories\GroupRepository;
use App\Services\GroupService;
use Illuminate\Http\RedirectResponse;


class GroupsController extends BaseController
{
    private GroupRepository $groupRepository;
    private GroupService $groupService;
    private CustomerRepository $customerRepository;

    /**
     * @param  \App\Services\GroupService  $groupService
     * @param  \App\Repositories\GroupRepository  $groupRepository
     * @param  \App\Repositories\CustomerRepository  $customerRepository
     */
    public function __construct(
        GroupService $groupService,
        GroupRepository $groupRepository,
        CustomerRepository $customerRepository
    ) {
        parent::__construct();
        $this->groupService = $groupService;
        $this->groupRepository = $groupRepository;
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        $groups = $this->groupRepository->getAllWithPagination();

        return view('admin.groups.index')
            ->with('groups', $groups);
    }

    public function create()
    {
        $customers = $this->customerRepository->getFullName();

        return view('admin.groups.create')
            ->with('customers', $customers);
    }

    public function store(CreateGroupRequest $request): RedirectResponse
    {
        $group = $this->groupService->create($request->all());

        return redirect()
            ->route('group.index')
            ->with('success', "Group $group->name was successfully created");
    }

    public function show(int $id)
    {
        $group = $this->groupRepository->getById($id);
        $customers = $this->groupRepository->getCustomersForGroup($id);

        return view('admin.groups.show', $group)
            ->with('group', $group)
            ->with('customers', $customers);
    }

    public function edit(int $id)
    {
        $group = $this->groupRepository->getById($id);
        $customers = $this->customerRepository->getFullName();
        $customersForGroup = $this->groupRepository->getCustomersForGroup($id);

        return view('admin.groups.edit')
            ->with('group', $group)
            ->with('customers', $customers)
            ->with('customersForGroup', $customersForGroup);
    }

    public function update(UpdateGroupRequest $request, int $id): RedirectResponse
    {
        $group = $this->groupService->update($request->all(), $id);

        return redirect()
            ->route('group.show', $group)
            ->with('success', "Group $group->name successfully updated");
    }

    public function destroy(int $id): RedirectResponse
    {
        $group = $this->groupService->delete($id);

        return redirect()
            ->route('group.index')
            ->with('success', "Group $group->name was successfully deleted");
    }
}
