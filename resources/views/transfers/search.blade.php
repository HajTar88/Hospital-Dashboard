@extends('layouts.master')


@section('content')

<table class="table table-bordered">
    <thead class="text-center">
      <tr>
        
        <th scope="col">رقم المريض</th>
        <th scope="col">اسم المريض </th>
        <th scope="col"> العنوان</th>
        <th scope="col"> الحالة</th>
        <th scope="col"> التشخيص</th>
        <th scope="col"> من</th>
        <th scope="col"> إلى</th>

       
        <th scope="col">العمليـــــات</th>
      </tr>
    </thead>
    <tbody class="text-center">
      @php
      $i = 0 ;
     @endphp
      @foreach ($transfers as $item)
      <tr>
        
        <td>{{$item->patient_code}}</td>
        <td>{{$item->patient_name}}</td>
        <td>{{$item->address}}</td>
        <td>{{$item->case}}</td>
        <td>{{$item->diagnosis}}</td>
        <td>{{$item->current_hospital}}</td>
        <td>{{$item->hospital_referred}}</td>
        <td>
          <button type="button" class="btn btn-light"><a href="{{ route('transfers.show', $item->id)}}" ><i class="bi bi-eye-fill"></i></a> </button>
          
        </td>
      </tr>
      @endforeach

        
      </div>
    </tbody>
</table>


@endsection