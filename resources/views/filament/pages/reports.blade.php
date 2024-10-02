<x-filament-panels::page>
            <div class="flex-row justify-center items-center mt-1 rounded p-1">
                <div class="p-6 max-w-lg mx-auto bg-white rounded-lg shadow-md space-y-6">
                    <div class="flex flex-col space-y-4">
                        <form method="GET" action="{{ route('generate-report') }}" target="_blank">
                            <div class="flex flex-col">
                                    <label for="omision" class="text-sm font-semibold text-gray-700 mb-2">Población total ajustada por omisión</label>
                                    <div class="relative">
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="omision" type="number" name="omision" wire:model.defer="omision" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>
                            </div>
                            <div class="flex flex-col">
                                    <label for="omision" class="text-sm font-semibold text-gray-700 mb-2">Población ajustada por omisión en cabecera municipal:</label>
                                    <div class="relative">
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="omision" type="number" name="omisionCabecera" wire:model.defer="omisionCabecera" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>
                            </div>
                            <div class="flex flex-col">
                                    <label for="omision" class="text-sm font-semibold text-gray-700 mb-2">Población ajustada por omisión en centros poblados y rural disperso:</label>
                                    <div class="relative">
                                        <x-filament::input.wrapper>
                                            <x-filament::input id="omision" type="number" name="omisionPoblado" wire:model.defer="omisionPoblado" class="w-full" />
                                        </x-filament::input.wrapper>
                                    </div>
                            </div>
                            <div class="flex justify-end mt-1">
                                    <x-filament::button type="submit" >
                                        Generar Reporte
                                    </x-filament::button>
                            </div>
                        </form>
                    </div>
                    <x-filament::button wire:click="generateGraphics" color="info" class="me-1"
                        style=" font-size: 12px;  letter-spacing: 1px;">
                        Generar Graficas
                    </x-filament::button>
                </div>
                @if ($showGraphics)
                    <div style="margin-top: 150px; width: 500px; height: 500px" id="chart-container">
                        @livewire(\App\Filament\Widgets\BarChart::class, ['data' => $diligenciamientos, 'condition' => 'AgeGroups'])
                    </div>
                    <div style="margin-top: 150px; width: 1000px; height: 500px" id="chart-container">
                        @livewire(\App\Filament\Widgets\BarChart::class, ['data' => $diligenciamientos, 'condition' => 'serviciosPublicos'])
                    </div>

                    <div style="margin-top: 150px; width: 500px; height: 500px" id="chart-container">
                        @livewire(\App\Filament\Widgets\PieChart::class, ['data' => $diligenciamientos])
                    </div>
                    <div style="margin-top: 150px; width: 500px; height: 500px" id="chart-container">
                        @livewire(\App\Filament\Widgets\PolarChart::class, ['data' => $diligenciamientos])
                    </div>
                 @else
                 <div></div>
                 @endif

                 

            </div>
</x-filament-panels::page>
