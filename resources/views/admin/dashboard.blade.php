@extends('admin.layouts.app')
@section('content')

<main>
    <div class="maincontent">
    @include('layouts._message')
        
        <h2>Welcome to the Admin panel</h2>
        <p>Dashboard</p>
        <div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>

        </form>
    </div>
    </div>
    
</main>
@endsection