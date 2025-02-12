<?php
namespace App\Services;

use App\Models\Booking;
use App\Models\Logic;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class BookingServices
{
    public function jsonFileSave($id)
    {
        $data = Booking::findOrFail($id);
        $data->adults      = json_decode($data->adults);
        $data->children    = json_decode($data->children);
        $data->travel_type = json_decode($data->travel_type);
        $filePath          = storage_path('app/file/json/' . $data->unique_id . '.json');
        file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));

        return true;
    }

    public function pdfFileSave($id): string
    {
        $data = Booking::findOrFail($id);
        $directoryPath = storage_path('app/file/pdf/');
        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0755, true);
        }

        $path = $directoryPath . $data->unique_id . '.pdf';
        $icon = base64_encode(file_get_contents(public_path('default/logo.png')));
        $pdf = PDF::loadView('pdf.certificate', [
            'data' => $data, 
            'charge' => Logic::first()->charge,
            'icon' => $icon,
        ]);
        $pdf->save($path);

        return true;
    }
    
}
