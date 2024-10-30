<?php

namespace App\Filament\Resources\CategoryResource\Widgets;

use App\Models\Category;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Illuminate\Support\Facades\Auth;

class BlogPostsChart extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'blogPostsChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'usarios de categorias';

    //protected static ?string $footer = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    
    protected function getOptions(): array
    {

        $categories = Category::all();
        $series = [];
        $labels = [];

        foreach ($categories as $category) {
            $series[] = $category->users_count;
            $labels[] = $category->category_name;
        }

        return [
            'chart' => [
                'type' => 'donut',
                'height' => 300,
                
            ],
            'series' => $series,
            'labels' => $labels,
            'legend' => [
                'labels' => [
                    'fontFamily' => 'inherit',
                ],
            ],
            
        ];

        
    }

    public static function canView(): bool
    {
        return hasRole(auth()->user(), 'Admin');

    }

}
