@props(['type' => 'success'])

<div x-data="{
    show: false,
    message: '',
    type: 'success',
    timeout: null,
    notify(event) {
        this.show = true;
        this.message = event.detail.message;
        this.type = event.detail.type || 'success';

        if (this.timeout) clearTimeout(this.timeout);

        this.timeout = setTimeout(() => {
            this.show = false;
        }, 3000);
    }
}" @notify.window="notify($event)" x-show="show"
    x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-2"
    class="fixed bottom-4 left-4 z-50 max-w-sm w-full" style="display: none;">
    <div :class="{
        'bg-green-50 text-green-800 border-green-200': type === 'success',
        'bg-red-50 text-red-800 border-red-200': type === 'error',
        'bg-gold-50 text-gold-800 border-gold-200': type === 'warning',
        'bg-blue-50 text-blue-800 border-blue-200': type === 'info'
    }"
        class="flex items-center p-4 mb-4 border rounded-lg shadow-lg">

        <div class="ms-3 text-sm font-medium" x-text="message"></div>

        <button type="button" @click="show = false"
            :class="{
                'text-green-500 focus:ring-green-400 hover:bg-green-200': type === 'success',
                'text-red-500 focus:ring-red-400 hover:bg-red-200': type === 'error',
                'text-gold-500 focus:ring-gold-400 hover:bg-gold-200': type === 'warning',
                'text-blue-500 focus:ring-blue-400 hover:bg-blue-200': type === 'info'
            }"
            class="ms-auto -mx-1.5 -my-1.5 rounded-lg focus:ring-2 p-1.5 inline-flex items-center justify-center h-8 w-8">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
</div>
