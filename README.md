# TIC TAC TOE

## Requirements

* PHP
* Mysql
* Apache2

## Gameplay

Ο σκοπός του κάθε παίχτη είναι να έχει 3 συνεχόμενα στοιχειά στον πινάκα οριζόντια, κάθετα ή διαγώνια (Χ ΄΄η Ο) σε περίπτωση που κανένας δεν το καταφέρει αυτό το παιχνίδι λήγει ισόπαλο.

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

|-|A     |B     |C     |
|-|------|------|------|
|1|O     |X     | -    |
|2| -    |O     | -    |
|3| -    | -    |      |
