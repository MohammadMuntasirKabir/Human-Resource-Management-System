<div>
    <div class="relative mb-6 w-full">
        <flux:heading size='xl'>Employees</flux:heading>
        <flux:subheading size='lg' class="mb-6">Create a new Employee:</flux:subheading>
        <flux:separator/>
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <flux:input label="Employee Name" placeholder="Enter Employee Name" wire:model.live="employee.name" required :invalid="$errors->has('employee.name')" type="text"/>
            <flux:input label="Employee Email" placeholder="Enter Employee Email" wire:model.live="employee.email" required :invalid="$errors->has('employee.email')" type="email"/>
            <flux:input label="Employee Phone" placeholder="Enter Employee Phone Number" wire:model.live="employee.phone" required :invalid="$errors->has('employee.phone')" type="text"/>
            <flux:input label="Employee Address" placeholder="Enter Employee Address" wire:model.live="employee.address" required :invalid="$errors->has('employee.address')" type="text"/>
            <flux:select label="Department" placeholder="Select Department" wire:model.live="department_id" required :invalid="$errors->has('department_id')">
                <option selected>Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </flux:select>
            <flux:select label="Designation" placeholder="Select Designation" wire:model.live="employee.designation_id" required :invalid="$errors->has('designation_id')">
                <option selected>Select Designation</option>
                @foreach ($designations as $designation)
                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                @endforeach
            </flux:select>
        </div>
        <flux:button type="submit" variant="primary">Create</flux:button>
    </form>
</div>