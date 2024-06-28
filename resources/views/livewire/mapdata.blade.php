<?php

use function Livewire\Volt\{computed, state, mount, updated};

state(['items'])
    ->reactive();

$itemsjson = computed(function () {
    return json_encode($this->items);
});

?>

<div>
    <div x-data="mapdatakeyword" x-effect="render({{$items}})">
    </div>
</div>