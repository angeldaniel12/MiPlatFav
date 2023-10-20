@extends('layouts.panel2')

@section('content')
<div class="container">
    <div class="row justify-container-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Notificaciones</div>
                    <div class="card-body">
                    @if (auth()->user())
                    @forelse (auth()->user()->unreadNotifications  as $notification)
                    <div class="alert alert-warning">
                      Nombre : {{$notification->data['title']}}
                        <p>{{$notification->created_at->diffForHumans()}}</p>
                        <button type="submit" class="mark-as-read btn btn-sm btn-dark" data-id="{{$notification->id}}">Marcar como leido</button>
                        </div>
                        @if ($loop->last)
                            <a href="{{route('markAsRead')}}" id="mark-all">Marcar como leidas</a>
                        @endif
                    @empty
                    No hay notificaciones
                    @endforelse
                    @endif
                    
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function sendMarkRequest(id = null){
        return $.ajax("{{route('markNotification')}}",{
            method:'POST',
            data: {token: "{{ csrf_token() }}",
            id
            }
        });
    }
    $(function(){
        $('.mark-as-read').click(function(){
            let request= sendMarkRequest($(this).data('id'));
            request.done(()=>{
                $(this).parents('div.alert').remove();
            });
        });
        $('#mark-all').click(function(){
            let request=sendMarkRequest();
            request.done(()=>{
                $('div.alert').remove();
            });
        });
    });
</script>
@endsection