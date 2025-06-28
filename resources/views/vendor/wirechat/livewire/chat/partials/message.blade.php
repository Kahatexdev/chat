@use('Namu\WireChat\Facades\WireChat')

@php
    $isSameAsNext = ($message?->sendable_id === $nextMessage?->sendable_id) && ($message?->sendable_type === $nextMessage?->sendable_type);
    $isNotSameAsNext = !$isSameAsNext;
    $isSameAsPrevious = ($message?->sendable_id === $previousMessage?->sendable_id) && ($message?->sendable_type === $previousMessage?->sendable_type);
    $isNotSameAsPrevious = !$isSameAsPrevious;
@endphp

<div class="flex {{ $belongsToAuth ? 'justify-end' : 'justify-start' }} mb-1">
    <div class="relative max-w-xs sm:max-w-md lg:max-w-lg xl:max-w-xl">
        <div
            {{-- Dynamic background color for auth user messages --}}
            @style([
                'background-color: var(--wc-brand-primary)' => $belongsToAuth
            ])
            
            @class([
                // Base styles
                'max-w-fit text-[15px] border border-gray-200/40 dark:border-none rounded-xl p-2.5 flex flex-col text-black',
                
                // Auth user message styles
                'text-white' => $belongsToAuth,
                
                // Non-auth user message styles  
                'bg-[#f6f6f8] dark:bg-[var(--wc-dark-secondary)] dark:text-white' => !$belongsToAuth,
                
                // RIGHT side (auth user) message border radius
                'rounded-br-md rounded-tr-2xl' => ($isSameAsNext && $isNotSameAsPrevious && $belongsToAuth),
                'rounded-r-md' => ($isSameAsPrevious && $isSameAsNext && $belongsToAuth),
                'rounded-br-xl' => ($isNotSameAsPrevious && $isNotSameAsNext && $belongsToAuth),
                'rounded-br-2xl rounded-tr-md' => ($isNotSameAsNext && $isSameAsPrevious && $belongsToAuth),
                
                // LEFT side (other user) message border radius
                'rounded-bl-md rounded-tl-2xl' => ($isSameAsNext && $isNotSameAsPrevious && !$belongsToAuth),
                'rounded-l-md' => ($isSameAsPrevious && $isSameAsNext && !$belongsToAuth),
                'rounded-bl-xl' => ($isNotSameAsPrevious && $isNotSameAsNext && !$belongsToAuth),
                'rounded-bl-2xl rounded-tl-md' => ($isNotSameAsNext && $isSameAsPrevious && !$belongsToAuth),
            ])
        >
            {{-- Group message sender name --}}
            @if (!$belongsToAuth && $isGroup && $isNotSameAsPrevious)
                <div class="px-3 pt-2 pb-1">
                    <span class="text-sm font-medium text-blue-600 dark:text-blue-400">
                        {{ $message?->sendable?->display_name }}
                    </span>
                </div>
            @endif

            {{-- Message content --}}
            <div class="px-3 {{ (!$belongsToAuth && $isGroup && $isNotSameAsPrevious) ? 'pt-0' : 'pt-2' }} pb-1">
                <pre class="whitespace-pre-wrap text-sm leading-relaxed break-words" style="font-family: inherit;">{{ $message?->body }}</pre>
            </div>

            {{-- Message metadata (time and status) --}}
            <div class="flex items-center justify-end gap-1 px-3 pb-2 mt-1">
                {{-- Message time --}}
                <span class="text-xs {{ $belongsToAuth ? 'text-gray-200' : 'text-gray-500 dark:text-gray-400' }}">
                    {{ $message?->created_at->format('H:i') }}
                </span>

                {{-- Message status indicators (only for sent messages) --}}
                {{-- @if ($belongsToAuth)
                    <div class="flex items-center ml-1">
                        @if ($message?->read_at)
                            <svg class="w-4 h-4 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                <path d="M12.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-1-1a1 1 0 011.414-1.414L4 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        @elseif ($message?->delivered_at)
                            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                <path d="M12.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-1-1a1 1 0 011.414-1.414L4 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        @else
                            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        @endif
                    </div>
                @endif --}}
            </div>
        </div>

        
    </div>
</div>