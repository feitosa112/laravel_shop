<?php

// app/Services/BestSellingProductsService.php

namespace App\Services;

use App\Models\OrderItemModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BestSellingProductsService
{
    /**
     * Dobijanje najprodavanijih proizvoda.
     *
     * @param int $limit
     * @return \Illuminate\Support\Collection
     */
    public function getBestSellingProducts()
    {
        // Koristi Eloquent upit da dobijemo najprodavanije proizvode
        $bestSellingProducts = OrderItemModel::with('product')
        ->select('product_id', DB::raw('COUNT(product_id) as broj_prodaja'))
        ->groupBy('product_id')
        ->orderByDesc('broj_prodaja')
        ->limit(3)
        ->get();


        return $this->formatResults($bestSellingProducts);
    }

    /**

     *
     * @param \Illuminate\Support\Collection $results
     * @return \Illuminate\Support\Collection
     */
    protected function formatResults(Collection $results)
    {
        return $results->map(function ($result) {
            return [
                'product' => $result->product,
                // 'total_quantity' => $result->total_quantity,
            ];
        });
    }
}

