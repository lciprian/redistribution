<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRedistributionRequest;

use App\Redistribution;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$limit = 5;
        $elements = Redistribution::paginate($limit);

        return view('list', compact('elements')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }

    /**
     * Show the form for viewing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function article()
    {
        return view('article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRedistributionRequest $request)
    {        	
    	Redistribution::create($request->all());
    	return response()->json();      
    }
     
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getOrderedBallArray(Request $request)
    {
    	$colorNumber  = (int)$request->get('color_number', 0);
        $originalMatrixJSON = $request->get('original_matrix', '');

        $originalMatrix = (array) json_decode($originalMatrixJSON);
    
		$orderedMatrix = $this->generateOrderedBallArray($originalMatrix);
      
        return response()->json($orderedMatrix);
    }

    /**
     * Generate orederd ball array
     *
     * @param  array  $originalMatrix
     * @return array  $in
     */	
    private function generateOrderedBallArray(Array $originalMatrix) 
    {
	    $colorMap = $this->generateColorMap($originalMatrix);
	    $l = count($originalMatrix);

	    for ($i = 0; $i < $l; $i++) {
	        if (!isset($out[$i])) {
	            $out[$i] = [];
	        }

	        // get the lowest numbers of colors
	        asort($colorMap);
	        $k = key($colorMap);

			// get the highest numbers of colors
	        end($colorMap);
	        $max = key($colorMap);

	        for ($j = 0; $j < $l; $j++) {
	            $out[$i][$j] = $k;
	            $colorMap[$k]--;
	        
	            if ($colorMap[$k] == 0) {
	                unset($colorMap[$k]);
	                $k = $max;
	            }
	        }	       
	    }

	    return $out;
	}

	/**
     * Count colors from original array
     *
     * @param  array $in
     * @return array
     */	
	private function generateColorMap(Array $in) 
    {
	    $colorMap = [];
	    $l = count($in);
	    for ($i = 0; $i < $l; $i++) {
	        for ($j = 0; $j < $l; $j++) {
	            if (!isset($colorMap[$in[$i][$j]])) {
	                $colorMap[$in[$i][$j]] = 0;
	            }
	            $colorMap[$in[$i][$j]]++;
	        }
	    } 

	    return $colorMap;
	}
}
