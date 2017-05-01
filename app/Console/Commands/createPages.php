<?php

namespace App\Console\Commands;

use App\Models\Page;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Lang;

class createPages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:pages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Pages for the website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Page::create([
            'title' => Lang::get('pages.privacy'),
            'slug' => 'privacy',
            'content' => 'Here Privacy',
            'menu_id' => 1,
        ]);

        Page::create([
            'title' => Lang::get('pages.terms_of_use'),
            'slug' => 'terms',
            'content' => 'Here Terms',
            'menu_id' => 1,
        ]);

        Page::create([
            'title' => Lang::get('pages.legal_notice'),
            'slug' => 'legal',
            'content' => 'Here Legal Notice',
            'menu_id' => 1,
        ]);

        Page::create([
            'title' => Lang::get('pages.how_to_sell'),
            'slug' => 'how-to-sell',
            'content' => 'Here How to Sell',
            'menu_id' => 2,
        ]);

        Page::create([
            'title' => Lang::get('pages.how_to_buy'),
            'slug' => 'how-to-buy',
            'content' => 'Here How to Buy',
            'menu_id' => 2,
        ]);  

         Page::create([
            'title' => Lang::get('pages.ratings'),
            'slug' => 'ratings',
            'content' => 'Here Ratings',
            'menu_id' => 2,
        ]);                                       
    }
}
