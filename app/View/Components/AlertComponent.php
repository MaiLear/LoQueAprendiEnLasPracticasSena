<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AlertComponent extends Component
{
    public $class;
    /**
     * Create a new component instance.
     */
    public function __construct($color)
    {
        switch($color){
            case 'info':
                $this->class = 'alert alert-info';
                break;
                
                case 'success':
                    $this->class = 'alert alert-success';
                    break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert-component');
    }
}
