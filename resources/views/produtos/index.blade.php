@extends('admin');
@section('content')
    <div>
        <div class="row justify-content-center bg-light py-4">
            <div class="col-lg-8 col-md-10 col-12 rounded bg-white py-4 border">
                <form wire:submit id="search-form" class="form-inline">
                    <div class="row w-100">
                        <div class="col-md-6 col-12 mb-3">
                            <div class="form-group">
                                <label for="category" class="mr-2 mb-3">Categoria:</label>
                                <select wire:model.live="category" id="category" class="form-control w-100">
                                    <option value="">Selecione uma categoria</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <div class="form-group">
                                <label for="name" class="mr-2 mb-3">Produto:</label>
                                <input wire:model.live="name" type="text" id="name" class="form-control w-100"
                                    placeholder="Digite o nome do catálogo">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container">
            <div class="text-end mt-3">
                <a href="{{ route('produtos.cadastrar') }}" class="btn btn-success">Adicionar novo Produto</a>
            </div>            
            <table class="table shadow-sm table-bordered table-hover table-sm mt-3">
                <thead>
                    <tr class="text-center">
                        <th style="width: 5%;">ID</th>
                        <th style="width: 20%;">Nome</th>
                        <th style="width: 15%;">Imagem</th>
                        <th style="width: 15%;">Valor</th>
                        <th style="width: 15%;">Categoria</th>
                        <th style="width: 10%;">Quantidade</th>
                        <th style="width: 5%;" colspan="3">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                    <tr>
                        <td class="text-center align-middle">{{ $produto->id }}</td>
                        <td class="text-center align-middle">{{ $produto->nome }}</td>
                        <td class="text-center align-middle">
                            <img src="/img/events/{{ $produto->imagem }}" alt="" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td class="text-center align-middle">{{ $produto->valor }}</td>
                        <td class="text-center align-middle">{{ $produto->categoria->nome }}</td>
                        <td class="text-center align-middle">{{ $produto->quantidade }}</td>
                        <td class="py-0 px-0 align-middle">
                            <a class="btn btn-primary w-100 rounded-0" href="#" data-bs-toggle="modal" data-bs-target="#viewProductModal" title="Visualizar produto" style="padding: 10px;">
                                <i class="far fa-eye"></i>
                            </a>
                        </td>
                        <td class="py-0 px-0 align-middle">
                            <a class="btn btn-warning w-100 rounded-0" href="{{ route('produtos.edit', $produto->id) }}" data-toggle="tooltip" data-placement="left" title="Editar produto" style="padding: 10px;">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>                        
                        <td class="py-0 px-0 align-middle">
                            <button type="button" class="btn btn-danger w-100 rounded-0" style="padding: 10px;" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered"">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Tem certeza que deseja excluir este produto?
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('produtos.destroy', $produto->id) }}" method="post" class="m-0">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger" id="confirmDeleteButton">Excluir</button>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>  
        <div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="viewProductModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewProductModalLabel">Detalhes do Produto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label for="nome">Nome do Produto</label>
                            <p class="form-control mt-2" id="nome">{{ $produto->nome }}</p>
                        </div>
        
                        <div class="mt-3">
                            <label for="imagem" class="form-label">Imagem do Produto</label></br>
                            <img src="/img/events/{{ $produto->imagem }}" alt="" class="mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="valor">Valor do Produto</label>
                            <p class="form-control mt-2" id="valor">{{ $produto->valor }}</p>
                        </div>
        
                        <div class="form-group mt-3">
                            <label for="categoria_id">Categoria do Produto</label>
                            <p class="form-control mt-2" id="categoria_id">{{ $produto->categoria->nome }}</p>
                        </div>            
                        
                        <div class="form-group mt-3">
                            <label for="quantidade">Quantidades em estoque</label>
                            <p class="form-control mt-2" id="quantidade">{{ $produto->quantidade }}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
