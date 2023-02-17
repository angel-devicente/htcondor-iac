<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Manual de Condor: Universos"; ?>
<?php $metadescription="Manual de Condor: Universos"; ?>
<?php $metakeywords="Manual, Condor, Universos"; ?>

<?php include("header_condor.php"); ?>

<!--Navigation Panel-->
<a name="tex2html134"  href="node8.php">
<img width="37" height="24" class="nav-img" alt="next" src="next.png"></a> 
<a name="tex2html130"  href="node5.php">
<img width="26" height="24" class="nav-img" alt="up" src="up.png"></a> 
<a name="tex2html124"  href="node6.php">
<img width="63" height="24" class="nav-img" alt="previous" src="prev.png"></a> 
<a name="tex2html132"  href="node1.php">
<img width="65" height="24" class="nav-img" alt="contents" src="contents.png"></a>  
<br />
<strong> Siguiente:</strong> <a name="tex2html135"  href="node8.php">Sobre el acceso a</a>
<strong> Subir:</strong> <a name="tex2html131"  href="node5.php">Enviando trabajos. condor_submit</a>
<strong> Anterior:</strong> <a name="tex2html125"  href="node6.php">Fichero de descripci&oacute;n </a> 
<strong> <a name="tex2html133"  href="node1.php">&#205;ndice General</a></strong> 
<br />
<br />
<!--End of Navigation Panel-->


<h1><a name="SECTION00041200000000000000"></a><a name="sec::universos"></a>Universos</h1>

<p>
Para Condor, un ``universo'' define un conjunto de caracter&#237;sticas que marcar&#225;n
el entorno de ejecuci&#243;n de nuestro trabajo. Por ejemplo, para trabajos en Java
existe un universo ``Java''. Este, por ejemplo, permitir&#225; capturar las excepciones
de la m&#225;quina virtual de Java o solo ejecutar&#225; los trabajos en m&#225;quinas con la
m&#225;quina virtual disponible.</p>

<p>
B&#225;sicamente podemos elegir entre tres universos:
</p>

<dl>
<dt><strong>vanilla</strong></dt>
<dd>Es el universo por defecto y, adem&#225;s, es el menos restrictivo con
    los trabajos que se pueden enviar (acepta cualquier programa escrito en cualquier 
    lenguaje). La parte negativa es que no permite ``checkpointing'' o llamadas al sistema
    remotas (ver universo ``standard'' a continuaci&#243;n).

</dd>
<dt><strong>standard</strong></dt>
<dd>Este universo soporta ``checkpointing'' y llamadas al sistema remotas.
      Hacer ``checkpointing'' de un programa significa guardar en disco su estado
      actual de ejecuci&#243;n antes de parar el proceso. Gracias al ``checkpointing'', un
    programa se puede parar (guard&#225;ndose su estado en un fichero), y m&#225;s adelante se
    puede volver a ejecutar desde el punto exacto en que se abort&#243;. Para que un
    programa pueda ser enviado a este universo ha de estar enlazado con las
    librer&#237;as de Condor (compilado usando <em>condor_compile</em>). Presenta algunas
    restricciones en los trabajos que se pueden enviar.

</dd>
<dt><strong>java</strong></dt>
<dd>Este universo est&#225; destinado para el env&#237;o de trabajos escritos en Java.
</dd>
</dl>

<p>
Para informaci&#243;n m&#225;s detallada acerca de cada universo puede visitar la 
<a name="tex2html2"
  href="http://www.cs.wisc.edu/condor/manual/v7.0/2_4Road_map_Running.html">Road-map</a>.
</p>


<hr /><!--Navigation Panel-->
<a name="tex2html134"  href="node8.php">
<img width="37" height="24" class="img-nav" alt="next" src="next.png"></a> 
<a name="tex2html130"  href="node5.php">
<img width="26" height="24" class="img-nav" alt="up" src="up.png"></a> 
<a name="tex2html124"  href="node6.php">
<img width="63" height="24" class="img-nav" alt="previous" src="prev.png"></a> 
<a name="tex2html132"  href="node1.php">
<img width="65" height="24" class="img-nav" alt="contents" src="contents.png"></a>  
<br />
<strong> Siguiente:</strong> <a name="tex2html135"  href="node8.php">Sobre el acceso a</a>
<strong> Subir:</strong> <a name="tex2html131"  href="node5.php">Enviando trabajos. condor_submit</a>
<strong> Anterior:</strong> <a name="tex2html125"  href="node6.php">Fichero de descripci&oacute;n </a> 
<strong> <a name="tex2html133"  href="node1.php">&#205;ndice General</a></strong> 
<!--End of Navigation Panel-->


<address>
Adrian Santos Marrero
2004-09-21
</address>

</body>
</html>
