@extends('layout')

@section('content')
<h2 class="Title">Clients</h2>
<client-list 
	:clients="{{ $clients }}" 
	:countries="{{ $countries }}" 
	:all-custom-fields="{{ $allCustomFields }}"
	:is-editable="true"
>
</client-list>
@endsection