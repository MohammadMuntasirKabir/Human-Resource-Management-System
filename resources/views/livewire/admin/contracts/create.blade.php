<div>
    <div class="relative mb-6 w-full">
        <flux:heading size='xl'>Contracts</flux:heading>
        <flux:subheading size='lg' class="mb-6">Create a new Contract:</flux:subheading>
        <flux:separator/>
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <flux:input type="search" name="search" wire:model.live="search" placeholder="Search for an Employee"/>
        @if ($search != '' && $employees->count() > 0)
            <div class="bg-white dark:bg-zinc-900 w-full border border-zinc-200 dark:border-zinc-800 rounded-md shadow-md -mt-10">
                <ul class="w-full">
                    @foreach ($employees as $employee)
                        <li class="p-2 hover:bg-zinc-200 dark:bg-zinc-700 cursor-pointer" wire:click="selectEmployee({{ $employee->id }})">
                            {{ $employee->name }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>