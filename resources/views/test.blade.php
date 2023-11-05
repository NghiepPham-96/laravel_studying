@extends('layouts.app')

@section('content')
<form action="{{ route('test-store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlInput1">Text</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="datepicker">Datepicker</label>
        <input type="text" class="datepicker form-control" id="datepicker" name="date1" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="datepicker">Datepicker</label>
        <input type="text" class="datepicker form-control" id="datepicker" name="date2" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="datepicker">Datepicker</label>
        <input type="text" class="datepicker form-control" id="datepicker" name="chumon[0][date1]" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="datepicker">Datepicker</label>
        <input type="text" class="datepicker form-control" id="datepicker" name="chumon[0][date2]" autocomplete="off">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script type="text/javascript">
    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true,
        clearBtn: true,
        startDate: '-3d',
    });
</script>
@endsection