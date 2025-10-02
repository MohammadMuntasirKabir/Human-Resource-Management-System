<div>
    <div class="relative mb-6 w-full">
        <flux:heading size='xl'>Companies</flux:heading>
        <flux:subheading size='lg' class="mb-6">Create a new Company:</flux:subheading>
        <flux:separator/>
    </div>

    <form wire:submit="save" class="my-6 w-full space-y-6">
        <flux:input label="Company Name" placeholder="Enter Company Name" wire:model.live="company.name" required :invalid="$errors->has('company.name')" type="text"/>
        <flux:input label="Company Email" placeholder="Enter Company Email Address" wire:model.live="company.email" required :invalid="$errors->has('company.email')" type="email"/>
        <flux:input label="Company Website" placeholder="Enter Company Website" wire:model.live="company.website" required :invalid="$errors->has('company.website')" type="url"/>
        <flux:input label="Company Logo" placeholder="Enter Company Logo" wire:model.live="logo" required :invalid="$errors->has('logo')" type="file"/>
        <flux:button type="submit" variant="primary">Create</flux:button>
    </form>
</div>
