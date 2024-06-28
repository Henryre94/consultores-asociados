<x-filament-panels::page>

    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Posts</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Lista de todos los dilengenciamientos en el systema</p>
        </div>
        <div class="border-t border-gray-200">
            <!-- Filter section -->
            <div class="flex-row justify-between  px-4 py-3 sm:px-6">
                <div class="flex px-4 py-3 sm:px-6">
                    
                    @if (!$choosedFilter)
                    <div class="p-4">
                        <label for="filter" class="block text-sm font-medium text-gray-700">Tipo de Filtros</label>

                        <select id="filter" name="filter" wire:model="selectedOption" wire:change="choosedFilterFunction" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                            <option value="">Seleccione un filtro</option>
                            <option class="text-gray-700" value="Vulnerabilidad">Tipo de Vulnerabilidad</option>
                            <option class="text-gray-700"  value="Discapacidad">Tipo de discapacidad</option>
                            <option class="text-gray-700"  value="Edad">Edad</option>
                            <option class="text-gray-700"  value="Genero">Genero</option>
                            <option class="text-gray-700"  value="FichaNo.">Ficha No.</option>
                            <option class="text-gray-700"  value="Ubicacion o Centro Poblado">Ubicacion o Centro Poblado</option>
                            <option class="text-gray-700"  value="Vivienda">Tipo de Vivienda</option>
                        </select>
                    </div>
                    @else
                    <input id="selectedFilter" class="text-gray-700" value={{ $selectedOption }}>
                         @if ($selectedOption === "Edad" || $selectedOption === "FichaNo."  )
                            <input class="text-gray-700" type="number" wire:model="inputValue" wire:change="setFilter">
                        @else
                            <input class="text-gray-700" type="text" wire:model="inputValue" wire:change="setFilter">
                         @endif
                    <x-filament::button icon="heroicon-c-plus" wire:click="resetFilter">
                  
                    </x-filament::button>
                    @endif
                </div>
                
                <x-filament::button >
                  Aplicar filtros
                </x-filament::button>
                <div class="text-gray-700">
                    @forelse ($filterValues as $filterValue)
                        <li>{{ $filterValue }}</li>
                    @empty
                        <span class="font-medium text-gray-700">No hay filtros aplicados</span>
                    @endforelse
                </div>
            </div>

            <!-- Table section -->

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departamento</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Municipio</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edad</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vulnerabilidad</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($diligenciamientos as $diligenciamiento)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider">{{ $diligenciamiento->usuario_movil }}</td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider">{{ $diligenciamiento->departamento }}</td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider">{{ $diligenciamiento->municipio }}</td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider">{{ $diligenciamiento->edad }}</td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-500 uppercase tracking-wider">{{ $diligenciamiento->tipo_discapacidad }}</td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">No posts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        
        </div>
    </div>
</x-filament-panels::page>
