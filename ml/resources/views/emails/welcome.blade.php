<h2>Bienvenido {{ $user->name }}!</h2>

<p>Esperemos que nuestra aplicación te sea de gran utilidad!</p>

<p>Te recordamos tus datos</p>

<ul>
<li>Usuario: {{ $user->name }} </li>
<li>Correo: {{ $user->mail }} </li>
</ul>

Enviado automáticamente desde <a href={{ url('/') }} title="MonerLend">MonerLend</a>