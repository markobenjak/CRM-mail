POZDRAV

Ovdje možete naći sve potrebne datoteke za projekt

Isto tako uputstva kako ga pokrenuti, te njegove funkcionalnosti.

Napomena: Projekt je rađen u IntelliJ razvojnom okruženju koji ima svoj atuomatski lokalni hosting. Za pokretanje preporučam njega.

1. KREIRATI BAZU
u datoteci database se nalazi Dump.sql datoteka u kojoj se nalazi exportana baza. 
Ukoliko korsitite MySQL Workbench(ako ne skinite jer je export iz njega i na taj način sigurno radi) odite na Server->Data Import. tu oynačite import from Self containing file i stisnite Start Import.
Ostalo bi se trebalo srediti samo.
U cijeloj bazi će biti importan samo jedan redak, a to je korisnik za login u aplikaciju. 
  username: projekt.php80@gmail.com
  password: test
  
2. Projekt koristi PHP biblioteke koje vam vjerojatno neće raditi iz prve. Odnosno bacati će razne errore u browseru. Library je uključen u projekt u fodler Mail, 
ali kako to obično bude, ne radi svima sve od prve. Ukoliko baca neki error riješenje se pronađe vrlo brzo u google. Nažalost, ne mogu reći što točno treba jer je meni radilo od prve, jer sam nešto slično radio prije nekoliko mjeseci, ali više ne znam što mi je točno stvaralo problem.
    
3. Ako koristite IntelliJ otvorite datoteku frontend/login.php. U desnom kutu će te vidjeti izbor browsera za otvaranje
![Browsers](/images/browseri.png)
  Sve datoteke u frontend datoteci će vas odvesti na Login stranicu, jer prvi puta nema te aktivni session.

4. Za login iskoristite username i password za korisnika koji je unesen sa bazom
![Login](/images/login.png)

5.Nakon uspješnog login-a dolazite u glavno sučelje. Biti će prazno jer nemate niti jedan e-mail u bazi.
![Sucelje](/images/sucelje.png)

Tipke na navigaciji:
1. dodaj korisnika
2. arhivirani mailovi(mailovi koji su odgovoreni)
3. active( mailovi koji nisu odgovoreni)
4. add user(dodaj korisnika)
5. logout


6. U datotekama je podešeno spajanje na moj gmail račun koji je kreiran izričito za ovaj projekt. Ako želite koristiti svoj morate u datoteci email.php promjeniti username i password. Osim toga morate u psotvkama google računa omogućiti spajanje vanjskim aplikacijama, što predstavlja sigurnosne probleme.
Ako sotajete pri mojem slobodno se ulogirajte i u gmail account direktno i pogledajte mailove.

7.Ako je sve bilo uspješno pritiskom na tipku Get new e-mails bi trebali povući mailove i vidjeti ih na početnoj stranici.
![Mail](/images/mailovi.png)

8. Pritiskom na Open E-mail tipku će te dobiti popup u kojemmožete odgovorit na mail.
![Mail](/images/popup.png)


