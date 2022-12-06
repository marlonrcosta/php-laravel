<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index() {

        $search = request('search');

        if($search) {

            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $events = Event::all();
        }

        return view('welcome', ['events' => $events, 'search' => $search]);
    }

    public function create() {
        return view('events.create');
    }

    public function store(Request $request) {
        $event = new Event;

        $event->cpf = $request->cpf;
        $event->nome = $request->nome;
        $event->nascimento = $request->nascimento;
        $event->sexo = $request->sexo;
        $event->endereco = $request->endereco;
        $event->estado = $request->estado;
        $event->cidade = $request->cidade;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id) {
        $event = Event::findOrFail($id);

        return view('events.show', ['event' => $event]);
    }

    public function destroy($id) {
        Event::findOrFail($id)->delete();

        return redirect('/')->with('msg', 'Evento excluído com sucesso!');
    }

    public function edit($id) {
        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);
    }

    public function update(request $request) {
        Event::findOrFail($request->id)->update($request->all());

        return redirect('/')->with('msg', 'Evento atualizado com sucesso!');
    }
}
