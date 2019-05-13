<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Spectrum\StoreRequest;
use App\Spectrum;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SpectrumController extends Controller
{
    /** @var array Spectrum model fields */
    private const SPECTRUM_FIELDS = [
        'system',
        'mode',
        'category_id',
        'title',
        'temp',
        'state'
    ];

    /**
     * Display a listing of the resource
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('spectrum/create', [
            'categories' => Category::orderBy('title')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     *
     * @return Renderable
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all(self::SPECTRUM_FIELDS);

        if ($newCategory = $request->input('new_category')) {
            $category = Category::create(['title' => $newCategory]);
            $data['category_id'] = $category->id;
        }

        $this->getCurrentUser()->spectra()->create($data);

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param Spectrum $spectrum
     *
     * @return Response
     */
    public function show(Spectrum $spectrum)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Spectrum $spectrum
     *
     * @return Response
     */
    public function edit(Spectrum $spectrum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Spectrum  $spectrum
     *
     * @return Response
     */
    public function update(Request $request, Spectrum $spectrum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Spectrum $spectrum
     *
     * @return Response
     */
    public function destroy(Spectrum $spectrum)
    {
        //
    }
}