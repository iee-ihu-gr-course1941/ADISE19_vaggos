# TIC TAC TOE

## Requirements

* PHP
* Mysql
* Apache2

## Gameplay

Ο σκοπος του καθε παιχτη ειναι να εχει 3 συνεχομενα στοιχεια στον πινακα οριζοντια, καθετα ή διαγωνια (Χ ΄΄η Ο)
σε περιπτωση που κανενας δεν το καταφερει αυτο το παιχνιδι ληγει ισσοπαλο.

## API

### Login

```
curl -X POST http://localhost/login -d { username:"user", password:"pass" }
```

### Player Move

```
curl -X POST http://localhost/play -d { "C3" = "O" }
```

### Board State

```
curl -X GET http://localhost/getBoardState
```

||A     |B     |C     |
||------|------|------|
|1|O     |X     | -    |
|2| -    |O     | -    |
|3| -    | -    |      |
