<?php
/*
insert into empresas (user_id, cuenta, status) values (1, 'BIMBO', 'ACTIVA');
insert into empresas (user_id, cuenta, status) values (1, 'CERVEZA CORONA', 'ACTIVA');
insert into empresas (user_id, cuenta, status) values (1, 'COCA COLA', 'FORANEA');
mysql> select * from empresas;
+-----------+---------+----------------+---------+
| idempresa | user_id | cuenta         | status  |
+-----------+---------+----------------+---------+
|         1 |       1 | BIMBO          | ACTIVA  |
|         2 |       1 | CERVEZA CORONA | ACTIVA  |
|         3 |       1 | COCA COLA      | FORANEA |
+-----------+---------+----------------+---------+

insert into inversiones (empresa_id, anio, monto_inversion, monto_propuesta) values (1, 2015, 1000000, 800000);
insert into inversiones (empresa_id, anio, monto_inversion, monto_propuesta) values (1, 2014, 1000000, 850000);
insert into inversiones (empresa_id, anio, monto_inversion, monto_propuesta) values (1, 2013, 1000000, 50000);
insert into inversiones (empresa_id, anio, monto_inversion, monto_propuesta) values (2, 2013, 1000000, 50000);
insert into inversiones (empresa_id, anio, monto_inversion, monto_propuesta) values (3, 2014, 1000000, 50000);
mysql> select * from inversiones;
+-------------+------------+------+-----------------+-----------------+---------------+-------------------+-------------+-----------+---------+--------------+
| idinversion | empresa_id | anio | monto_inversion | monto_propuesta | fecha_campana | productos_interes | comentarios | propuesta | campana | temporalidad |
+-------------+------------+------+-----------------+-----------------+---------------+-------------------+-------------+-----------+---------+--------------+
|           1 |          1 | 2015 |      1000000.00 |       800000.00 | NULL          | NULL              | NULL        | NULL      | NULL    | NULL         |
|           2 |          1 | 2014 |      1000000.00 |       850000.00 | NULL          | NULL              | NULL        | NULL      | NULL    | NULL         |
|           3 |          1 | 2013 |      1000000.00 |        50000.00 | NULL          | NULL              | NULL        | NULL      | NULL    | NULL         |
|           4 |          2 | 2013 |      1000000.00 |        50000.00 | NULL          | NULL              | NULL        | NULL      | NULL    | NULL         |
|           5 |          3 | 2014 |      1000000.00 |        50000.00 | NULL          | NULL              | NULL        | NULL      | NULL    | NULL         |
+-------------+------------+------+-----------------+-----------------+---------------+-------------------+-------------+-----------+---------+--------------+

/**
 * Created by PhpStorm.
 * User: kory
 * Date: 11/08/15
 * Time: 19:07
 */
return [
    'empresa1' => [
        'user_id' => $this->class['user1'],
        'cuenta' => 'cuenta 1',
        'status' => 'activo',

    ],
    'empresa2' => [
        'user_id' => 'user1',
        'cuenta' => 'cuenta 2',
        'status' => 'activo',

    ],
];
