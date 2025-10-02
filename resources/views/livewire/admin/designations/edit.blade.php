<div>
    <div class="relative mb-6 w-full">
        <flux:heading size='xl'>Designations</flux:heading>
        <flux:subheading size='lg' class="mb-6">Edit this Designation:</flux:subheading>
        <flux:separator/>
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <flux:select label="Department" placeholder="Select Department" wire:model.live="designation.department_id" required :invalid="$errors->has('designation.department_id')">
        <option selected>Select Department</option>
        @foreach ($departments as $department)
            <option value="{{ $department->id }}">{{ $department->name }}</option>
        @endforeach
        <flux:input label="Designation Name" placeholder="Enter Designation Name" wire:model.live="designation.name" required :invalid="$errors->has('designation.name')" type="text"/>
        <flux:button type="submit" variant="primary">Save</flux:button>
    </form>
</div>