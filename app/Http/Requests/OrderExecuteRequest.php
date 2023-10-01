<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class OrderExecuteRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        
            return [
                
                'user_id' => 'required|integer',
                'total_amount' => 'required|string',
                'status' =>'required|string',
                'shipping_address' => 'required|string'
            ];
        
       
    }
}
