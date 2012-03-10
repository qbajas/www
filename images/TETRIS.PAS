//{$APPTYPE GUI}

Uses GRAPH,CRT;
const n=10; m=20;
Var
  ster,tryb:smallint;
  x1,y1:integer;
  znak:char;
  i,j:integer;
  aktualny,nastepny:integer;
  kolor1,kolor2,opoznienie:integer;
  plansza: array [0..n+1, 0..m+1] of byte;
  typ: array [1..7,1..6,1..5] of byte;
  temp: array [1..6,1..5] of byte;
  score,level,old_level:integer;
  strin:string;
  Graphdriver, Graphmode:smallint;
  plik:text;
  scores:array [1..5] of integer;
  names:array[1..5] of string;
  lines:boolean;
  bonus:array [1..4] of boolean;


procedure helping_line(color:integer);
var
i,j,k,starty,stopy:integer;
begin
SetColor(color);
for j:=1 to 6 do
begin
 i:=5;
 while(i>=1) do
 begin
  if (typ[aktualny][j][i]=1) then
   begin starty:=i; i:=0; end;
  dec(i);
 end;
 if i=-1 then
 begin
  k:=starty;
  stopy:=21;
  while(k<=20) do
  begin
   if plansza[x1+j-1][k]<>0 then begin stopy:=k; k:=29; end;
   inc(k);
  end;
  line((x1+j-2)*20+200,(y1+starty-1)*20, (x1+j-2)*20+200,(stopy-1)*20);
  line((x1+j-2)*20+200+20,(y1+starty-1)*20, (x1+j-2)*20+200+20,(stopy-1)*20);
 end;
end;
end;


procedure draw;
var i,j:integer;
begin
for i:=1 to 5 do
for j:=1 to 6 do
begin
 if (x1+j-1<=11) and (y1+i-1<=21) then
 begin
  if (typ[aktualny][j][i]=0) and (plansza[x1+j-1][y1+i-1]=0) then
  begin
   SetColor(0); SetFillStyle(1,0);
   bar( (x1+j-2)*20+200 , (y1+i-2)*20 ,(x1+j-1)*20+200-1, (y1+i-1)*20 );
//   writeln('Zmienilem ',x1+j-1,' ',y1+i-1,' dla j,i=',j,' ',i);
  end;
  if typ[aktualny][j][i]=1 then
  begin
   SetColor(2); SetFillStyle(1,2);
   bar3d( (x1+j-2)*20+200 , (y1+i-2)*20+4 ,(x1+j-1)*20+200-4, (y1+i-1)*20 ,3,true);
  end;
 end;
end;
 if lines then
  begin
   helping_line(8);
  end;
end;



procedure text;
var
i,j:integer;
begin
SetFillStyle(1,black);
Bar (10, 20, 180, 400);
SetColor (White);
Str (score, Strin); OutTextXY (50, 40, 'Score: '+ strin);
Str (level, Strin); OutTextXY (50, 60, 'Level: '+ strin);
OutTextXY (10, 100, 'Next: ');
for i:=1 to 5 do
 for j:=1 to 6 do
 if typ[nastepny][j][i]=1 then
  begin
   SetColor(3); SetFillStyle(1,3);
   bar3d( j*20 , i*20+4+60 ,(j+1)*20-4, (i+1)*20+60 ,3,true);
  end;
SetColor (White);
OutTextXY (10, 300, 'High scores: ');
Str (scores[1], Strin); OutTextXY (10, 320,' 1. '+ strin + ' ' + names[1]);
Str (scores[2], Strin); OutTextXY (10, 330,' 2. '+ strin + ' ' + names[2]);
Str (scores[3], Strin); OutTextXY (10, 340,' 3. '+ strin + ' ' + names[3]);
Str (scores[4], Strin); OutTextXY (10, 350,' 4. '+ strin + ' ' + names[4]);
Str (scores[5], Strin); OutTextXY (10, 360,' 5. '+ strin + ' ' + names[5]);
end;



procedure bonuses;
begin
SetFillStyle(1,black);
Bar (450, 40, 630, 200);
SetColor (White);
OutTextXY (450, 50, 'Available bonuses: ');
if bonus[1] then begin
OutTextXY (450, 70, '1. Toggle the helping ' );
OutTextXY (450, 80, '   lines on/off ' );
end;
if bonus[2] then begin
OutTextXY (450, 100, '2. Change the upcoming ' );
OutTextXY (450, 110, '   brick ' );
end;
if bonus[3] then begin
OutTextXY (450, 130, '3. Hold the game ' );
end;
if bonus[4] then begin
OutTextXY (450, 150, '4. Clear the top half ' );
OutTextXY (450, 160, '   of bricks (one use)' );
end;
end;


procedure level_check;
begin
  level:=1;
  level:=score div 50 +1;
  if old_level<>level then
   bonus[random(4)+1]:=true;
  bonuses;
  old_level:=level;
end;


procedure redraw;
var  i,j:integer;
begin
for i:=1 to N do
 for j:=1 to M do
 begin
 if  plansza[i][j]=0 then
 begin
  SetColor(0); SetFillStyle(1,0);
  bar( (i-1)*20+200 , (j-1)*20 ,(i)*20+200-1, (j)*20 );
 end;
 if  plansza[i][j]=1 then
 begin
  SetColor(kolor2); SetFillStyle(1,kolor2);
  bar3d( (i-1)*20+200 , (j-1)*20+4 ,(i)*20+200-4, (j)*20, 3,true );
 end;
 end;
end;


function move:boolean;
var return:boolean;
begin
return:=true;
for i:=1 to 5 do
 for j:=1 to 6 do
 begin
 if (typ[aktualny][j][i]=1) and (plansza[x1+j-1][y1+i-1]<>0)  then
  return:=false;
 end;
move:=return;
end;


function shift(x:integer):boolean;
var return:boolean;
begin
return:=true;
for i:=1 to 5 do
 for j:=1 to 6 do
  begin
  if (typ[aktualny][j][i]=1) and (plansza[x+j-1][y1+i-1]<>0)  then
   return:=false;
  end;
shift:=return;
end;


procedure solid;
begin
dec(y1);
for i:=1 to 5 do
for j:=1 to 6 do
 if (typ[aktualny][j][i]=1) then
  plansza[x1+j-1][y1+i-1]:=1;
end;



procedure delete;
var line:boolean;
  i,j,k:integer;
begin
j:=M;
while j>=1 do
begin
 line:=true;
 for i:=1 to N do
   if plansza[i][j]=0 then line:=false;
 if line then
 begin

  for i:=1 to 10 do
  begin
   SetColor(14);
   SetFillStyle(1,14);
   bar3d( (i-1)*20+200 , (j-1)*20+4 ,(i)*20+200-4, (j)*20, 3,true );
  end;
  delay(500);

  score:=score+10;
  level_check;
  text;
  for k:=j downto 1 do
   for i:=1 to N do
    plansza[i][k]:=plansza[i][k-1];
  inc(j);

  redraw;
 end;
 dec(j);
end;
end;


procedure set_types;
var i,j,k:integer;
begin
for i:=1 to N do
 for j:=1 to M do
  plansza[N][M]:=0;
for j:=0 to M+1 do
 begin plansza[0][j]:=2; plansza[N+1][j]:=2; end;
for i:=0 to N+1 do
 plansza[i][M+1]:=2;

for k:=1 to 4 do
 for i:=1 to 5 do
  for j:=1 to 6 do
   typ[k][j][i]:=0;
typ[1][3][4]:=1; typ[1][4][4]:=1; typ[1][3][5]:=1; typ[1][4][5]:=1;  //o
typ[2][2][4]:=1; typ[2][3][4]:=1; typ[2][4][4]:=1; typ[2][5][4]:=1;  //____
typ[3][3][3]:=1; typ[3][4][3]:=1; typ[3][4][4]:=1; typ[3][5][4]:=1;//kaczka lewo
typ[4][3][3]:=1; typ[4][3][4]:=1; typ[4][3][5]:=1; typ[4][4][3]:=1; //L w prawo
typ[5][4][3]:=1; typ[5][4][4]:=1; typ[5][4][5]:=1; typ[5][3][3]:=1; //L w lewo
typ[6][5][3]:=1; typ[6][4][3]:=1; typ[6][4][4]:=1; typ[6][3][4]:=1;//kaczka prawo
typ[7][3][4]:=1; typ[7][4][4]:=1; typ[7][5][4]:=1; typ[7][4][3]:=1;  //+
end;


procedure high_score1;
var s,pom:string;
c:char;
j,i,p1,p2:integer;
begin
  reset(plik);
i:=1;
while i<=5 do
begin
 readln(plik,s);
 val(s,p1,p2);
 pom:=copy(s,1,p2-1);
 val(pom,p1,p2);
// writeln('string: ',s,' ',p1,' ',p2);
 if p2=0 then
 begin
  scores[i]:=p1;
  j:=1;  c:=s[1];
  while c<>' ' do begin inc(j); c:=s[j]; end;
  inc(j);  names[i]:='';
  while j<=length(s) do
   begin names[i]:=names[i]+s[j]; inc(j); end;
 end
 else i:=6;
inc(i);
end; close(plik);
end;




procedure high_score2;
var imie:string;
j,i:integer;
dalej:boolean;
begin
i:=1; dalej:=true;
while (i<=5) and (dalej) do
begin
 if scores[i]<score then dalej:=false;
 inc(i);
end;
if not dalej then
begin
 j:=5;  dalej:=true;
 while (j>=i) do
 begin
 // if scores[j]=0 then dalej:=false;
  scores[j]:=scores[j-1];
 names[j]:=names[j-1];
  dec(j);
 end;
 writeln('Congratulations! You have reached a high score! ');
 writeln('Write your name ');
 readln(imie);
 scores[i-1]:=score;
 names[i-1]:=imie;
 text;
 readkey;
end
else
begin
 writeln('Sorry - your score was not good enough to save it ');
 readkey;
end;
rewrite(plik); i:=1;
while i<=5 do
begin
 writeln(plik,scores[i],' ',names[i]);
 inc(i);
end;
close(plik);
end;


procedure clear_half;
var j,i,k:integer;
begin
k:=100;
j:=1;
while (j<=M) and (k=100) do
begin
for i:=1 to N do
 if plansza[i][j]=1 then k:=j;
inc(j);
end;

for j:=k to  20-( (20-k) div 2 ) do
 for i:=1 to N do
  plansza[i][j]:=0;

redraw;

end;



procedure rotate;
begin
if aktualny<>1 then
begin
{for i:=1 to 5 do
 for j:=1 to 6 do
  temp[j][i]:=0;
for i:=1 to 5 do
 for j:=1 to 5 do
 if typ[aktualny][j][i]=1 then temp[i][j]:=1;}
{ for i:=1 to 5 do
  for j:=1 to 6 do}
 temp:=typ[aktualny];
 if (aktualny>=3) and (aktualny<=7) then
 begin
      For I:= 3 To 5 Do Begin
       typ[aktualny] [5, I] := temp [I, 3];
       typ[aktualny] [4, I] := temp [I, 4];
       typ[aktualny] [3, I] := temp [I, 5];
      End;
 end
 else
 begin
      For I:= 2 To 5 Do Begin
       typ[aktualny] [5, I] := temp [I, 2];
       typ[aktualny] [4, I] := temp [I, 3];
       typ[aktualny] [3, I] := temp [I, 4];
       typ[aktualny] [2, I] := temp [I, 5];
      End;
 end;
end;
if not move then typ[aktualny]:=temp;
end;



Begin
 score:=0;
 lines:=false;

 assign(plik,'hs.txt');
 high_score1;
  DetectGraph (Graphdriver, Graphmode);
  InitGraph(Graphdriver, Graphmode, '' );
  randomize;
//  ster:=VGA;  tryb:=VGAHi;
//  InitGraph(ster,tryb, '' );
  kolor1:=15; kolor2:=5;

  SetColor(kolor1);
  Line(199,50,199,400);
  Line(401,50,401,400);
  Line(199,401,400,401);
  SetColor(8);
  Line(402,50,402,401);
  Line(403,50,403,401);
  Line(199,402,401,402);
  Line(199,403,401,403);

  aktualny:=random(7)+1;
  nastepny:=random(7)+1;
  set_types;
  x1:=3; y1:=0;

//   bonus[1]:=true; bonus[2]:=true; bonus[3]:=true; bonus[4]:=true;
  old_level:=0;
  level:=1;
  level_check;

  redraw;   text;   bonuses;
  opoznienie:=800;
  znak:=readkey;

Repeat
  if (not move) then
  begin
   solid;
   delete;
   redraw;
   x1:=3; y1:=0;
   if (opoznienie>100) or (opoznienie<50) then opoznienie:=800-(level-1)*100;
   aktualny:=nastepny;
   nastepny:=random(7)+1;
   inc(score);
   level_check;
   text;
   while keypressed do readkey;
   if not move then  ord(znak):=27;
  end;

 if ord(znak)<>27 then
 begin
  draw;
  y1:=y1+1;
  delay(opoznienie);

  if keypressed then
  begin
   znak:=readkey;
   if ord(znak)=0 then znak:=readkey;
   case ord(znak) of
   72:
    begin
    if lines then begin dec(y1); helping_line(0); inc(y1); end;
     rotate;
    end;
   80:
    begin
     opoznienie:=20;
    end;
   75:
    begin
     if lines then begin dec(y1); helping_line(0); inc(y1); end;
     if shift(x1-1) then x1:=x1-1;
     end;
   77:
    begin
     if lines then begin dec(y1); helping_line(0); inc(y1); end;
     if shift(x1+1) then x1:=x1+1;
    end;
   ord('3'):
    if bonus[3] then readkey;
   ord('1'):
    if bonus[1] then
    begin
     if lines then begin lines:=false; dec(y1); helping_line(0); inc(y1); end
     else lines:=true;
    end;
   ord('2'):
    if bonus[2] then  begin if nastepny=7 then nastepny:=1 else inc(nastepny); text; end;
   ord('4'):
    if bonus[4] then
     begin   clear_half;  bonus[4]:=false;   bonuses;    end;
   end;
  end;

 end;
Until ord(znak)=27;

  high_score2;
  CloseGraph;

End.
