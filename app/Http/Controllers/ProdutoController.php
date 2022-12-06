<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

/**
 * Class ProdutoController
 * @package App\Http\Controllers
 */
class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::paginate();

        return view('produto.index', compact('produtos'))
            ->with('i', (request()->input('page', 1) - 1) * $produtos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produto = new Produto();
        return view('produto.create', compact('produto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Produto::$rules);

        $produto = Produto::create($request->all());

        return redirect()->route('produtos.index')
            ->with('success', 'Produto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);

        return view('produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $this->authorize('update', $produto);
        return view('produto.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Produto $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        request()->validate(Produto::$rules);

        $produto->update($request->all());

        return redirect()->route('produtos.index')
            ->with('success', 'Produto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $produto = Produto::find($id)->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto deleted successfully');
    }
}
