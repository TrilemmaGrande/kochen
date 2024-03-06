@if(session()->has('message'))
    <div class="notify-message-panel">
        <p class="notify-message">{{session('message')}}</p>
    </div>
@endif