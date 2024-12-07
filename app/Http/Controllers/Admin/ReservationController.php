<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use App\Enums\TableStatus;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::paginate(10);
        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $tables = Table::where('status', TableStatus::Avaliable)->get();
        return view('admin.reservations.create', compact('tables'));
    }
    public function store(ReservationStoreRequest $request)
    {

        $table = Table::findOrFail($request->table_id);
        if ($request->guast_number > $table->guast_number) {
            return back()->with('warning', 'Please choose the table base on guests');
        }

        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $reserved) {
            if ($reserved->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this day.');
            }
        }

        Reservation::create($request->validated());
        return to_route('admin.reservations.index')->with('success', 'Reservation created successfylly.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Avaliable)->get();
        return view('admin.reservations.edit', compact('reservation', 'tables'));
    }

    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if ($request->guast_number > $table->guast_number) {
            return back()->with('warning', 'Please choose the table base on guests');
        }

        $request_date = Carbon::parse($request->res_date);
        $reservations = $table->reservations()->where('id', '!=', $reservation->id);
        foreach ($reservations as $reserved) {
            if ($reserved->res_date->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this day.');
            }
        }

        $reservation->update($request->validated());
        return to_route('admin.reservations.index')->with('success', 'Reservation updated successfylly.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return to_route('admin.reservations.index')->with('delete', 'Reservation deleted successfully.');
    }
}
