@extends('layouts.app')

@section('template_title')
    Produto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Produto') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('produtos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nome</th>
                                        <th>Value</th>
                                        <th>Description</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produtos as $produto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
                                            <td>{{ $produto->name }}</td>
                                            <td>{{ $produto->value }}</td>
                                            <td>{{ $produto->description }}</td>

                                            <td>
                                                <form action="{{ route('produtos.destroy',$produto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('produtos.show',$produto->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    {{-- @if(Auth::user()->niveis == 2) --}}
                                                        <a class="btn btn-sm btn-success" href="{{ route('produtos.edit',$produto->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    {{-- @endif --}}
                                                    @if(Auth::user()->niveis == 2)
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $produtos->links() !!}
            </div>
        </div>
    </div>
@endsection
