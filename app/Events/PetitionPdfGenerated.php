<?php

namespace App\Events;

use App\Models\Petition;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PetitionPdfGenerated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $petition;
    private $pdfPath;

    /**
     * Create a new event instance.
     *
     * @param Petition $petition
     * @param string $pdfPath
     */
    public function __construct(Petition $petition, string $pdfPath)
    {
        $this->petition = $petition;
        $this->pdfPath = $pdfPath;
    }

    public function getPetition(): Petition
    {
        return $this->petition;
    }

    public function getPath(): string
    {
        return $this->pdfPath;
    }
}
