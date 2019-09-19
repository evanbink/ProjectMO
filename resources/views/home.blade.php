@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="{{ $settings1['column_class'] }}">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="text-value">{{ number_format($settings1['total_number']) }}</div>
                            <div>{{ $settings1['chart_title'] }}</div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="{{ $settings2['column_class'] }}">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="text-value">{{ number_format($settings2['total_number']) }}</div>
                            <div>{{ $settings2['chart_title'] }}</div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="{{ $settings3['column_class'] }}">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="text-value">{{ number_format($settings3['total_number']) }}</div>
                            <div>{{ $settings3['chart_title'] }}</div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="{{ $settings4['column_class'] }}">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="text-value">{{ number_format($settings4['total_number']) }}</div>
                            <div>{{ $settings4['chart_title'] }}</div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="{{ $settings5['column_class'] }}">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="text-value">{{ number_format($settings5['total_number']) }}</div>
                            <div>{{ $settings5['chart_title'] }}</div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="{{ $settings6['column_class'] }}">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="text-value">{{ number_format($settings6['total_number']) }}</div>
                            <div>{{ $settings6['chart_title'] }}</div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="{{ $settings7['column_class'] }}">
                    <div class="card text-white bg-primary">
                        <div class="card-body pb-0">
                            <div class="text-value">{{ number_format($settings7['total_number']) }}</div>
                            <div>{{ $settings7['chart_title'] }}</div>
                            <br />
                        </div>
                    </div>
                </div>
                {{-- Widget - latest entries --}}
                <div class="{{ $settings8['column_class'] }}">
                    <h3>{{ $settings8['chart_title'] }}</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                @foreach($settings8['fields'] as $field)
                                    <th>
                                        {{ ucfirst($field) }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($settings8['data'] as $row)
                                <tr>
                                    @foreach($settings8['fields'] as $field)
                                        <td>
                                            {{ $row->{$field} }}
                                        </td>
                                    @endforeach
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="{{ count($settings8['fields']) }}">{{ __('No entries found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Widget - latest entries --}}
                <div class="{{ $settings9['column_class'] }}">
                    <h3>{{ $settings9['chart_title'] }}</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                @foreach($settings9['fields'] as $field)
                                    <th>
                                        {{ ucfirst($field) }}
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($settings9['data'] as $row)
                                <tr>
                                    @foreach($settings9['fields'] as $field)
                                        <td>
                                            {{ $row->{$field} }}
                                        </td>
                                    @endforeach
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="{{ count($settings9['fields']) }}">{{ __('No entries found') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@endsection