
        
                <td>
                    @if($country->suppliers->count() <= 0 and $country->customers->count() <= 0)
                        <a class="clickable"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target=".delete-{{ $country->id }}"></span></a>
                        @include('countries._modal')
                    @endif
                </td>
           
