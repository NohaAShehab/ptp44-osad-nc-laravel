<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CreatorResource;
class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
              'id'=>$this->id,
              'std_name'=>$this->name ,
              'image'=>"/images/students/{$this->image}",
            'creator'=>$this->creator_id,
            ## display relation in the resource
            'creator_name'=> $this->creator_id ? $this->creator->name: 'no creator',
            # I need to return with creator_id ,name
            'creator_object'=>$this->creator_id ? $this->creator : "no creator",
            'creator_obj'=> $this->creator_id ? new CreatorResource($this->creator) : null
        ];
    }
}
