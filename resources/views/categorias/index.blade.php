@extends('admin')
@section('scripts')
<script src="{{ asset('js/scanner.js') }}"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    })
</script>
@endsection
@section('content')
@include('mensagens.mensagem')
<livewire:categorias.busca />
@endsection
