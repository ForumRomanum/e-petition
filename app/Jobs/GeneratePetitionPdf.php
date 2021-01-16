<?php

namespace App\Jobs;

use App\Events\PetitionPdfGenerated;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class GeneratePetitionPdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $petition;

    /**
     * Create a new job instance.
     *
     * @param array $petition
     */
    public function __construct(array $petition)
    {
        $this->petition = $petition;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $pdf = PDF::loadView('pdf.petition', [
            'petition' => $this->petition,
        ]);
        $pdfPath = $this->petition['id'] . '-' . $this->petition['name'] . '.pdf';
        $pdf->save(storage_path('app/public/' . $pdfPath));

        event(new PetitionPdfGenerated($this->petition, 'storage/' . $pdfPath));
    }


}
