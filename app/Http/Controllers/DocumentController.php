<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function destroy($id)
    {

      
        $document = Document::findOrFail($id);
    
        // Supprimer le fichier du stockage
        if ($document->file_path) {
            Storage::delete('public/' . $document->file_path);
        }
    
        // Supprimer l'entrée en base de données
        $document->delete();
    
        return redirect()->back()->with('success', 'Document deleted successfully.');
    }

}
