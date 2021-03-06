@extends('layouts.app')

@section('title', 'Kirchzettel erstellen')

@section('content')
    <form method="post" action="{{ route('reports.render', $report) }}">
        <div class="card">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label class="control-label">Kirchzettel für folgende Kirchengemeinde erstellen:</label>
                    <select class="form-control" name="city">
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">
                                {{$city->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="start">Startdatum</label>
                    <input class="form-control datepicker" type="text" name="start"
                           value="{{ (new \Carbon\Carbon('next Sunday'))->format('d.m.Y') }}" placeholder="TT.MM.JJJJ"/>
                </div>
                @checkbox(['name' => 'mix_outlook', 'label' => 'Veranstaltungen aus dem Outlook-Kalender mit aufnehmen.', 'value' => true])
                @checkbox(['name' => 'mix_op', 'label' => 'Veranstaltungen aus dem Online-Planer mit aufnehmen.', 'value' => false])
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Erstellen</button>
            </div>
        </div>
    </form>
@endsection
