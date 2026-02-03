<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class scoreResource extends JsonResource
{
    public $status;
    public $message;

    public function __construct ($status, $message, $resource)
    {
        
        $this->status = $status;
        $this->message = $message;
        return parent::__construct($resource);
    }
/**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status'=> $this->status,
            'message'=> $this->message,
            'data'=>[
                'id' => $this->_id,
                'Name' => $this->Name,
                'tugas' => $this->tugas,
                'uts' => $this->uts,
                'uas' => $this->uas,
            ]
            
        ];

    }
}
