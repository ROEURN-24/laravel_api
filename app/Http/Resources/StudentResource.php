<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // The status is computed in the Student model, no need to do it here.
        // 'status' => $this->score >= 50 ? 'Pass' : 'Fail'; /* Not recommended to include business logic in resource */

        return [
            'id' => $this->id,
            'name' => $this->name,
            'age' => $this->age,
            'province' => $this->province,
            'score' => $this->score,
            'phone_number' => $this->phone_number,
            // 'status' => $status,
            // Not recommended to assign the status here; use the status accessor from the model.
            'status' => $this->status, // Status is computed in the model using an accessor

        ];
    }
}
