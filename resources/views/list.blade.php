@extends('layouts.app')

@section('content')
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>{{ __('Repartizate bile') }}</h1>
      </div>
    </div>
    <div class="row">
    @forelse($elements as $element)
    <?php 
      $originalMatrix = json_decode($element->original_matrix);
      $orderedMatrix  = json_decode($element->ordered_matrix);   
    ?>
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          {{ __('Repartizate pentru') }} {{$element->color_number}} {{ __('bile') }}
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h5>Matrice generata aleator:</h5>
              <table class="table text-center table-bordered table-sm">
              @for ($i = 0; $i < count($originalMatrix); $i++)
                <tr>
                @for ($j = 0; $j < count($originalMatrix); $j++)
                <td>
                  <span class="dot c{{ $originalMatrix[$i][$j] }}">{{ $originalMatrix[$i][$j] }}</span>
                </td>  
                @endfor  
                </tr>  
              @endfor
              </table>
            </div>
            <div class="col-md-6">
              <h5>Matrice reordonata:</h5>
              <table class="table text-center table-bordered table-sm">
              @for ($i = 0; $i < count($orderedMatrix); $i++)
                <tr>
                @for ($j = 0; $j < count($orderedMatrix); $j++)
                <td>
                  <span class="dot c{{ $orderedMatrix[$i][$j] }}">{{ $orderedMatrix[$i][$j] }}</span>
                </td>  
                @endfor  
                </tr>  
              @endfor
              </table>
            </div>     
          </div>   
        </div>
      </div>  
    </div>  
    @empty
      <div>
        <h2>{{ __('Nu exista data salvate') }}</h2>
      </div>
    @endforelse    
      <div class="col-md-12">
        {{ $elements->links('partials.paginator') }}
      </div>    
    </div>
  </div>
</section>
@endsection
