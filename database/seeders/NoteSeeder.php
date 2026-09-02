<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Note;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $json = File::get(path:'database/json/notes.json');
        $notes = collect(json_decode($json));

        $notes->each(function($note){
            Note::insert([
                'title'=>$note->title,
                'category_id'=>$note->category_id,
                'user_id'=>$note->user_id,
                'content'=>$note->description,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        });
    }
}
