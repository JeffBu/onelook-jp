<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>
        <div class="mb-2 text-xl text-bold text-sky-600 text-center">
            {{ __('保管情報へのアクセス')}}
        </div>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('メールに記載されたワンタイムパスワードを入力してください。有効期限は24時間です。') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('access-video-record') }}">
            @csrf

            <div class="block">
                <x-jet-input id="access_code" class="block mt-1 w-full text-center" type="text" name="access_code" :value="old('access_code')" placeholder="パスワードを入力してください" required autofocus />
            </div>
            <x-jet-input id="key" name="key" type="hidden" value="{{$record->key}}"/>
            <div class="flex items-center justify-center mt-4">
                <x-jet-button>
                    {{ __('閲覧する') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
