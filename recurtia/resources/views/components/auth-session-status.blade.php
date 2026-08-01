@if (session('status'))

    <div style="
        padding:10px;
        background:#d1fae5;
        color:#065f46;
        border-radius:8px;
        margin-bottom:15px;
    ">

        {{ session('status') }}

    </div>

@endif