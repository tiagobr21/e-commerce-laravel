
@extends('layout')
@section('title','home')
@section('content')

<div class="container ps-5">
  <div class="row">


    <h2>{{ $categoria->nome }}</h2>

    @foreach ($produtos as $produto)
       

      <div class="col-2 m-4">
         <div class="card">
            <img id="img-produto" src="{{asset('/storage/img/'.$produto->foto)}}" class="card-img-top">
         </div>
         <div class="card-body">
            <h6 class="card-title m-2">{{  $produto->nome }}</h6>
            <h3 class="preco">R$ {{ $produto->valor}}</h3>
            <a href="{{ route('adicionarCarrinho',['idproduto' => $produto->id]) }}" class="btn btn-sm btn-secondary">Adicionar no Carrinho</a>
         </div>
         <div class="card-body">
           <a href="produto/deletar/{{ $produto->id }}"><i id="deletar"  class="fa fa-trash"></i></a> 
         </div>
      </div>

   @endforeach
     @if (Auth::user()?->role == 'admin')
      <div class="col-2 m-4">
         <div class="card">
           <a href="{{ route('cadastrar_produto') }}"> <img style="cursor: pointer" src="{{ asset('img/plus.png') }}" class="card-img-top"></a> 
         </div>
      <div class="card-body">
         <h6 class="card-title m-2 text-center"> Cadastra Produto </h6>
      </div>
      </div>
    @endif
      <div class="d-flex">
        {!! $produtos->links() !!}
      </div>

  </div>
  

</div>

<style>

.container{
    margin-top: 100px;
    max-width: 100%;
    position: absolute;
  }

  .card{
    width: 200px;
    cursor: pointer;
  }
   
  #img-produto:hover{
    width: 250px;
    cursor: pointer;
  }

  .preco{
    position: relative;
    left: 12%;
  }


  #deletar{
    cursor: pointer;
  }
  
  .d-flex{
    float: right;
  }




</style>


@endsection