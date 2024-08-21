@extends('sales.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Target Sales</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Target Sales</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sales.target-sales.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="user_sales_id">Select Salesperson</label>
                                <select id="user_sales_id" class="form-control" name="user_sales_id" required>
                                    <option value="">Select Salesperson</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_sales_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="target_sales">Target Sales</label>
                                <input type="number" id="target_sales" class="form-control" name="target_sales" value="{{ old('target_sales') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="month">Month</label>
                                <select id="month" class="form-control" name="month" required>
                                    @for ($m = 1; $m <= 12; $m++)
                                        <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}" {{ old('month') == str_pad($m, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input type="number" id="year" class="form-control" name="year" value="{{ old('year', date('Y')) }}" required>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
