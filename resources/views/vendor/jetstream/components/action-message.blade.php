@props(['on'])

<div x-data="{ shown: false, timeout: null }"
    x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 5000);  })"
    x-show.transition.out.opacity.duration.1500ms="shown"
    x-transition:leave.opacity.duration.1500ms
    style="display: none; width:100%"
    {{ $attributes->merge(['class' => 'py-2 text-center text-sm bg-green-600 text-white']) }}>
    {{ $slot->isEmpty() ? 'Saved' : $slot }}
</div>
