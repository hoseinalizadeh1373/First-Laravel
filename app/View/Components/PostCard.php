<?php

namespace App\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class PostCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $names;
    public $href;
    public $data;

    public function __construct($names, $href)
    {
        $array = mb_split('-', $names);

        
        $this->href = mb_split('-',$href);
        $s ='dsd';
        $this->names = collect($array);
        $t ="route('$s','$s')";

        // dd($this->href);
        // $collection = collect(['name', 'href']);
        // for ($i = 0; $i < count($array); $i++) {
        //     // $combined = $collection->combine([$array[$i],$arrhref[$i]]);
        //     $colle = collect([$collection[0]=>$array[$i],$collection[1]=>$arrhref[$i]]);
        // }
        // dd($colle, count($arrhref));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-card');
    }
}
