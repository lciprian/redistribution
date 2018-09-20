# Enunt Problema

Sa se dezvolte o aplicatie care rezolva urmatoarea problema:

**1.** Se dau bile de n culori (pentru a nu complica prea mult n este limitat la 10). Se va prelua de la tastatura n. In total sunt n x n bile (n la patrat).  
Distributia bilelor pe culori este random.

**Exemplu:**  
Pentru n=3 culori (rosu, galben, albastru) avem 9 bile si o distributie ar putea fi 1 bila rosie, 3 bile galbene, 5 bile albastre.

**2.** Sa se decida daca este posibil si in caz afirmativ sa se prezinte algoritmul general prin care bilele sunt repartizate in n grupe de cate n bile astfel incat in fiecare grupa sa fie bile de maxim 2 culori diferite (sunt permise si grupe cu o singura culoare) indiferent de distributia initiala.

**Exemplu de grupare:**  
Pentru n=3 culori (rosu,galben,albastru) avem 9 bile si distributia 1 bila rosie, 3 bile galbene, 5 bile albastre o varianta de grupare in 3 grupe de cate 3 bile astfel incat in orice grupa sa fie maxim 2 culori ar fi :

*   prima grupa: 1 bila galbena si 2 albastre
*   a doua grupa: 1 bila rosie si 2 galbene
*   a treia grupa : 3 bile albastre

_Nota: e posibil ca un algoritm general care sa functioneze pe orice distributie si orice valoare n sa aleaga alta grupare in cazul de mai sus._

**3.** Aplicatia are ca input numarul de culori, un array cu numarul de bile din fiecare culoare si va trebui sa preia datele de input si sa ilustreze cum algoritmul gasit la punctul 2 grupeaza bilele in n grupe de n bile fiecare grupa continand maxim 2 culori diferite.

**4.** Bonus points pentru:

*   existenta unui backend bazat pe Laravel care serveste pagina de web (daca aplicatia este o pagina de web) si salveaza intr-o baza de date gruparea rezultata a bilelor pentru un set de date de input
*   folosire jQuery/Bootstrap/VueJS in partea de frontend web
*   codul sursa rezultat este incarcat intr-un repository pe Git (in README sa fie descris algoritmul)

# Descrierea algoritmului

**1.** Programul genereaza o matrice de bile de dimensiune n x n. Bilele vor avea n culori. Fiecarei culori ii corespunde minim o bila.

Exemplu de matrice 4 x 4, cu 4 culori, generata aleator:

| 1 | 1 | 4 | 2 |

| 1 | 1 | 2 | 1 |

| 3 | 4 | 4 | 4 |

| 1 | 4 | 4 | 2 |

Fiecare culoare este reprezentata de o cifa din intervalul 1-4.

**2.** Se genereaza o harta ce contine distributia culorilor:

**Exemplu:** 

[
	1 => 6 

	2 => 3

	3 => 1

	4 => 6

]

Avem 6 bile de culoarea 1, 2 bile de culoarea 2, 1 bila de culoarea 3 si 6 bile de culoarea 4.

**3.** Se generaza o noua matrice care este populata de bilele din array-ul ce contine distributia culorilor dupa cum urmeaza:

* se sorteaza harta de culori
* se umple primul rand din matricea reordonata cu minimul din harta de culori
* se sterge minimul din harta de culori
* se completeaza randul cu maximul din harta de culori
* se scad elementele completate din maximul din harta de culori (caz in care este posibil sa avem un nou maxim)
* se reiau pasii de mai sus 

In exemplul nostru, la prima iteratie noua harta de culori va fi: 

[
	2 => 3	

	1 => 3 	

	4 => 6

]

In final vom avea o matrice ordonata astfel incat pe oricare rand sa fie maxim 2 culori.

In exemplul nostru:

| 3 | 1 | 1 | 1 |

| 2 | 2 | 2 | 4 |

| 1 | 1 | 1 | 4 |

| 4 | 4 | 4 | 4 |