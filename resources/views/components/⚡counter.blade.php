<?php

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

new class extends Component {
    public int $counter;

    public function mount(): void
    {
        $this->counter = Cache::get('counter', 0);
    }

    public function increaseCount(): void
    {
        $this->counter = Cache::increment('counter');
    }

    public function decreaseCount(): void
    {
        $current = Cache::get('counter', 0);

        if ($current > 0) {
            $this->counter = Cache::decrement('counter');
        } else {
            $this->counter = 0;
            Cache::put('counter', 0);
        }
    }

    public function resetCounter()
    {
        Cache::set('counter', 0);
        $this->counter = 0;
    }
};
?>

<div class="h-screen bg-[#F9E4BC] mx-auto select-none">
    <div class="flex justify-center flex-col h-[75vh]">
        <div class="flex flex-col gap-20">
            <div class="text-9xl font-bold text-center text-green-950">
                {{ $this->counter }}
            </div>
            <div class="flex flex-col justify-center gap-4">
                <div class="flex justify-center gap-2">
                    <button wire:click="increaseCount"
                            class="text-light rounded p-2 bg-lime-800 hover:bg-lime-900 hover:cursor-pointer active:ring-2 active:ring-offset-2 active:ring-lime-900 text-zinc-100 active:ring-offset-[#F9E4BC]">
                        Increase count
                    </button>
                    <button wire:click="decreaseCount"
                            class="text-light rounded p-2 bg-amber-400 hover:bg-amber-500 hover:cursor-pointer active:ring-2 active:ring-offset-2 active:ring-amber-500 text-zinc-800 active:ring-offset-[#F9E4BC]">
                        Decrease count
                    </button>
                </div>
                <div class="flex justify-center">
                    <button wire:click="resetCounter"
                            class="text-light rounded p-2 bg-red-600 hover:bg-red-700 hover:cursor-pointer active:ring-2 active:ring-offset-2 active:ring-red-700 text-zinc-100 active:ring-offset-[#F9E4BC]">
                        Reset counter
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
