<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateReview;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
     /**
     * Display a listing of Reviews.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::get();
        return ReviewResource::collection($reviews);
    }
      /**
     * Store a newly created Review .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(ValidateReview $request)
    {
        $ValidatedData= $request->validated();
        $validateData['reviewer_id']=auth()->user()->id;
        $review = Review::create($validateData);
        return new ReviewResource($review);

    }  
    /**
     * Update the specified review.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */ 
    public function update(ValidateReview $request ,$id)
    {
        $ValidatedData= $request->validated();
        $validateData['reviewer_id']=auth()->user()->id;
        $review = Review::where('id',$id)->update($validateData);
        return new ReviewResource($review);
    }
     /**
     * Display the specified Review.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $review = Review::where('id',$id)->get();
        return  ReviewResource::collection($review); 
    }

}
