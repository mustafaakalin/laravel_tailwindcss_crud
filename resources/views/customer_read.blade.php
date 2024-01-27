@extends('app')

@section('content')
<div class="flex flex-col">
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
    <div>
        <img src="/images/{{ $customer->photo }}" alt="" class="w-80">
    </div>

    <div>
        <p>{{ $customer->name }}</p>
    </div>

    <div>
        <p>{{ $customer->email }}</p>
    </div>

    <div>
        <p>{{ $customer->phone }}</p>

    </div>

    <div>
        <p>{{ $customer->address }}</p>
    </div>

</div>
@endsection