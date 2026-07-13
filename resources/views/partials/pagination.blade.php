@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView({behavior: 'smooth', block: 'start'})
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Navigasi Halaman" class="flex flex-col sm:flex-row items-center justify-between gap-5">
            {{-- Result count --}}
            <div class="text-sm text-gray-500 order-2 sm:order-1">
                @lang('Menampilkan')
                <span class="font-semibold text-gray-900">{{ $paginator->firstItem() ?? $paginator->count() }}</span>–<span class="font-semibold text-gray-900">{{ $paginator->lastItem() ?? $paginator->count() }}</span>
                @lang('dari')
                <span class="font-semibold text-gray-900">{{ $paginator->total() }}</span>
                @lang('artikel')
            </div>

            {{-- Page buttons --}}
            <div class="flex items-center gap-1.5 order-1 sm:order-2">
                {{-- Previous Page --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="@lang('Halaman sebelumnya')">
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-gray-300 bg-gray-50 border border-gray-200 cursor-not-allowed" aria-hidden="true">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </span>
                @else
                    <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-gray-600 bg-white border border-gray-200 hover:border-primary hover:text-primary hover:shadow-md hover:shadow-primary/10 transition-all duration-200 disabled:opacity-50" aria-label="@lang('Halaman sebelumnya')">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span aria-disabled="true" class="inline-flex items-center justify-center w-10 h-10 text-gray-400 text-sm">
                            {{ $element }}
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-sm font-bold text-white bg-primary border border-primary shadow-md shadow-primary/30">
                                            {{ $page }}
                                        </span>
                                    </span>
                                @else
                                    <button type="button" wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-sm font-semibold text-gray-600 bg-white border border-gray-200 hover:border-primary hover:text-primary hover:shadow-md hover:shadow-primary/10 transition-all duration-200" aria-label="@lang('Ke halaman :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </button>
                                @endif
                            </span>
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page --}}
                @if ($paginator->hasMorePages())
                    <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-gray-600 bg-white border border-gray-200 hover:border-primary hover:text-primary hover:shadow-md hover:shadow-primary/10 transition-all duration-200 disabled:opacity-50" aria-label="@lang('Halaman berikutnya')">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @else
                    <span aria-disabled="true" aria-label="@lang('Halaman berikutnya')">
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-xl text-gray-300 bg-gray-50 border border-gray-200 cursor-not-allowed" aria-hidden="true">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </span>
                @endif
            </div>
        </nav>
    @endif
</div>
