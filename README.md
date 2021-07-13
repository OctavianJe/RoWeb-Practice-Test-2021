# Roweb admission test for PHP Practical Stage 2021

Task 1 (HTML, CSS, JS poate):

Trebuie completat HTML si CSS, astfel incat pagina web sa arate ca in imaginea: "final.png". In aceasta imagine sunt marcate cu rosu div-urile care trebuie completate.

In fisierul "index.html", respectiv "css/style.css" sunt comentarii in zonele in care trebuie completat codul:
- \<!-- Aici completeaza HTML -->
- /* AIci completeaza CSS */

De asemenea, trebuie facute efecte de hover cu tranzitii/animatii pentru ca sectiunile, sa aiba efectele din videoclipul urmator: https://www.useloom.com/share/dcbc51df2bf34e3e8782c4691dd42dca
- hover pe unul din cele 3 div-uri sa aiba pointer pe imagine si titlu, shadow pe imagine, underline pe titlu
- hover pe div-ul albastru sa aiba pointer si sa mute sageata in dreapta (sageata o gasesti in "images/arrow.svg")

HTML-ul si CSS-ul trebuie sa fie scris astfel incat website-ul sa se vada corect pe rezolutiile desktop ( > 1200px pe latime).
Poti folosi cod css bootstrap (daca esti familiar) sau copy paste din codul pe care l-am oferit in proiect.
Fonturile care trebuie folosite (Work Sans si Rubik) sunt deja importate in <head>.

Daca poti face efectele de hover/tranzitie/animatie folosind exclusiv CSS, ai deja un mare avantaj 😊

Task 2 (PHP, JS):

Creaza un fisier "admin.php" in care vei scrie un CRUD pentru items (un item e unul din cele 3 divuri pe care le-ai scris static in HTML).
In acest fisier nu se pune accent pe HTML/CSS, pagina trebuie sa arate simplu, usor de utilizat si codul sa fie scris corect.
Pentru PHP, folosirea OOP in crearea CRUD-ului e un bonus. Poti crea cate fisiere PHP consideri ca e nevoie pentru CRUD.
Creaza o baza de date numita "test_web" care sa contina un tabel de items, unde vor fi stocate informatiile item-ilor:
- title (cel boldat)
- text (cel gri)
- category (cel albastru)
- image (random intre cele 3: "240_1.jpg", "240_2.jpg", 240_3.jpg")

La accesarea URL-ului "http://localhost/test_web/admin.php" vom vedea lista item-ilor (unu sub altul, nu conteaza style-ul). De exemplu un tabel in care <th> sunt: id, title, text, category, image.
In dreapta fiecarui item vom avea optiuni de: "EDIT si DELETE".
Deasupra listei vom avea un buton de: "CREATE".

Cand dam click pe butonul de create, vom vedea formularul de adaugare de item (image nu va fi un field, vei face o metoda/functie in PHP/JS care va alege imagine random intre cele 3).

Daca poti face formularul de create sa apara in aceeasi pagina la click, fara redirectionare e perfect.
Cand dam click pe butonul de edit, vom vedea formularul de edit de item avand campurile precompletate cu detaliile item-ului respectiv si il putem edita. Daca poti face formularul de edit sa apara in aceeasi pagina la click, e perfect.
Cand dam click pe butonul de delete, vom afisa un prompt de "Are you sure?". La click pe "Yes" stergem item-ul. La click pe "No" dispare prompt-ul.
Daca poti face toate aceste actiuni de CRUD, folosind AJAX, este si mai bine.

Tot acest CRUD pe care il facem in admin, trebuie reflectat in website.
Astfel ca index.html, il vom transforma in index.php si vom lista doar itemii din baza de date.
