<?php

namespace App\Console\Commands;

use App\Models\CdcData;
use App\Repositories\CdcDataRepository;
use App\Services\CdcDataFetcher;
use App\Services\CdcDataParser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class IngestCdcData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:ingest-cdc-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';



    public function __construct(private CdcDataFetcher $cdcDataFetcher,
                                private CdcDataRepository $cdcDataRepository)
    {
        parent::__construct();

    }

    public function handle()
    {
        try {
            $this->info('Data ingestion Started.');
            $data = $this->cdcDataFetcher->fetchData();
            $this->info('Data ingestion Fetched Storing.');
            $this->cdcDataRepository->store($data);
            $this->info('Data ingestion completed.');

        }
        catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
