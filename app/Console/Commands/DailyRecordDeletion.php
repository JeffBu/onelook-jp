<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VideoRecord;
use Carbon\Carbon;

class DailyRecordDeletion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'records:delete-video';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Artisan command to delete videos on a daily basis.';

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
     * @return int
     */
    public function handle()
    {
        $now = Carbon::now()->format('Y-m-d');
        $todelete = $now->date_modify('-7 days');
        VideoRecord::where('created_at', 'LIKE', $todelete.'%')->delete();
    }
}
