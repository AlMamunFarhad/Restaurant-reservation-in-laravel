<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;

class TableController extends Controller
{

    public function index()
    {
        $tables = Table::paginate();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tables.create');
    }


    public function store(TableStoreRequest $request)
    {
        Table::create([
            'name' => $request->name,
            'guast_number' => $request->guast_number,
            'status' => $request->status,
            'location' => $request->location,
        ]);

        return to_route('admin.tables.index')->with('success', 'Table booking successfully.');
    }


    public function show($id)
    {
        //
    }


    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }


    public function update(TableStoreRequest $request, Table $table)
    {
        $table->update($request->validated());
        return to_route('admin.tables.index')->with('success', 'Table successfully updated.');
    }


    public function destroy(Table $table)
    {
        $table->delete();
        $table->reservations()->delete();
        return to_route('admin.tables.index')->with('delete', 'Booking successfully deleted.');
    }
}
