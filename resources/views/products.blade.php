<x-app-layout>
    Products

    <div x-data="{ counter: 1 }">
        <h1 x-text="counter"></h1>
        <button x-on:click="counter++">+1</button>
    </div>
</x-app-layout>
