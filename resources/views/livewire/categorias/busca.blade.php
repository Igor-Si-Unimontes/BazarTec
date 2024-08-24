<div>
    <div>
        <div class="row justify-content-center bg-light py-4">
            <div class="col-lg-8 col-md-10 col-12 rounded bg-white py-4 border">
                <form id="search-form" class="form-inline">
                    <div class="row w-100">
                        <div class="row w-100">
                            <div class="col-md-6 col-12 mb-3">
                                <div class="form-group">
                                    <label for="code" class="mr-2 mb-3">Código:</label>
                                    <input wire:model.live="code" type="text" id="code" class="form-control w-100" placeholder="Digite o código da categoria">
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <div class="form-group">
                                    <label for="nome" class="mr-2 mb-3">Nome:</label>
                                    <input wire:model.live="nome" type="text" id="nome" class="form-control w-100" placeholder="Digite o nome da categoria">
                                </div>
                            </div>
                        </div>                        
                    </div>
                </form>
            </div>
            
        </div>
        <div class="container">
            <div class="text-end mt-3">
                <a href="{{ route('categorias.cadastrar') }}" class="btn btn-success">Adicionar nova Categoria</a>
            </div>            
            <table class="table shadow-sm table-bordered table-hover table-sm mt-3">
                <thead>
                    <tr class="text-center">
                        <th style="width: 5%;">ID</th>
                        <th style="width: 20%;">Nome</th>
                        <th style="width: 15%;">Código</th>
                        <th style="width: 15%;">Icone</th>
                        <th style="width: 25%;">Descrição</th>
                        <th style="width: 5%;" colspan="3">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                    <tr>
                        <td class="text-center align-middle">{{ $categoria->id }}</td>
                        <td class="text-center align-middle">{{ $categoria->nome }}</td>
                        <td class="text-center align-middle">{{ $categoria->codigo }}</td>
                        <td class="text-center align-middle">
                            <img src="/img/icon/{{ $categoria->icone }}" alt="" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                        </td>
                        <td class="text-center align-middle">{{ $categoria->descricao }}</td>
                        <td class="py-0 px-0 align-middle">
                            <a class="btn btn-primary w-100 rounded-0" href="{{ route('categorias.show', $categoria->id) }}" data-bs-toggle="modal" data-bs-target="#viewProductModalCategorias{{ $categoria->id }}" title="Visualizar categoria" style="padding: 10px;">
                                <i class="far fa-eye"></i>
                            </a>
                        </td>                        
                        <td class="py-0 px-0 align-middle">
                            <a class="btn btn-warning w-100 rounded-0" href="{{ route('categorias.edit', $categoria->id) }}" data-toggle="tooltip" data-placement="left" title="Editar categoria" style="padding: 10px;">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>                        
                        <td class="py-0 px-0 align-middle">
                            <button type="button" class="btn btn-danger w-100 rounded-0" style="padding: 10px;" data-bs-toggle="modal" data-bs-target="#confirmDeleteModalCategorias{{ $categoria->id }}">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="confirmDeleteModalCategorias{{ $categoria->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalCategorias" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalCategorias">Confirmar Exclusão</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Tem certeza que deseja excluir esta categoria?
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="post" class="m-0">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </div>                    
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="viewProductModalCategorias{{ $categoria->id }}" tabindex="-1" aria-labelledby="viewProductModalLabel{{ $categoria->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewProductModalLabel{{ $categoria->id }}">Detalhes do Produto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group mt-3">
                                        <label for="nome{{ $categoria->id }}">Nome da Categoria</label>
                                        <p class="form-control mt-2" id="nome{{ $categoria->id }}">{{ $categoria->nome }}</p>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="nome{{ $categoria->id }}">Código da Categoria</label>
                                        <p class="form-control mt-2" id="codigo{{ $categoria->id }}">{{ $categoria->codigo }}</p>
                                    </div>
                                    <div class="mt-3">
                                        <label for="icone{{ $categoria->id }}" class="form-label">Icone da Categoria</label></br>
                                        <img src="/img/icon/{{ $categoria->icone }}" alt="" class="mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    
                                    <div class="form-group mt-3">
                                        <label for="descricao{{ $categoria->id }}">Descrição da Categoria</label>
                                        <p class="form-control mt-2" id="descricao{{ $categoria->id }}">{{ $categoria->descricao }}</p>
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
</div>
