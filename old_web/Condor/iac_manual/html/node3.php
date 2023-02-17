<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Manual de Condor: C&oacute;mo funciona?"; ?>
<?php $metadescription="Manual de Condor: C&oacute;mo funciona?"; ?>
<?php $metakeywords="Manual, Condor, Funcionamiento"; ?>

<?php include("header_condor.php"); ?>


<!--Navigation Panel-->
<a   href="node4.php" name="tex2html76" id="tex2html76">
<img width="37" height="24" class="nav-img" alt="next" src="next.png" /></a> 
<a  href="manual.php" name="tex2html72" id="tex2html72">
<img width="26" height="24" class="nav-img" alt="up" src="up.png" /></a> 
<a  href="node2.php" name="tex2html66" id="tex2html66">
<img width="63" height="24" class="nav-img" alt="previous" src="prev.png" /></a> 
<a  href="node1.php" name="tex2html74" id="tex2html74">
<img width="65" height="24" class="nav-img" alt="contents" src="contents.png" /></a>  
<br />
<strong> Siguiente:</strong> <a  href="node4.php" name="tex2html77" id="tex2html77">¿C&oacute;mo lo uso?</a>
<strong> Subir:</strong> <a  href="manual.php" name="tex2html73" id="tex2html73">Introducci&#243;n a Condor</a>
<strong> Anterior:</strong> <a  href="node2.php" name="tex2html67" id="tex2html67">¿Qué es Condor?</a>
 &amp;nbsp; <strong>  <a href="node1.php" name="tex2html75" id="tex2html75">&#205;ndice General</a></strong> 
<br />
<br />
<!--End of Navigation Panel-->

<h1>
<a name="SECTION00030000000000000000" id="SECTION00030000000000000000"></a>
<a name="sec::how_it_work" id="sec::how_it_work"></a>
&#191;C&#243;mo funciona?
</h1>

<p>
B&#225;sicamente, enviamos un trabajo a Condor, este lo pone en una cola, lo ejecuta y 
finalmente nos avisa del resultado.
</p>

<p>
Vamos a verlo un poco m&#225;s de cerca para intentar comprender como funciona:
</p>

<ul>
<li>Normalmente usaremos Condor porque queremos ejecutar repetidas veces
    un programa (posiblemente con diferente entrada) o porque se requiere mucho
    tiempo para su finalizaci&#243;n y, mientras tanto, necesitamos seguir usando nuestra
    m&#225;quina.
</li>
<li>Inicialmente nuestro trabajo no necesita ninguna modificaci&#243;n para
    ser enviado a Condor. Sin embargo, tenemos que escribir un archivo de 
    descripci&#243;n del env&#237;o (ver secci&#243;n <a href="node6.php#sec::submit_file">3.1.1</a>).
</li>
<li>Una vez enviado a Condor, podemos seguirle la pista a nuestro
    trabajo con el comando <span class="tt">condor_q</span> (ver secci&#243;n <a href="node9.php#sec::condor_q">3.2</a>) o
    mediante un registro de actividad (fichero <span class="tt">Log</span>).
</li>
<li>Condor realiza peri&#243;dicamente b&#250;squeda de trabajos nuevos e intenta
    casarlos con recursos disponibles. Si no hay disponibles, el trabajo se
    quedar&#225; a la espera del pr&#243;ximo ciclo.
</li>
<li>Una vez Condor ha encontrado una m&#225;quina capaz de ejecutar el trabajo
    pendiente, lo env&#237;a y empieza la ejecuci&#243;n. Pueden ocurrir varias cosas mientras se
    est&#225; ejecutando un trabajo:
<ul>
<li>Lo m&#225;s deseable ser&#237;a que finalizara con &#233;xito. Si esto ocurriera
        se enviar&#237;an las salidas del trabajo a donde haya especificado el usuario
        y se mandar&#237;a un correo electr&#243;nico al mismo con un resumen de lo ocurrido.
</li>
<li>En el caso de que la m&#225;quina deje de estar utilizable (porque ha vuelto
        el usuario o alguno de los motivos explicados m&#225;s abajo) el proceso deber&#225;
        abandonarla. Si se estaba ejecutando en el universo ``standard'', se realizar&#237;a
        una imagen del estado actual del proceso (<em>checkpoint</em>) (ver sec.
        <a href="node7.php#sec::universos">3.1.2</a>) y se finalizar&#237;a su ejecuci&#243;n. En el
        resto de universos, simplemente se instar&#225; al trabajo a que finalize su
        ejecuci&#243;n (para ello se le env&#237;a la se&#241;al SIGTERM y si, pasado un cierto
        tiempo, no muere se le env&#237;a SIGKILL).
</li>
<li>Otra posibilidad es que el propietario del trabajo haya decidido
        borrarlo de Condor (ver secci&#243;n <a href="node10.php#sec::condor_rm">3.3</a>) con lo que
        finalizar&#225; su ejecuci&#243;n inmediatamente.

</li>
</ul>
</li>
</ul>

<p>
A la hora de enviar nuestro trabajo hemos de tomar algunas precauciones:
</p>

<ul>
<li>Tenemos que elegir un ``universo'' adecuado: en la mayor&#237;a de los casos
nos bastar&#225; con el universo ``vanilla'' (ver sec. <a href="node7.php#sec::universos">3.1.2</a>).
</li>
<li>Nuestro trabajo ha de ser capaz de ejecutarse en un sistema de procesamiento por
lotes: 

<ul>
<li>Ha de ser capaz de ejecutarse en ``background''. No ha de solicitar informaci&#243;n
interactivamente.
</li>
<li>Puede usar STDIN, STDOUT y STDERR, pero estos ser&#225;n archivos en vez de los 
perif&#233;ricos habituales (teclado y pantalla).
</li>
<li>Ha de organizar sus archivos de datos. Por ejemplo, separados por ejecuciones.
</li>
</ul>
</li>
</ul>

<p>
Notar que Condor no influye en el uso cotidiano de nuestros ordenadores, ya que solo 
utilizar&#225; m&#225;quinas ociosas, o lo que es lo mismo, las que cumplan los siguientes puntos:
</p>

<ul>
<li>No se est&#225; usando el rat&#243;n o teclado</li>
<li>No se est&#225; usando la m&#225;quina remotamente</li>
<li>No se est&#225; usando para ejecutar ning&#250;n otro trabajo.</li>
</ul>

<p>&nbsp;</p>

<hr />

<!--Navigation Panel-->
<a name="tex2html76"  href="node4.php">
<img width="37" height="24" class="nav-img" alt="next" src="next.png"></a> 
<a name="tex2html72"  href="manual.php">
<img width="26" height="24" class="nav-img" alt="up" src="up.png"></a> 
<a name="tex2html66"  href="node2.php">
<img width="63" height="24" class="nav-img" alt="previous" src="prev.png"></a> 
<a name="tex2html74"  href="node1.php">
<img width="65" height="24" class="nav-img" alt="contents" src="contents.png"></a>  
<br />
<strong> Siguiente:</strong> <a name="tex2html77"  href="node4.php">¿Cómo lo uso?</a>
<strong> Subir:</strong> <a name="tex2html73"  href="manual.php">Introducci&#243;n a Condor</a>
<strong> Anterior:</strong> <a name="tex2html67"  href="node2.php">¿Qué es Condor?</a>
 &nbsp; <strong>  <a name="tex2html75"  href="node1.php">&#205;ndice General</a></strong> 

<!--End of Navigation Panel-->

<address>
Adrian Santos Marrero
2004-09-21
</address>

</body>
</html>
