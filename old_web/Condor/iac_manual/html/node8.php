<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Manual de Condor: Acceso a los ficheros"; ?>
<?php $metadescription="Manual de Condor: Acceso a los ficheros"; ?>
<?php $metakeywords="Manual, Condor, Acceso"; ?>

<?php include("header_condor.php"); ?>


<!--Navigation Panel-->
<a  href="node9.php" name="tex2html144" id="tex2html144">
<img width="37" height="24" class="nav-img" alt="next" src="next.png" /></a> 
<a  href="node5.php" name="tex2html140" id="tex2html140">
<img width="26" height="24" class="nav-img" alt="up" src="up.png" /></a> 
<a  href="node7.php" name="tex2html136" id="tex2html136">
<img width="63" height="24" class="nav-img" alt="previous" src="prev.png" /></a> 
<a  href="node1.php" name="tex2html142" id="tex2html142">
<img width="65" height="24" class="nav-img" alt="contents" src="contents.png" /></a>  
<br />
<strong> Siguiente:</strong> <a  href="node9.php" name="tex2html145" id="tex2html145">Estado de los trabajos</a>
<strong> Subir:</strong> <a  href="node5.php" name="tex2html141" id="tex2html141">Enviando trabajos. condor_submit
</a>
<strong> Anterior:</strong> <a  href="node7.php" name="tex2html137" id="tex2html137">Universos</a>
 &amp;nbsp;
<strong> <a  href="node1.php" name="tex2html143" id="tex2html143">&#205;ndice General</a></strong> 
<br /><br />
<!--End of Navigation Panel-->

<h1><a name="SECTION00041300000000000000" id="SECTION00041300000000000000">
Sobre el acceso a los ficheros</a>
</h1>

<p>El &#250;nico universo que dispone de un sistema de llamadas al sistema remotas es el ``standard'', 
debido a esto, cuando use otro universo (por ejemplo el ``vanilla'') aseg&#250;rese de que los archivos de entrada
y salida de sus trabajos se escriban o lean en directorios compartidos por NFS (es decir, visibles desde
todas las m&#225;quinas). Un buen ejemplo es su directorio home (<span class="tt">/home/<em>user</em>/...</span>) ya 
que desde cualquier 
m&#225;quina se puede acceder a &#233;l. Un ejemplo de un directorio no compartido ser&#237;a 
<span class="tt">/tmp/</span>, si crea un directorio 
<span class="tt">/tmp/my_condor_job/</span>, este solo ser&#225; visible desde su m&#225;quina, por lo que cuando su 
trabajo se empiece a ejecutar
en otra m&#225;quina y vaya a abrir un archivo en ese directorio se encontrar&#225; que no existe y no podr&#225; 
continuar (estos
errores aparecer&#225;n en el <span class="tt">Log</span> del trabajo).
</p>

<p>&nbsp;
</p>
<hr />

<address>
Adrian Santos Marrero
2004-09-21
</address>

</body>
</html>
