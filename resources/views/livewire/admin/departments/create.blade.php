<div>
    <div class="relative mb-6 w-full">
        <flux:heading size='xl'>Departments</flux:heading>
        <flux:subheading size='lg' class="mb-6">Create a new Department:</flux:subheading>
        <flux:separator/>
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <flux:input label="Department Name" placeholder="Enter Department Name" wire:model.live="department.name" required :invalid="$errors->has('department.name')" type="text"/>
        <flux:button type="submit" variant="primary">Create</flux:button>
    </form>
</div>