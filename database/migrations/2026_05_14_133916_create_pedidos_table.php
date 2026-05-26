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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();

            //Datos del cliente
            $table->string('cliente_nombre', 100);
            $table->string('cliente_email', 150)->nullable();
            $table->string('cliente_telefono', 20)->nullable();
            $table->text('cliente_direccion')->nullable();

            //Estado del pedido
            $table->enum('estado',[
                'pendiente', 'confirmado',
                'en_preparacion', 'enviado',
                'entregado', 'cancelado'
            ])->default('pendiente');

            //pago
            $table->enum('metodo_pago', [
                'efectivo', 'transferencia',
                'tarjeta_debito', 'tarjeta_credito',
                'mercado_pago'
            ])->nullable();
            $table->enum('estado_pago', [
                'pendiente', 'pagado', 'rechazado'
            ])->default('pendiente');

            //Totales
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('descuento', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);

            $table->text('notas')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
