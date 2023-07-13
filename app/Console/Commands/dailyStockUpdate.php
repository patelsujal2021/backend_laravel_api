<?php

namespace App\Console\Commands;

use App\Models\Stock;
use Illuminate\Console\Command;

class dailyStockUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily-stock-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \Log::info('cron start');

        $stocks = Stock::get();

        foreach($stocks as $stock){
            if($stock->quantity > 0){
                $stock->update([
                    'in_stock' => now()->addDay()->format('Y-m-d')
                ]);
            }
        }
        \Log::info('cron end');
    }
}
