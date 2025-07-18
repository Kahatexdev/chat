
@use('Namu\WireChat\Facades\WireChat')

<ul wire:loading.delay.long.remove wire:target="search" class="p-2 grid w-full spacey-y-2">
    @foreach ($conversations as $key=> $conversation)
    @php
    //$receiver =$conversation->getReceiver();
    $group = $conversation->isGroup() ? $conversation->group : null;
    $receiver = $conversation->isGroup() ? null : ($conversation->isPrivate() ? $conversation->peer_participant?->participantable : $this->auth);
    //$receiver = $conversation->isGroup() ? null : ($conversation->isPrivate() ? $conversation->peerParticipant()?->participantable : $this->auth);
    $lastMessage = $conversation->lastMessage;
    //mark isReadByAuth true if user has chat opened
    $isReadByAuth = $conversation?->readBy($conversation->auth_participant??$this->auth) || $selectedConversationId == $conversation->id;
    $belongsToAuth = $lastMessage?->belongsToAuth();


    @endphp

    <li x-data="{
        conversationID: @js($conversation->id),
        showUnreadStatus: @js(!$isReadByAuth),
        handleChatOpened(event) {
            // Hide unread dot
            if (event.detail.conversation== this.conversationID) {
                this.showUnreadStatus= false;
            }
            //update this so that the the selected conversation highlighter can be updated
            $wire.selectedConversationId= event.detail.conversation;
        },
        handleChatClosed(event) {
                // Clear the globally selected conversation.
                $wire.selectedConversationId = null;
                selectedConversationId = null;
        },
        handleOpenChat(event) {
            // Clear the globally selected conversation.
            if (this.showUnreadStatus==  event.detail.conversation== this.conversationID) {
                this.showUnreadStatus= false;
            }
    }
    }"  

    id="conversation-{{ $conversation->id }}" 
        wire:key="conversation-em-{{ $conversation->id }}-{{ $conversation->updated_at->timestamp }}"
        x-on:chat-opened.window="handleChatOpened($event)"
        x-on:chat-closed.window="handleChatClosed($event)">
        <a @if ($widget) tabindex="0" 
        role="button" 
        dusk="openChatWidgetButton"
        @click="$dispatch('open-chat',{conversation:@js($conversation->id)})"
        @keydown.enter="$dispatch('open-chat',{conversation:@js($conversation->id)})"
        @else
        wire:navigate href="{{ route(WireChat::viewRouteName(), $conversation->id) }}" @endif
            @style(['border-color:var(--wc-brand-primary)' => $selectedConversationId == $conversation?->id])
            class="py-3 flex gap-4 dark:hover:bg-[var(--wc-dark-secondary)]  hover:bg-[var(--wc-light-secondary)]  rounded-xs transition-colors duration-150  relative w-full cursor-pointer px-2"
            :class="$wire.selectedConversationId == conversationID &&
                'dark:bg-[var(--wc-dark-secondary)] bg-[var(--wc-light-secondary)] border-r-4  border-opacity-20 border-[var(--wc-brand-primary)]'">

            <div class="shrink-0">
                <x-wirechat::avatar disappearing="{{ $conversation->hasDisappearingTurnedOn() }}"
                    group="{{ $conversation->isGroup() }}"
                    :src="$group ? $group?->cover_url : $receiver?->avatar_url ?? null" class="w-12 h-12" />
            </div>

            <aside class="grid  grid-cols-12 w-full">
                <div
                    class="col-span-10 border-b pb-2 border-[var(--wc-light-border)] dark:border-[var(--wc-dark-border)] relative overflow-hidden truncate leading-5 w-full flex-nowrap p-1">

                    {{-- name --}}
                    <div class="flex gap-1 mb-1 w-full items-center">
                        <h6 class="truncate font-medium text-gray-900 dark:text-white">
                            {{ $group ? $group?->name : $receiver?->display_name }}
                        </h6>

                        @if ($conversation->isSelfConversation())
                            <span class="font-medium dark:text-white">({{__('wirechat::chats.labels.you')  }})</span>
                        @endif

                    </div>

                    {{-- Message body --}}
                    @if ($lastMessage != null)
                        @include('wirechat::livewire.chats.partials.message-body')
                    @endif

                </div>

                {{-- Read status --}}
                {{-- Only show if AUTH is NOT onwer of message --}}
                @if ($lastMessage != null && !$lastMessage?->ownedBy($this->auth) && !$isReadByAuth)
                    <div x-show="showUnreadStatus" dusk="unreadMessagesDot" class=" col-span-2 flex flex-col text-center my-auto">
                        {{-- Dots icon --}}
                        <span dusk="unreadDotItem" class="sr-only">unread dot</span>
                        <svg @style(['color:var(--wc-brand-primary)']) xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-dot w-10 h-10 text-blue-500" viewBox="0 0 16 16">
                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                        </svg>
                    </div>
                @endif

                @if($lastMessage && $belongsToAuth)
                    <div class="flex items-center ml-auto mr-2">
                        @if($lastMessage->read_at)
                            {{-- Dua bluetick biru --}}
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 18 18">
                                <path d="M3.5 9l2.5 2.5 6-6" transform="translate(-1,0)"/>
                                <path d="M3.5 9l2.5 2.5 6-6" transform="translate(2.5,0)"/>
                            </svg>
                        @elseif($lastMessage->delivered_at)
                            {{-- Dua check abu-abu --}}
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 18 18">
                                <path d="M3.5 9l2.5 2.5 6-6" transform="translate(-1,0)"/>
                                <path d="M3.5 9l2.5 2.5 6-6" transform="translate(2.5,0)"/>
                            </svg>
                        @else
                            {{-- Satu check abu-abu --}}
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 18 18">
                                <path d="M3.5 9l2.5 2.5 6-6" transform="translate(2.5,0)"/>
                            </svg>
                        @endif
                    </div>
                @endif


            </aside>
        </a>

    </li>
    @endforeach

</ul>

