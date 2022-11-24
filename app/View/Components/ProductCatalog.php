<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCatalog extends Component
{
    /**
     * The image source
     *
     * @var string
     */
    public $imgsrc;

    /**
     * The product name
     *
     * @var string
     */
    public $name;

    /**
     * The product description
     *
     * @var string
     */
    public $desc;

    /**
     * The product review modal ID
     *
     * @var string
     */
    public $modalId;


    public function __construct($imgsrc, $name, $desc, $modalId)
    {
        $this->imgsrc = $imgsrc;
        $this->name = $name;
        $this->desc = $desc;
        $this->modalId = $modalId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-catalog');
    }
}
