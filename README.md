# TIC TAC TOE

## Requirements

* PHP
* Mysql
* Apache2

## Gameplay

Ο σκοπός του κάθε παίχτη είναι να έχει 3 συνεχόμενα στοιχειά στον πινάκα οριζόντια, κάθετα ή διαγώνια (Χ ΄΄η Ο) σε περίπτωση που κανένας δεν το καταφέρει αυτό το παιχνίδι λήγει ισόπαλο.

## API

### Login

### JSON Data example

```
{
    "userid": 124,
    "token": "ac12345azfh",    
    "boardid": 1,
    "position": 6
}
```

userid: Το userid του χρηστη (μπορει να παραληφθει απλα το βαζουμε για λογους απλότητας)

token: Το session token όπως γυρνάει από το authentication

boardid: Το boardid που αντιστοιχεί στο παιχνίδι

position: Ακέραιος 0-8 στον οποίο παίζει ο παίχτης.

 **Possible responses:**
1. *200 OK*

```
{
    "symbol" : 'X'
    "position": 6,
    "game_finished" : "false",
    "winner" : "none"
}
```
2. *403 Forbidden*

If move is not allowed, or it's not their turn to play

3. *401 Unauthorized*

If game exists but player is not authorized

4. *404 Not Found*

If game does not exist

### GET /game?id={boardid}

**Possible responses:**
1. *200 OK*

```
{
  "gameinfo":
  {
    "player1" : 143,
    "player2" : 635,
    "boardstate": "x-o-x--ox"
    "running": "true",
    "next" : 635,
    "winner": "none"
  }
}
```
2. *404 Not Found*
If game does not exist

## MySQL tables

### a. users

|userid | username | password | token 		 |
|---    |---       |---       |---    		 |
|1      |user	   |pass123   |randomtoken123|

### b. boards
|boardid| xuser | ouser | boardstate | nextmove | winner | running |
|---	|---	|---	|---	     |---	    |---	 |---	   |
|1		|143	|635	|'xo----oxx' | 143 		| NULL   | True    |



### Player Move

```
curl -X POST --data '{ "userid": 143, "token": "randomtoken123", "boardid": 1, "position": 6 }' <URL>
```

### Board State

```
curl -X GET http://localhost/game?id={boardid} 
```

|-|A     |B     |C     |
|-|------|------|------|
|1|O     |X     | -    |
|2| -    |O     | -    |
|3| -    | -    |      |
