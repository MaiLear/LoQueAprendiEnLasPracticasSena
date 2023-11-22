<div class="lateral-menu">
        <div class="lateral-menu-header">
            <div class="lateral-menu-header__img"></div>
            <h1 class="lateral-menu-header__text">Administrador</h1>
        </div>
        <ul class="lateral-menu-options">
            <li class="lateral-menu-options__items"><a class="lateral-menu-options__links" href="{{route('admin.index')}}">Index</a></li>
            @role('SuperAdmin','admin') 
            <li class="lateral-menu-options__items"><a class="lateral-menu-options__links" href="{{route('products.index')}}">Products</a></li>
            @endrole
            
            <li class="lateral-menu-options__items"><a class="lateral-menu-options__links" href="{{route('customer.index')}}">Customers</a></li>

            <li class="lateral-menu-options__items"><a class="lateral-menu-options__links" href="{{route('admin.roles.index')}}">Lista de roles</a></li>
        </ul>
    </div>