<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List') }}
        </h2>
    </x-slot>

    <table class="table table-hover">

    <thead>
        
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>

    </thead>

    <tbody>
@foreach($contacts as $contact)

        <tr>

          <td>{{$contact->id}} </td>

          <td>{{$contact->name}} </td>

          <td>{{$contact->email}} </td>


        </tr>
@endforeach

    </tbody>

   

</table>
    
</x-app-layout>
