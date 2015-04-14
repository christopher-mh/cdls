# cdls
Naviguate through your Linux folder, the fastest way.

Call it by modifying your .bash_aliases file:
```
alias cdls='cd $(php $HOME/scripts/cdls.php)'
```

Example of output: 
```
~ $ clds
Go to folder /web/:
0: example.com
1: mysite.com
2: loremipsum.42
Choose a folder: 2

Going to /web/loremipsum.42/
Go to folder /web/loremipsum.42/:
0: AlanParsons
1: EricWoolfson
2: AndrewPowell
3: DavidGilmour
Choose a folder: Ala

Going to /web/loremipsum.42/AlanParsons/
/web/loremipsum.42/AlanParsons/ $
```
