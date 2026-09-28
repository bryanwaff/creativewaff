<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public ?string $title;
    public ?string $metaDescription;
    public ?string $ogImage;

    public function __construct(
        ?string $title = null,
        ?string $metaDescription = null,
        ?string $ogImage = null
    ) {
        $this->title = $title;
        $this->metaDescription = $metaDescription;
        $this->ogImage = $ogImage;
    }

    public function render(): View
    {
        return view('layouts.app');
    }
}