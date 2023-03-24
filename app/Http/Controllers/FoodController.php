<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodRequest;
use App\Models\MFood;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $food = MFood::paginate(10);

        return view('food.index', [
            'food' => $food
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodRequest $request)
    {
        try {
            $data = $request->all();
            if ($request->file('picturePath')) {
                $data['picturePath'] = $request->file('picturePath')->store('assets/food', 'public');
            }

            MFood::create($data);

            return redirect()->route('food.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Throwable $error) {
            return redirect()->route('food.index')->with('error', $error->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MFood $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MFood $food)
    {
        return view('food.edit', [
            'item' => $food,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FoodRequest $request, MFood $food)
    {
        try {
            $data = $request->all();
            if ($request->file('picturePath')) {
                $data['picturePath'] = $request->file('picturePath')->store('assets/food', 'public');
            } else {
                $data['picturePath'] = $food->picturePath;
            }

            $food->update($data);

            return redirect()->route('food.index')->with('success', 'Berhasil mengubah data ' . $food->name);
        } catch (\Throwable $error) {
            return redirect()->route('food.index')->with('error', $error->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MFood $food)
    {
        try {
            $food->delete();

            // Delete imagenya juga
            if (!empty($food->picturePath)) {
                $imagePath = storage_path("app/public/" . $food->picturePath);
                unlink($imagePath);
            }

            return redirect()->route('food.index')->with('success', 'Berhasil menghapus data ' . $food->name);
        } catch (\Throwable $error) {
            return redirect()->route('food.index')->with('error', $error->getMessage());
        }
    }
}