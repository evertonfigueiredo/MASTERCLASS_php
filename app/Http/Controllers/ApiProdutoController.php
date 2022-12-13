<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

/**
 * Class ApiProdutoController
 * @package App\Http\Controllers
 */
class ApiProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // if ($request->user()->niveis != 2) {
        //     return response()->json([
        //         'status' => false,
        //         'msg' => "Credenciais invalidas!",
        //         'data' => [],
        //     ],401);
        // }

        $produtos = Produto::all();

        return response()->json([
            'status' => true,
            'msg' => "Consulta realizada com sucesso!",
            'data' => [
                $produtos
            ],
        ],200);
        
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

        if ($request->user()->niveis != 2) {
            return response()->json([
                'status' => false,
                'msg' => "Sua conta não pode realizar essa ação.",
                'data' => [],
            ],401);
        }

        request()->validate(Produto::$rules);

        $produto = Produto::create($request->all());
        return response()->json([
            'status' => true,
            'msg' => "Produto cadastrado com sucesso!",
            'data' => [
                $produto
            ],
        ],200);
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
