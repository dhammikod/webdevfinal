<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalReview extends Component
{
    /**
     * The modal ID
     *
     * @var string
     */
    public $modalId;

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
    public $prodName;

    public function __construct($modalId, $imgsrc, $prodName)
    {
        $this->modalId = $modalId;
        $this->imgsrc = $imgsrc;
        $this->prodName = $prodName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-review');
    }
}
