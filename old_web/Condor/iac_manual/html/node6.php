<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Manual de Condor: Fichero de descripcion del envio"; ?>
<?php $metadescription="Manual de Condor: Fichero de descripcion del envio"; ?>
<?php $metakeywords="Manual, Condor, Envio, Descripcion"; ?>

<?php include("header_condor.php"); ?>

<!--Navigation Panel-->
<a href="node7.php" name="tex2html122" id="tex2html122">
<img width="37" height="24" class="nav-img" alt="next" src="next.png" /></a> 
<a href="node5.php" name="tex2html118" id="tex2html118">
<img width="26" height="24" class="nav-img" alt="up" src="up.png" /></a> 
<a href="node5.php" name="tex2html112" id="tex2html112">
<img width="63" height="24" class="nav-img" alt="previous" src="prev.png" /></a> 
<a href="node1.php" name="tex2html120" id="tex2html120">
<img width="65" height="24" class="nav-img" alt="contents" src="contents.png" /></a>  

<br />

<strong> Siguiente:</strong> <a href="node7.php" name="tex2html123" id="tex2html123">Universos</a>
<strong> Subir:</strong> <a href="node5.php" name="tex2html119" id="tex2html119">Enviando trabajos. condor_submit</a>
<strong> Anterior:</strong> <a href="node5.php" name="tex2html113" id="tex2html113">Enviando trabajos. condor_submit</a>
 &amp;nbsp; <strong>  <a href="node1.php" name="tex2html121" id="tex2html121">&#205;ndice General</a></strong> 
<br /><br />
<!--End of Navigation Panel-->


<h1><a name="SECTION00041100000000000000" id="SECTION00041100000000000000"></a>
<a name="sec::submit_file" id="sec::submit_file"></a>
Fichero de descripci&#243;n del env&#237;o
</h1>

<p>
Este archivo ser&#225; la entrada al comando <em>condor_submit</em>. Un ejemplo de fichero
de env&#237;o se puede ver en el siguiente ejemplo:</p>
<p></p>

<pre>
############################
#
# foo.submit
# 
# Ejemplo 1: Archivo simple de descripci&oacute;n del env&iacute;o.
#
############################

Executable   = foo
Universe     = vanilla
input        = test.data
output       = foo.out
error        = foo.err
Log          = foo.log
Queue
</pre>

<p>
Una vez guardado este fichero, le indicamos a Condor que lo ejecute de la siguiente manera:</p>
<p></p>
<pre>
[adrians@trevina ~]$ condor_submit foo.submit
Submitting job(s).
Logging submit event(s).
1 job(s) submitted to cluster 3.
</pre>

<p>
Veamos con m&#225;s detalle el contenido del archivo:</p>
<dl>
<dt><strong>Executable:</strong></dt>
<dd>Especificamos la ruta y el nombre del archivo ejecutable.
En el ejemplo solo se ha especificado el nombre, por lo que se espera que <span class="tt">foo</span> 
y <span class="tt">foo.submit</span> est&#233;n en el mismo directorio.
</dd>
<dt><strong>Universe:</strong></dt>
<dd>Elegimos un universo, por defecto se usar&#225; el universo
``vanilla''. Ver secci&#243;n <a href="node7.php#sec::universos">3.1.2</a>.
</dd>
<dt><strong>input:</strong></dt>
<dd>Archivo desde donde se leer&#225; la entrada por defecto (stdin). Si
no se especifica, se utilizar&#225; el archivo <span class="tt">/dev/null</span>.
</dd>
<dt><strong>output:</strong></dt>
<dd>Archivo donde se escribir&#225; la salida del comando (stdout). Si
no se especifica, se utilizar&#225; el archivo <span class="tt">/dev/null</span>.
</dd>
<dt><strong>error:</strong></dt>
<dd>Archivo donde se escribir&#225; la salida de error del comando (stderr). Si
no se especifica, se utilizar&#225; el archivo <span class="tt">/dev/null</span>.
</dd>
<dt><strong>Log:</strong></dt>
<dd>Archivo donde Condor almacenar&#225; un hist&#243;rico de lo que le ha
ocurrido a nuestro trabajo e informaci&#243;n como su c&#243;digo de salida, errores relacionados
con Condor, etc.
</dd>
<dt><strong>Queue</strong></dt>
<dd>Indica que Condor va a ejecutar una vez este trabajo, podemos
especificar un n&#250;mero (por ejemplo <span class="tt">Queue 10</span> o escribir varias 
veces <span class="tt">Queue</span> con lo que se ejecutar&#225; tantas veces como hayamos escrito). Podemos
especificar opciones para cada ejecuci&#243;n, por ejemplo: podemos tener
un fichero de entrada (<span class="tt">input</span>) para cada ejecuci&#243;n de nuestro trabajo.
</dd>
</dl>

<p>
Veamos ahora otro ejemplo, esta vez un poco m&#225;s complicado:</p>

<pre>
############################
#
# complex.submit
# 
# Ejemplo 2: Archivo de descripci&oacute;n del env&iacute;o usando 
# Requirements y Rank.
#
############################

Executable   = complex
Universe     = vanilla
Requirements = Memory &gt;= 64 &amp;&amp; OpSys == "Linux" &amp;&amp; Arch == "INTEL"
Rank         = Memory
input        = data.$(Process)
output       = out.$(Process)
error        = err.$(Process)
Log          = complex.log
Queue 10
</pre>

<p>
En este ejemplo introducimos algunas opciones nuevas:</p>

<dl>
<dt><strong>Requirements:</strong></dt>
<dd>Especificamos los requisitos que se han de cumplir para que nuestro
trabajo se ejecute. En el ejemplo obligamos a que la m&#225;quina candidata tenga un procesador INTEL
o compatible, est&#233; ejecutando Linux y, adem&#225;s, no permitimos que tenga menos de 64MB de memoria RAM.
En el caso de que no especifiquemos expl&#237;citamente los requisitos sobre
arquitectura y sistema operativo, Condor los crear&#225; autom&#225;ticamente para que
nuestros trabajos se ejecuten en m&#225;quinas con la misma arquitectura y el mismo
sistema operativo que la m&#225;quina desde donde se envi&#243; el trabajo.
Para ver los requisitos finales de nuestro trabajo (una vez 
enviado a Condor) podemos ejecutar <span class="tt">condor_q -l</span>, este comando nos mostrar&#225; informaci&#243;n detallada
de cada trabajo enviado.
</dd>
<dt><strong>Rank:</strong></dt>
<dd>Define un valor num&#233;rico que expresa preferencia, es decir, dadas todas las m&#225;quinas
candidatas a ejecutar nuestro trabajo, Condor eval&#250;a esta expresi&#243;n en cada una
de ellas y elegir&#225; aquellas donde su valor sea mayor. En el ejemplo, preferimos
aquellas m&#225;quinas que tengan mayor cantidad de memoria RAM.
</dd>
</dl>

<p>Para obtener m&#225;s informaci&#243;n acerca del uso de <span class="tt">Requirements</span> y 
<span class="tt">Rank</span> vea la secci&oacute;n <a name="tex2html1"
  href="http://www.cs.wisc.edu/condor/manual/v7.0/2_5Submitting_Job.html">Submitting a Job</a>
del manual de Condor.</p>

<p>
En el ejemplo 2 tambi&#233;n hemos usado unos nombres de archivo un tanto especiales
en las opciones <span class="tt">input</span>, <span class="tt">output</span> y 
<span class="tt">error</span>. El uso de la cadena
``$(Process)'' implica que all&#237; donde aparezca ser&#225; sustituido por el n&#250;mero
del trabajo que se va a ejecutar, es decir, en el ejemplo se crean 10 trabajos
(<span class="tt">Queue 10</span>) y cada uno de ellos tendr&#225; como entrada el archivo data.0, data.1,
...&nbsp;dependiendo de que n&#250;mero de trabajo sea. Lo mismo ocurrir&#225; con los
archivos de salida (<span class="tt">output</span>) y salida de 
error (<span class="tt">error</span>).</p>


<hr /><!--Navigation Panel-->
<a name="tex2html122"  href="node7.php">
<img width="37" height="24" class="nav-img" alt="next" src="next.png"></a> 
<a name="tex2html118"  href="node5.php">
<img width="26" height="24" class="nav-img" alt="up" src="up.png"></a> 
<a name="tex2html112"  href="node5.php">
<img width="63" height="24" class="nav-img" alt="previous" src="prev.png"></a> 
<a name="tex2html120"  href="node1.php">
<img width="65" height="24" class="nav-img" alt="contents" src="contents.png"></a>  
<br />
<strong> Siguiente:</strong> <a name="tex2html123"  href="node7.php">Universos</a>
<strong> Subir:</strong> <a name="tex2html119"  href="node5.php">Enviando trabajos. condor_submit</a>
<strong> Anterior:</strong> <a name="tex2html113"  href="node5.php">Enviando trabajos. condor_submit</a>
<strong>  <a name="tex2html121"  href="node1.php">&#205;ndice General</a></strong> 
<!--End of Navigation Panel-->

<address>
Adrian Santos Marrero
2004-09-21
</address>

</body>
</html>
