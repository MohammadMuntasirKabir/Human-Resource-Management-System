<div>
    <div class="relative mb-6 w-full">
        <flux:heading size='xl'>Employees</flux:heading>
        <flux:subheading size='lg' class="mb-6">List of Employees for {{ getCompany()->name }}:</flux:subheading>
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
                                <th class="px-6 py-4 bg-amber-50">Employee Name</th>
                                <th class="px-6 py-4 bg-amber-50">Designation Name</th>
                                <th class="px-6 py-4 bg-amber-50">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-purple-400 divide-y divide-gray-200">
                            @foreach($employees as $key=>$employee)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $key+1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 flex flex-col items-center">
                                        <span class="font-bold text-lg">{{ $employee->name }}</span>
                                        <span>{{ $employee->email }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 font-bold text-lg">{{ $employee->designation->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-lg font-medium">
                                        <div>
                                            <flux:button variant="filled" icon="pencil" :href="route('employees.edit', $employee->id)"/>
                                            <flux:button variant="danger" icon="trash" wire:click="delete({{ $employee->id }})"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                    <div class="py-7 px-4">{{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
