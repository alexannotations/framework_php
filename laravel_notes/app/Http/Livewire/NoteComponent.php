<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Note;

class NoteComponent extends Component
{
    public $note = "";
    public $feedback = "";

    public function store()
    {
        Note::create([
            "content" => $this->note,
        ]);
        $this->feedback = "Note created";
    }

    public function update($id)
    {
        $note_to_update = Note::find($id);
        $note_to_update->content = $this->note;
        $note_to_update->save();
        $this->feedback = "Note updated";
    }

    public function destroy($id)
    {
        Note::destroy($id);
        $this->feedback = "Note deleted";
    }


    public function render()
    {
        $notes = Note::all();
        return view('livewire.note', compact('notes'));
    }
}
