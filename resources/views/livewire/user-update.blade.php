

	<x-slot name="header">

		<h2 class = "font-semibold text-xl text-gray-800 leading-tight">

			{{ __("Update User") }}

		</h2>

	</x-slot>

	<div class = "max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

		<x-card>

			<x-slot name="title">

				Update User

			</x-slot>

			<x-slot name="content">

				<form wire:submit.prevent = "update" class = "max-w-screen-sm">

					<x-jet-label class="mt-3">Name:</x-jet-label>
					<x-jet-input type="text" class="w-full" wire:model="name"/>

					@error("name")
                        {{ $message }}
                    @enderror

					<x-jet-label class="mt-3">Email:</x-jet-label>
					<x-jet-input type="email" class="w-full" wire:model="email"/>

					@error("email")
                        {{ $message }}
                    @enderror

					<x-jet-label class="mt-3">Password:</x-jet-label>
					<x-jet-input type="password" class="w-full" wire:model="password"/>

					@error("password")
                        {{ $message }}
                    @enderror

					<x-jet-button type="submit" class="mt-6">Update</x-jet-button>

				</form>

			</x-slot>

		</x-card>

	</div>

