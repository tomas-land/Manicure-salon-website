{{-- @foreach ($cars as $car)
<tr> --}}
    {{-- <td><span>{{ $car->name }}</span></td> --}}
    {{-- <td><span>{{ $service->price }}&nbsp<i class="fas fa-euro-sign"></i></span></td> --}}
    {{-- @foreach ($car->carModels as $model)
            <td><span>{{ $model->name }}</span></td>

    @endforeach --}}
{{--        
        <td>
       
    </td>
         
    
</tr> --}}
{{-- @endforeach --}}
@foreach ($services as $service)
{{-- {{$service->name}} --}}
@foreach ($service->manicureServices as $service)
            <td><span>{{ $service->name }}</span></td>

    @endforeach 
    
@endforeach