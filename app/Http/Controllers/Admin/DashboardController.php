<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Testimonial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics for dashboard
        $totalRooms = Room::count();
        $availableRooms = Room::where('status', 'available')->count();
        $totalReservations = Reservation::count();
        $pendingReservations = Reservation::where('status', 'pending')->count();
        $totalUsers = User::where('is_admin', false)->count();
        $totalRevenue = Reservation::where('payment_status', 'paid')->sum('total_price');
        
        // Recent reservations
        $recentReservations = Reservation::with(['user', 'room'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        
        // Pending testimonials
        $pendingTestimonials = Testimonial::with('user')
            ->where('is_approved', false)
            ->take(5)
            ->get();
        
        // Monthly revenue chart data
        $monthlyRevenue = [];
        for ($i = 0; $i < 6; $i++) {
            $month = Carbon::now()->subMonths($i);
            $revenue = Reservation::where('payment_status', 'paid')
                ->whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->sum('total_price');
            
            $monthlyRevenue[date('M', $month->timestamp)] = $revenue;
        }
        $monthlyRevenue = array_reverse($monthlyRevenue);
        
        return view('admin.dashboard', compact(
            'totalRooms',
            'availableRooms',
            'totalReservations',
            'pendingReservations',
            'totalUsers',
            'totalRevenue',
            'recentReservations',
            'pendingTestimonials',
            'monthlyRevenue'
        ));
    }
} 