<?php

namespace App\Http\Controllers\Web\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $booking_count = Booking::where('payment_status', 'paid')->count();
        $booking_price = Booking::where('payment_status', 'paid')->sum('total_price');

        $all_months = [
            'january', 'february', 'march', 'april', 'may', 'june', 
            'july', 'august', 'september', 'october', 'november', 'december'
        ];

        $booking_chart = Booking::select(DB::raw("MONTHNAME(created_at) as month"), DB::raw('SUM(total_price) as total'))
            ->where('payment_status', 'paid')
            ->groupBy('month')
            ->get()
            ->mapWithKeys(function ($item) {
                return [strtolower($item->month) => number_format($item->total, 2)];
            });

        $booking_chart = collect($all_months)->mapWithKeys(function ($month) use ($booking_chart) {
            return [$month => $booking_chart->get($month, '0.00')];
        });

        if (file_exists(public_path('booking_chart.json')))
        {
            $booking_chart_json = $booking_chart->toJson();
            file_put_contents(public_path('booking_chart.json'), $booking_chart_json);
        }
        

        return view('backend.layouts.dashboard', compact('booking_count', 'booking_price'));
    }
}
