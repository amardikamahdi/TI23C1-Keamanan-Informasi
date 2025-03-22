<?php

namespace App\Http\Controllers\Encrypt\Text;

use App\Http\Controllers\Controller;
use App\Models\EncryptText;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HourlySeriesChartController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $start = now()->startOfDay();
            $end = now()->endOfDay();

            $records = EncryptText::query()
                ->whereBetween('created_at', [$start, $end])
                ->get();

            $hourlyData = $records
                ->groupBy(function ($item) {
                    return $item->created_at->format('H');
                })
                ->map(function ($group) {
                    return $group->count();
                });

            $formattedData = [];
            $today = Carbon::today();

            for ($hour = 0; $hour < 24; $hour++) {
                $hourStr = str_pad($hour, 2, '0', STR_PAD_LEFT);

                $timestamp = $today->copy()->addHours($hour)->timestamp * 1000;
                $value = $hourlyData[$hourStr] ?? 0;

                $formattedData[] = [
                    'x' => $timestamp,
                    'y' => $value
                ];
            }

            return response()->json([
                'data' => [
                    'hourly' => $formattedData
                ],
            ]);
        } catch (\Throwable $th) {
            info($th);

            return $this->InternalServerErrorResponse();
        }
    }
}
