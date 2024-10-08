<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('report_data', function (Blueprint $table) {
            $table->id();
            $table->double('omision')->nullable();
            $table->double('omisionCabecera')->nullable();
            $table->double('omisionPoblado')->nullable();
            $table->double('omisionPorcentaje')->nullable();
            $table->double('noAutoreconocimiento')->nullable();
            $table->double('omisionEdadGrupo1')->nullable();
            $table->double('omisionEdadGrupo2')->nullable();
            $table->double('omisionEdadGrupo3')->nullable();
            $table->double('omisionEdadGrupoArbolMujer1')->nullable();
            $table->double('omisionEdadGrupoArbolHombre1')->nullable();
            $table->double('omisionEdadGrupoArbolMujer2')->nullable();
            $table->double('omisionEdadGrupoArbolHombre2')->nullable();
            $table->double('omisionEdadGrupoArbolMujer3')->nullable();
            $table->double('omisionEdadGrupoArbolHombre3')->nullable();
            $table->double('omisionEdadGrupoArbolMujer4')->nullable();
            $table->double('omisionEdadGrupoArbolHombre4')->nullable();
            $table->double('omisionEdadGrupoArbolMujer5')->nullable();
            $table->double('omisionEdadGrupoArbolHombre5')->nullable();
            $table->double('omisionEdadGrupoArbolMujer6')->nullable();
            $table->double('omisionEdadGrupoArbolHombre6')->nullable();
            $table->double('omisionEdadGrupoArbolMujer7')->nullable();
            $table->double('omisionEdadGrupoArbolHombre7')->nullable();
            $table->double('omisionEdadGrupoArbolMujer8')->nullable();
            $table->double('omisionEdadGrupoArbolHombre8')->nullable();
            $table->double('omisionEdadGrupoArbolMujer9')->nullable();
            $table->double('omisionEdadGrupoArbolHombre9')->nullable();
            $table->double('totalUnidadesVivienda')->nullable();
            $table->double('totalUnidadesViviendaOcupadas')->nullable();
            $table->double('totalResidencial')->nullable();
            $table->double('totalNoResidencial')->nullable();
            $table->double('totalMixto')->nullable();
            $table->double('otroPaisMujer')->nullable();
            $table->double('otroPaisHombre')->nullable();
            $table->double('otroMunicipioMujer')->nullable();
            $table->double('otroMunicipioHombre')->nullable();
            $table->double('esteMunicipioMujer')->nullable();
            $table->double('esteMunicipioHombre')->nullable();
            $table->double('totalHogaresParticulares')->nullable();
            $table->double('indigenas')->nullable();
            $table->double('gitanos')->nullable();
            $table->double('raizales')->nullable();
            $table->double('palenqueros')->nullable();
            $table->double('afrocolombiano')->nullable();
            $table->double('ningunoEtnico')->nullable();
            $table->double('servicioElectrico')->nullable();
            $table->double('servicioAlcantarillado')->nullable();
            $table->double('servicioAcueducto')->nullable();
            $table->double('servicioBasuras')->nullable();
            $table->double('servicioGas')->nullable();
            $table->double('servicioInternet')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_data');
    }
};
