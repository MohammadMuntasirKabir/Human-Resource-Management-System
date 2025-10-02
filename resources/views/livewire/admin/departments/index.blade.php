<div>
    <div class="relative mb-6 w-full">
        <flux:heading size='xl'>Departments</flux:heading>
        <flux:subheading size='lg' class="mb-6">List of Departments for {{ getCompany()->name }}:</flux:subheading>
        <flux:separator/>
    </div>

    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block align-middle min-w-full py-2 sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full table">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 bg-amber-50">#</th>
                                <th class="px-6 py-4 bg-amber-50">Department Name</th>
                                <th class="px-6 py-4 bg-amber-50">Number of Designations</th>
                                <th class="px-6 py-4 bg-amber-50">Number of Employees</th>
                                <th class="px-6 py-4 bg-amber-50">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-purple-400 divide-y divide-gray-200">
                            @foreach($departments as $key=>$department)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $key+1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="ml-4 align-middle">{{ $department->name }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $department->designations->count() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $department->designations->flatMap->employees->count() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div>
                                            <flux:button variant="filled" icon="pencil" :href="route('departments.edit', $department->id)"/>
                                            <flux:button variant="danger" icon="trash" wire:click="delete({{ $department->id }})"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                    <div class="py-7 px-4">{{ $departments->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
