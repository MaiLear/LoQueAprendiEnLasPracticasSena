<?php

namespace App\View\Composers;

use Illuminate\View\View;

class ClientComposer{

    public function compose(View $view){
        $view->with('saludo2', 'Hola este mensaje solo lo pueden ver los clientes');
    }

}