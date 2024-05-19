<?php
use Illuminate\Auth\Events\Login;
use function Livewire\Volt\{computed};
use function Laravel\Folio\{middleware, name};

middleware(['auth']);
name('app.task.index');

?>
<title>{{config('app.name')}}: Task</title>
<x-app-layout>
    @volt
    <div></div>
    @endvolt
</x-app-layout>