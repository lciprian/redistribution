@extends('layouts.app')

@section('content')
<section class="main-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Repartizate bile</h1>        
      </div>           
    </div>       
    <div class="row">          
      <div class="col-xs-12 col-sm-8 col-md-8">                        
        <form method="POST" action="{{ url('save') }}" id="redistribution_form" accept-charset="UTF-8">
          {{ csrf_field() }}
          <div class="row">
            <div class="form-group col-md-12">
              <p>
                <b>1.</b> Se dau bile de n culori (pentru a nu complica prea mult n este limitat la 10). Se va prelua de la tastatura n. In total sunt n x n bile (n la patrat). <br/>Distributia bilelor pe culori este random.
              </p>           
            </div>         
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="number" name="color_number" id="color_number" class="form-control" min="1" max="10">
            </div>
            <div class="form-group col-md-6">
              <input type="button" id="generator" class="btn btn-primary col-md-12" value="Generator" data-url="{{ url('getOrderedBallArray') }}">
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12" id="original_matrix_container"></div>
            <div class="col-md-12">
              <p>
                <b>2.</b> Sa se decida daca este posibil si in caz afirmativ sa se prezinte algoritmul general prin care bilele sunt repartizate in n grupe de cate n bile astfel incat in fiecare grupa sa fie bile de maxim 2 culori diferite (sunt permise si grupe cu o singura culoare) indiferent de distributia initiala.
              </p>           
            </div>    
            <div class="col-md-12" id="ordered_matrix_container"></div>
          </div>
          <div class="form-row">                
            <div class="form-group offset-md-6 col-md-6">
              <input type="submit" id="salveaza" class="btn btn-primary col-md-12" value="Salveaza" disabled>
            </div>
          </div>
          <input type="hidden" name="original_matrix" id="original_matrix" value="">
          <input type="hidden" name="ordered_matrix" id="ordered_matrix" value="">
        </form>   
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 p-4">
        <div>
          <h3>
            Exemplu:
          </h3>
          <p>          
           Pentru n=3 culori (rosu, galben, albastru) avem 9 bile si o distributie ar putea fi 1 bila rosie, 3 bile galbene, 5 bile albastre.             
          </p>
        </div>
        <div>
          <hr/>
          <h3>
            Exemplu de grupare:
          </h3>
          <p>  
            Pentru n=3 culori (rosu,galben,albastru) avem 9 bile  si distributia 1 bila rosie, 3 bile galbene, 5 bile albastre o varianta de grupare in 3 grupe de cate 3 bile astfel incat in orice grupa sa fie maxim 2 culori ar fi :
            <ul>
              <li>prima grupa:   1 bila galbena si 2 albastre</li>
              <li>a doua grupa: 1 bila rosie si 2 galbene</li>
              <li>a treia grupa : 3 bile albastre</li>          
            </ul>
            <i>Nota: e posibil ca un algoritm general care sa functioneze pe orice distributie si orice valoare n sa aleaga alta grupare in cazul de mai sus.</i>       
          </p>
        </div>
      </div>         
    </div>
  </div>
</section>
@endsection
