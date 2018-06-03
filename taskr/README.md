##Konfigurace a instalace

###Konfigurace připojení k databázi

Před prvním spuštěním aplikace je třeba v souboru lib/db.php nastavit hodnoty následujícím proměnným.

```
    $host = <DatabaseServerHostName>;
    $db = <DatbaseName>;
    $user = <DatabaseUserName>;
    $pass = <DatabaseUserPassword>;
```
 
###Scripty pro vytvoření tabulek

```sql
    create table users
    (
      user_id    int auto_increment,
      first_name varchar(250) not null,
      last_name  varchar(250) not null,
      password   varchar(250) not null,
      email      varchar(250) not null,
      primary key (user_id)
    );
    
    create table categories
    (
      category_id int auto_increment,
      name        varchar(255),
      user_id     int not null,
      foreign key (user_id) references users (user_id),
      primary key (category_id)
    );
    
    create table tasks
    (
      task_id     int auto_increment,
      user_id     int                    not null,
      title       varchar(250)           not null,
      done        tinyint(1) default '0' not null,
      deadline    date                   null,
      category_id int                    null,
      primary key (task_id),
      foreign key (user_id) references users (user_id),
      foreign key (category_id) references categories (category_id)
    ); 
```

