<?php
namespace App\Services;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class BookingServices
{
    public function jsonFileSave($data)
    {
        $data->adults      = json_decode($data->adults);
        $data->children    = json_decode($data->children);
        $data->travel_type = json_decode($data->travel_type);
        $filePath          = storage_path('app/file/json/' . $data->unique_id . '.json');
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));

        return true;
    }

    public function pdfFileSave($data): string
    {
        $directoryPath = storage_path('app/file/pdf/');
        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0755, true);
        }

        $path = $directoryPath . $data->unique_id . '.pdf';
        $pdf = PDF::loadView('pdf.certificate', ['data' => $data]);
        $pdf->save($path);

        return true;
    }
    
}
