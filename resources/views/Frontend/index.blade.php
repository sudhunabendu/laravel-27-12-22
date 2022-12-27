@extends('Frontend.Layout')

@section('content')
<div class="container py-5">
    <form action="{{route('send')}}">
        @csrf

        <div class="col-md-6">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>


        <div class="col-md-6">
            <label for="exampleInputEmail1" class="form-label">To Email address</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Messages</label>
            <textarea class="form-control" name="messages" id="" cols="30" rows="10" required></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
@endsection
