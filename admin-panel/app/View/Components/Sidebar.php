<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function isActive($url)
    {
        return request()->url() == $url;
    }

    public function render()
    {
        return view('components.sidebar');
    }
}
