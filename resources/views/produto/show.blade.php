@extends('layouts.app')

@section('template_title')
    {{ $produto->name ?? 'Show Produto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Produto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('produtos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $produto->name }}
                        </div>
                        <div class="form-group">
                            <strong>Value:</strong>
                            {{ $produto->value }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $produto->description }}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
