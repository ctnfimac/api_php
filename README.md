###  Levantar el proyecto en entorno de desarrollo

1.  ```
    * Instalar Docker
    * Instalar Docker-compose 
    ```

2.  Abrir la terminal a la altura del docker-compose.yml y ejecutar:
    ~~~
    docker-compose up -d
    ~~~
    Esto generara dos contenedores, uno para la base de datos y otro par el servidor php
    para verificarlo puede ejecutar
    ~~~
    docker ps 
    ~~~
    y verá algo así: 
    ![Captura de pantalla de 2022-03-28 00-25-22](https://user-images.githubusercontent.com/24881247/160320576-91d52063-8f6e-46ea-a795-ed3f55aef55b.png)

3. Entrar a la url http://0.0.0.0:8082/ y verá un mensaje "Estoy en la web", eso quiere decir que esta todo correcto.


###  Ejemplos de endpoints

Traer todos los registro:
~~~
   GET: http://0.0.0.0:8082/index.php?route=api
~~~

Traer un registro específico:
~~~
   GET: http://0.0.0.0:8082/index.php?route=api&id=3
~~~

Agregar un Registro nuevo:
~~~
   POST: http://0.0.0.0:8082/index.php?route=api

    { 
        "nombre": "Colibri"
    }
~~~


Modificar un registro:
~~~
   PUT: http://0.0.0.0:8082/index.php?route=api&id=7

    {
        "nombre": "Colibri Volador"
    }
~~~


Borrar un registro:
~~~
   GET: http://0.0.0.0:8082/index.php?route=api&id=7
~~~
