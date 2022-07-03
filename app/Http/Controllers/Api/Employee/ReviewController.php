<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateReview;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
      /**
     * Show all reviews
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::where('reviewer_id',auth()->user()->id)->get();
        return ReviewResource::collection($reviews);
        

    }
    public function create( ValidateReview $request)
    {
        
        $this->authorize('create',Review::class);
        $validateData= $request->validated();
        $validateData['reviewer_id']=auth()->user()->id;
        $checkIfSubmittedBefore = Review::where([
            ['reviewer_id',$validateData['reviewer_id']],
            ['reviewed_employee_id',$validateData['reviewed_employee_id']]])
            ->get();
    
        if($checkIfSubmittedBefore->isNotEmpty()){
            return Response::deny('cannot resubmit the review',403);
        }    
        $review = Review::create($validateData);
        return new ReviewResource($review);
        
        

    }
    
}
