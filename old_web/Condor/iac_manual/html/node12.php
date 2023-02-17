<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Manual de Condor: Limitaciones"; ?>
<?php $metadescription="Manual de Condor: Limitaciones"; ?>
<?php $metakeywords="Manual, Condor, Limitaciones"; ?>

<?php include("header_condor.php"); ?>


<!--Navigation Panel-->
<a  href="node13.php" name="tex2html190" id="tex2html190">
<img width="37" height="24" class="nav-img" alt="next" src="next.png" /></a> 
<a  href="manual.php" name="tex2html186" id="tex2html186">
<img width="26" height="24" class="nav-img" alt="up" src="up.png" /></a> 
<a  href="node11.php" name="tex2html180" id="tex2html180">
<img width="63" height="24" class="nav-img" alt="previous" src="prev.png" /></a> 
<a  href="node1.php" name="tex2html188" id="tex2html188">
<img width="65" height="24" class="nav-img" alt="contents" src="contents.png" /></a>  
<br />
<strong> Siguiente:</strong> <a  href="node13.php" name="tex2html191" id="tex2html191">¿Y si tengo problemas?</a>
<strong> Subir:</strong> <a  href="manual.php" name="tex2html187" id="tex2html187">Introducci&#243;n a Condor</a>
<strong> Anterior:</strong> <a  href="node11.php" name="tex2html181" id="tex2html181">Estado de Condor. condor_status</a>
 &amp;nbsp; 
<strong>  <a  href="node1.php" name="tex2html189" id="tex2html189">&#205;ndice General</a></strong> 
<br /><br />
<!--End of Navigation Panel-->

<h1><a name="SECTION00050000000000000000" id="SECTION00050000000000000000">Limitaciones</a></h1>

<p></p>
<ul>
<li>Si su trabajo realiza muchas operaciones de entrada/salida (E/S)
        tenga en cuenta la sobrecarga que esto conlleva, probablemente no obtenga
        una mejora muy grande envi&#225;ndolo a Condor. Note que todas las operaciones
        de lectura/escritura sobre archivos se realizan sobre la red<a name="tex2html14"
  href="footnode.php#foot219"><sup>1</sup></a> por lo que sus trabajos se ver&#225;n 
        ralentizados.</li>
<li>Si env&#237;a un trabajo al universo ``vanilla'' contemple que cuando
        sea expulsado de una m&#225;quina perder&#225; todo lo procesado hasta ese momento
        (a no ser que haya tomado precauciones por su cuenta). Si env&#237;a un trabajo
        que planea que vaya a tardar varios d&#237;as en finalizar su ejecuci&#243;n 
        probablemente no obtenga mejor&#237;a usando Condor, en estos casos plant&#233;ese
        el uso del universo ``standard''.</li>
<li>Tenga en cuenta que cada trabajo que env&#237;e generar&#225; un proceso ``shadow''
        en la m&#225;quina desde donde se hace el env&#237;o. Este proceso se encarga de
        resolver algunas cuestiones relacionadas con su trabajo, realmente
        no consume demasiada CPU pero si realiza muchos env&#237;os puede llegar a
        ralentizar su m&#225;quina.</li>
</ul>

<p></p>
<hr /><!--Navigation Panel-->
<a name="tex2html190"  href="node13.php">
<img width="37" height="24" class="nav-img" alt="next" src="next.png"></a> 
<a name="tex2html186"  href="manual.php">
<img width="26" height="24" class="nav-img" alt="up" src="up.png"></a> 
<a name="tex2html180"  href="node11.php">
<img width="63" height="24" class="nav-img" alt="previous" src="prev.png"></a> 
<a name="tex2html188"  href="node1.php">
<img width="65" height="24" class="nav-img" alt="contents" src="contents.png"></a>  
<br />
<strong> Siguiente:</strong> <a name="tex2html191"  href="node13.php">¿Y si tengo problemas?</a>
<strong> Subir:</strong> <a name="tex2html187"  href="manual.php">Introducci&#243;n a Condor</a>
<strong> Anterior:</strong> <a name="tex2html181"  href="node11.php">Estado de Condor. condor_status</a>
<strong> <a name="tex2html189"  href="node1.php">&#205;ndice General</a></strong> 
<!--End of Navigation Panel-->

<address>
Adrian Santos Marrero
2004-09-21
</address>

</body>
</html>
