@extends('layouts.app')

@section('content')
<section class="bg-white">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Repartizate bile</h1>
        <p><b>1.</b> Se dau bile de n culori (pentru a nu complica prea mult n este limitat la 10). Se va prelua de la tastatura n. In total sunt n x n bile (n la patrat). <br/>Distributia bilelor pe culori este random.
        </p>  
        <p>
          <b>Exemplu:</b><br/> Pentru n=3 culori (rosu, galben, albastru) avem 9 bile si o distributie ar putea fi 1 bila rosie, 3 bile galbene, 5 bile albastre.
        </p>
        <p>
          <b>2.</b> Sa se decida daca este posibil si in caz afirmativ sa se prezinte algoritmul general prin care bilele sunt repartizate in n grupe de cate n bile astfel incat in fiecare grupa sa fie bile de maxim 2 culori diferite (sunt permise si grupe cu o singura culoare) indiferent de distributia initiala.
        </p>
        <p>
          <b>Exemplu de grupare:</b> <br/>
          Pentru n=3 culori (rosu,galben,albastru) avem 9 bile  si distributia 1 bila rosie, 3 bile galbene, 5 bile albastre o varianta de grupare in 3 grupe de cate 3 bile astfel incat in orice grupa sa fie maxim 2 culori ar fi :
          <ul>
            <li>prima grupa:   1 bila galbena si 2 albastre</li>
            <li>a doua grupa: 1 bila rosie si 2 galbene</li>
            <li>a treia grupa : 3 bile albastre</li>          
          </ul>
          <i>Nota: e posibil ca un algoritm general care sa functioneze pe orice distributie si orice valoare n sa aleaga alta grupare in cazul de mai sus.</i>
          </p>
          <p>
            <b>3.</b> Aplicatia are ca input numarul de culori, un array cu numarul de bile din fiecare culoare si va trebui sa preia datele de input si sa ilustreze cum algoritmul gasit la punctul 2 grupeaza bilele in n grupe de n bile fiecare grupa continand maxim 2 culori diferite.       
          </p>
          <p>  
            <b>4.</b> Bonus points pentru:
            <ul>
              <li>existenta unui backend bazat pe Laravel care serveste pagina de web (daca aplicatia este o pagina de web) si salveaza intr-o baza de date gruparea rezultata a bilelor pentru un set de date de input</li>
              <li>folosire jQuery/Bootstrap/VueJS in partea de frontend web</li>
              <li>codul sursa rezultat este incarcat intr-un repository pe Git (in README sa fie descris algoritmul)</li>          
            </ul>        
          </p>
      </div>           
    </div>  
  </div>
</section>
@endsection
