<?php

namespace App\Imports;

use App\Models\Music;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Auth;

class MusicsImport implements ToModel, WithHeadingRow
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        $user = Auth::user();
        // dd($user->id);
        if ($row['song_name'] != null && $row['song_name'] != '') {
            return new Music([
                'song_name'     => $row['song_name'],
                'author'        => $row['author'],
                'first_verse'   => $row['first_verse'],
                'link_pdf'      => explode(',', $row['link_pdf']),  // Assuming links are comma-separated
                'link_content'  => explode(',', $row['link_content']),  // Assuming links are comma-separated
                'category'      => $row['category'],
                'book'          => $row['book'],
                'note'          => $row['note'],
                'public'        => $row['public'] == 'true', // Assuming 'true' or 'false' in Excel
                'created_by'    => $user->id
            ]);
        }
    }
}
