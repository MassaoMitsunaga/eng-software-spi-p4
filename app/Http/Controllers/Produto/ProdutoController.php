<?php

namespace App\Http\Controllers\Produto;
use App\Http\Requests\Produto\ProdutoFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Produto\Produto;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    private $produto;
    public function __construct(Produto $produto) {
        $this -> produto = $produto;
    }

    public function index() {
        $produtos = $this->produto->paginate(5);
        $user = auth()->user();

        $data = [
            'produtos' => $produtos,
            'user' => $user,
        ];

        return view('produtos.index', $data);
    }


    public function create() {
        $categorias = ['Teclados', 'Keycaps', 'Acessórios'];
        $produtos = $this->produto;
        $data = [
            'categorias' => $categorias,
            'produtos' => $produtos,
        ];

        return view('produtos.create-edit', $data);
    }

    public function store(ProdutoFormRequest $request) {
        $form = $request->except('_token');

        $form['estoque'] = (!isset($form['estoque'])) ? false : true;

        $validate = Validator::make($form, (new \App\Http\Requests\Produto\ProdutoFormRequest)->rules());

        if($validate->fails()) {
            return redirect()->route('create')->withErrors($validate)->withInput();
        }

        $inserir = $this->produto->create($form);

        if($inserir)
            return redirect('home');
        else
            return redirect()->route('create');

    }

    public function show($id) {
        $produtos = $this->produto->find($id);

        $data = [
            'produto' => $produtos,
        ];

        return view('produtos.show', $data);
    }


    public function edit($id) {
        $produtos = $this->produto->find($id);
        $categorias = ['Teclados', 'Keycaps', 'Acessórios'];

        $data = [
            'categorias' => $categorias,
            'produtos' => $produtos,
        ];

        return view('produtos.create-edit', $data);
    }

    public function update(ProdutoFormRequest $request, $id) {
        $form = $request->all();

        $produtos = $this->produto->find($id);

        $form['estoque'] = (!isset($form['estoque'])) ? false : true;

        $validate = Validator::make($form, (new \App\Http\Requests\Produto\ProdutoFormRequest)->rules());

        if($validate->fails()) {
            return redirect()->route('editar', $id)->withErrors($validate)->withInput();
        }

        $update = $produtos->update($form);

        if($update)
            return redirect()->route('home');
        else
            return redirect()->route('produtos.edit', $id)->with(['errors' => "Falha ao editar."]);
    }

    public function destroy($id) {
        $produtos = $this->produto->find($id);

        $delete = $produtos->delete();

        if($delete)
            return redirect()->route('home');
        else
            return redirect()->route('show')->with(['errors' => 'Falha ao deletar.']);

    }
}
