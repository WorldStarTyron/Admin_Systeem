@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-1 bg-white'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'align-left';
        break;
    case 'top':
        $alignmentClasses = 'align-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'align-right';
        break;
}

switch ($width) {
    case '48':
        $widthStyle = 'width: 12rem;';
        break;
    default:
        $widthStyle = '';
        break;
}
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="dropdown-menu {{ $alignmentClasses }}"
            style="display: none; {{ $widthStyle }}"
            @click="open = false">
        <div class="dropdown-content" style="padding: 0.25rem 0; background-color: #ffffff;">
            {{ $content }}
        </div>
    </div>
</div>
