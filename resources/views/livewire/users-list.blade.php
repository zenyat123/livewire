

	<x-slot name="header">

		<h2 class = "font-semibold text-xl text-gray-800 leading-tight">

			{{ __("Users") }}

		</h2>

	</x-slot>

	<div class = "max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

		<x-card>

			<x-slot name="title">

				Users table

			</x-slot>

			<x-slot name="content">

				<div class = "flex justify-end">

					<x-jet-input wire:model="search" class="border mr-2"/>

					<x-jet-secondary-button wire:click="cleanFilter">

						<svg xmlns = "http://www.w3.org/2000/svg" fill = "none" viewBox = "0 0 24 24" stroke = "currentColor">

	                        <path stroke-linecap = "round" stroke-linejoin = "round" stroke-width = "2" d = "M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>

	                    </svg>

					</x-jet-secondary-button>

				</div>

				<table class = "table-auto w-full">

					<thead>

						<tr>

							@foreach($columns as $field)

								<th class = "p-3" wire:click = "order('{{ $field }}')">

									<button class = "font-bold">

										{{ $field }}

										@if($column == $field)

											@if($order == "asc")

												&uarr;

											@else

												&darr;

											@endif

										@endif

									</button>

								</th>

							@endforeach

							<th class = "p-3">actions</th>

						</tr>

					</thead>

					<tbody>

						@forelse($users as $user)

							<tr>

								<td class = "p-3">{{ $user->id }}</td>
								<td class = "p-3">{{ $user->name }}</td>
								<td class = "p-3">{{ $user->email }}</td>
								<td class = "p-3">

									<x-link href="{{ route('user.edit', $user) }}" class="bg-blue-800 hover:bg-blue-600 px-2">

										<svg xmlns = "http://www.w3.org/2000/svg" class = "h-6 w-6" fill = "none" viewBox = "0 0 24 24" stroke = "currentColor">

									  		<path stroke-linecap = "round" stroke-linejoin = "round" stroke-width = "2" d = "M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>

										</svg>

									</x-link>

									<x-link href="#" wire:click="destroy({{ $user }})" class="bg-red-800 hover:bg-red-600 px-2">

										<svg xmlns = "http://www.w3.org/2000/svg" class = "h-6 w-6" fill = "none" viewBox = "0 0 24 24" stroke = "currentColor">
									  		
									  		<path stroke-linecap = "round" stroke-linejoin = "round" stroke-width = "2" d = "M6 18L18 6M6 6l12 12"/>
										
										</svg>

									</x-link>

								</td>

							</tr>

						@empty

							<tr>

								<td>No hay coincidencias</td>

							</tr>

						@endforelse

					</tbody>

				</table>

				<div class = "mt-9">

					{{ $users->links() }}

				</div>

				<x-link href="{{ route('user.create') }}">

					Create User

				</x-link>

				{{ session("response") }}

			</x-slot>

		</x-card>

	</div>

