<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{Book, Page, Ficha, Introduction};
use DB;
use PDF;

class BookController extends Controller
{
    
    public function index()
    {
        $data = [
            'title'     => 'Livros',
            'book'      => Book::paginate(10),
        ];

        return view('teacher.book.index', compact('data'));
    }

    function list(Request $request, $status) {
        if (Auth::user()) {

            $books = new Book;

            if ($request['pesquisa']) {
                $books = $books->where('name', 'like', '%' . $request['pesquisa'] . '%');
            }

            $books = $books->paginate(10);

            return view('teacher.book.table', compact('books', 'status'));
        } else {
            redirect()->back()->with('error', 'Você não tem permissão para acessar esta página');
        }
    }


    public function create()
    {
        $data = [
            'title'     => 'Cadastrar Livro',
            'model'     => '',
            'url'       => '/book',
            'pages'     => [new Page],
            'button'    => 'Salvar',
        ];

        return view('teacher.book.form', compact('data'));
    }

    public function store(Request $request)
    {
        // dd($request);
        // dd($request['page'][0]['text']);
        // foreach ($request->page as $page) {
        //     dd($page['text']);
        // }
        DB::beginTransaction();

        try 
        {
            if ($request['book']['cover'] && $request['book']['cover']->isValid() && ($request['book']['cover']->extension() == 'jpg' || $request['book']['cover']->extension() == 'png' || $request['book']['cover']->extension() == 'jpeg')) {
                $name = md5($request['book']['cover']);
                $extensao = $request['book']['cover']->extension();
                $nameFile = "{$name}.{$extensao}";
                $imageCover = $nameFile;
                $upload = $request['book']['cover']->storeAs('images', $nameFile);
                if (!$upload) {
                    return redirect()->back()->with('error', 'Falha no upload do arquivo');
                }
            } else {
                return redirect()->back()->with('error', 'Falha, formato de arquivo inválido');
            }

            $book = Book::Create([
                'name'              => $request['book']['name'],
                'sinopse'           => $request['book']['sinopse'],
                'cover'             => $imageCover,
                'school_class_id'   => '1',
            ]);
            
            $ficha = Ficha::Create([
                'writer_name'           => $request['ficha']['writer_name'],
                'writer_lastname'       => $request['ficha']['writer_lastname'],
                'illustrator_name'      => $request['ficha']['illustrator_name'],
                'illustrator_lastname'  => $request['ficha']['illustrator_lastname'],
                'reviewer_name'         => $request['ficha']['reviewer_name'],
                'reviewer_lastname'     => $request['ficha']['reviewer_lastname'],
                'book_id'               => $book->id,
            ]);

            foreach ($request->page as $page) {

                if ($page['image'] && $page['image']->isValid() && ($page['image']->extension() == 'jpg' || $page['image']->extension() == 'png' || $page['image']->extension() == 'jpeg')) {
                    $name = md5($page['image']);
                    $extensao = $page['image']->extension();
                    $nameFile = "{$name}.{$extensao}";
                    $image = $nameFile;
                    $upload = $page['image']->storeAs('images', $nameFile);
                    if (!$upload) {
                        return redirect()->back()->with('error', 'Falha no upload do arquivo');
                    }
                } else {
                    return redirect()->back()->with('error', 'Falha, formato de arquivo inválido');
                }

                $page = Page::Create([
                    'image'   => $image,
                    'text'    => $page['text'],
                    'book_id' => $book->id,
                ]);
            }
            
            if ($request['introduction']['writer_image'] && $request['introduction']['writer_image']->isValid() && ($request['introduction']['writer_image']->extension() == 'jpg' || $request['introduction']['writer_image']->extension() == 'png' || $request['introduction']['writer_image']->extension() == 'jpeg')) {
                $name = md5($request['introduction']['writer_image']);
                $extensao = $request['introduction']['writer_image']->extension();
                $nameFile = "{$name}.{$extensao}";
                $imageWriter = $nameFile;
                $upload = $request['introduction']['writer_image']->storeAs('images', $nameFile);
                if (!$upload) {
                    return redirect()->back()->with('error', 'Falha no upload do arquivo');
                }
            } else {
                return redirect()->back()->with('error', 'Falha, formato de arquivo inválido');
            }

            if ($request['introduction']['illustrator_image'] && $request['introduction']['illustrator_image']->isValid() && ($request['introduction']['illustrator_image']->extension() == 'jpg' || $request['introduction']['illustrator_image']->extension() == 'png' || $request['introduction']['illustrator_image']->extension() == 'jpeg')) {
                $name = md5($request['introduction']['illustrator_image']);
                $extensao = $request['introduction']['illustrator_image']->extension();
                $nameFile = "{$name}.{$extensao}";
                $imageIllustrator = $nameFile;
                $upload = $request['introduction']['illustrator_image']->storeAs('images', $nameFile);
                if (!$upload) {
                    return redirect()->back()->with('error', 'Falha no upload do arquivo');
                }
            } else {
                return redirect()->back()->with('error', 'Falha, formato de arquivo inválido');
            }
            $introduction = Introduction::Create([
                'writer_name'       => $request['introduction']['writer_name'],
                'writer_about'      => $request['introduction']['writer_about'],
                'illustrator_name'  => $request['introduction']['illustrator_name'],
                'illustrator_about' => $request['introduction']['illustrator_about'],
                'writer_image'      => $imageWriter,
                'illustrator_image' => $imageIllustrator,
                'book_id'           => $book->id,
            ]);

            DB::commit();
            
            return redirect('book')->with('success', 'Livro cadastrado com sucesso!');

        } catch(\Exception $e) {
            DB::rollback();
			return ($e);
        }
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        $ficha = Ficha::where('book_id', $id)->first();
        $introduction = Introduction::where('book_id', $id)->first();
        // dd($introduction->writer_name);
        $data = [
            'book'          => $book,
            'ficha'         => $ficha,
            'introduction'  => $introduction,
        ];

        $pdf = \PDF::loadView('teacher.book.show', compact('data'));
        $pdf->setOption('page-width', '428');
        $pdf->setOption('page-height', '228');
        $pdf->setOption('margin-top', '0');
        $pdf->setOption('margin-bottom', '0');
        $pdf->setOption('margin-right', '0');
        $pdf->setOption('margin-left', '0');
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        return $pdf->stream();
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
