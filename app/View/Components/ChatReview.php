<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ChatReview extends Component
{
    /**
     * The reviewer's name
     *
     * @var string
     */
    public $name;

    /**
     * The reviews
     *
     * @var string
     */
    public $reviews;

    /**
     * The review time
     *
     * @var string
     */
    public $time;

    /**
     * The score
     *
     * @var float
     */
    public $score;


    public function __construct($name, $reviews, $time, $score)
    {
        $this->name = $name;
        $this->reviews = $reviews;
        $this->time = $time;
        $this->score = $score;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chat-review');
    }
}
