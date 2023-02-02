<?php
  
namespace App\Http\Resources;
   
use Illuminate\Http\Resources\Json\JsonResource;
  
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,            
            'slug' => $this->slug,
            'brand' => $this->brand,
            'description' => $this->description,
            'original_price' => $this->original_price,
            'selling_price' => $this->selling_price,
            'quantity' => $this->quantity,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'image' => $this->image,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}