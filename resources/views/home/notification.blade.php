@if (session('status'))
<div class="uk-alert-success" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p> {{ session('status') }}</p>
</div>
@endif