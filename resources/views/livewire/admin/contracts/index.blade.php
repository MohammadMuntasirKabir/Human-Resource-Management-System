<div>
    <div class="relative mb-6 w-full">
        <flux:heading size='xl'>contracts</flux:heading>
        <flux:subheading size='lg' class="mb-6">List of contracts for {{ getCompany()->name }}:</flux:subheading>
        <p>{{$contracts->count()}}</p>
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
                                <th class="px-6 py-4 bg-amber-50">Employee Details</th>
                                <th class="px-6 py-4 bg-amber-50">Contract Details</th>
                                <th class="px-6 py-4 bg-amber-50">Rate</th>
                                <th class="px-6 py-4 bg-amber-50">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-purple-400 divide-y divide-gray-200">
                            @foreach($contracts as $key=>$contract)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-amber-100">{{ $key+1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-amber-100">
                                        <span class="font-semibold text-lg align-middle">{{ $contract->employee->name }}</span>
                                        <span class="ml-4 align-middle">{{ $contract->employee->email }}</span>
                                        <span class="ml-4 align-middle">{{ $contract->employee->phone }}</span>
                                        <span class="font-bold align-middle">{{ $contract->employee->designation->name }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-amber-100 flex flex-col">
                                        <span>Start: {{ $contract->start_date }}</span>
                                        <span>End: {{ $contract->end_date }}</span>
                                        <span class="font-semibold text-lg">Duration: {{ $contract->duration }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm bg-amber-100">BDT {{ number_format($contract->rate) }} {{ $contract->rate_type }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div>
                                            <flux:button variant="filled" icon="pencil" :href="route('contracts.edit', $contract->id)"/>
                                            <flux:button variant="danger" icon="trash" wire:click="delete({{ $contract->id }})"/>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="py-7 px-4">{{ $contracts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
