@php if(session()->has('success')) $success = session()->get('success'); @endphp
@if(isset($success))
    <div class="alert alert-success">
        <span>{{ $success }}</span>
    </div>
@endif
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <span>{{ $error }}</span>
        </div>
    @endforeach
@endif
