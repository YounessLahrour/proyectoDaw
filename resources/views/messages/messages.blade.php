<div class="p-2 mb-0 text-white bg-dark ml-4">
    <img src="{{asset($usuario->avatar)}}" width="50px" height="50px" class="rounded-circle">
    {{$usuario->name}}
</div>
<div class="message-wrapper ml-4">

    <ul class="messages mb-2">
        @foreach($messages as $message)
        <li class="message clearfix ml-4">
            <div class="{{ ($message->from == Auth::id()) ? 'sent' : 'received' }} mt-0 mb-0">
                <p>{{ $message->message }}</p>
                <p class="date" >{{ date('d M y, h:i a', strtotime($message->created_at)) }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</div>

<div class="input-text ml-4 ">
    <input type="text" name="message" placeholder="Escribe un mensaje" class="submit">
</div>