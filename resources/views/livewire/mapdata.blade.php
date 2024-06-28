<?php

use function Livewire\Volt\{computed, state, mount, updated};

state(['items'])
    ->reactive();

$itemsjson = computed(function () {
    return json_encode($this->items);
});

?>

<div>
    <!-- <div wire:key="{{rand()}}"> -->
    <div x-data="mapdatakeyword" x-effect="render({{$items}})">
        <div x-data="{itemsjson: {{ $items }}}">
            <button x-on:click='console.log({{$items}})'>click</button>
        </div>
    </div>

    <!-- </div> -->
</div>