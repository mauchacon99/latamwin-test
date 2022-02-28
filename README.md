 

 
<h1> Prueba Latamwin   </>
   
<h6>   Esta prueba  esta conformada por dos modulos: Usuarios y Roles el cual se puedn eliminar, editar y crear en ellos, los roles creados se le permite agregar un conjunto de permiso generados en los seeders, de esta manera se permite crear distintos roles dinamicos con diferente permisos </h6>    

## 1. Install
    
    composer install 
   
    npm install
   
## 2. Basic Parameters on .env file:
 
<ul>
  <li>  DB_CONNECTION=mysql </li>
  <li>  DB_HOST=127.0.0.1 </li>
  <li>  DB_PORT=3306 </li>
  <li>  DB_DATABASE=your_database_name </li>
  <li>  DB_USERNAME=your_database_user </li>
  <li>  DB_PASSWORD=your_database_password </li>
</ul>

## 3. Run
    cp .env.example .env
    php artisan migrate --seed
    npm run dev
    php artisan serve
    
  
## 4. Sign In
You can use any of the following pre-existing credentials for signing in:
<ul>
  <li> -e admin@admin.com	</li> 
  <li> -p password </li>
</ul>
