<?php

use Illuminate\Database\Seeder;
use App\Ticket;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
        $p = new Ticket;
        $p->titulo = "Ticket Usuario 1";
        $p->categoria = "Tecnlogia";
        $p->prioridad = "low";
        $p->mensaje = "Mensaje de prueba";
        $p->status = "open";
        $p->user = 1;

        $p->save();

        $p = new Ticket;
        $p->titulo = "Ticket Usuario 2";
        $p->categoria = "Ciencia";
        $p->prioridad = "medium";
        $p->mensaje = "Mensaje de prueba";
        $p->status = "open";

        $p->user = 2;

        $p->save();
    }
}
