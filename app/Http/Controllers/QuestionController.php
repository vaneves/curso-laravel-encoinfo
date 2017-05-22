<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::with('user')->withCount('responses')->orderBy('id', 'desc')->get();

        return view('questions.index')->withQuestions($questions);
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:6|max:100',
            'content' => 'required|min:6',
        ]);

        $question = Question::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => \Auth::id(),
        ]);

        return redirect('question')->withSuccess('Pergunta enviada com sucesso');
    }

    public function show($id)
    {
        $question = Question::with('user')->with('responses.user')->find($id);
        if(!$question) {
            throw new \App\Exceptions\PageNotFoundException('Pergunta não encontrada');
        }
        return view('questions.show')->withQuestion($question);
    }

    public function response($id, Request $request)
    {
        $question = Question::find($id);
        if(!$question) {
            throw new \App\Exceptions\PageNotFoundException('Pergunta não encontrada');
        }

        $this->validate($request, [
            'content' => 'required',
        ]);

        $question->responses()->create([
            'content' => $request->content,
            'user_id' => \Auth::id(),
        ]);

        return back()->withSuccess('Resposta enviada com sucesso');
    }

    public function edit(Question $question)
    {
        //
    }

    public function update(Request $request, Question $question)
    {
        //
    }

    public function destroy(Question $question)
    {
        //
    }
}
