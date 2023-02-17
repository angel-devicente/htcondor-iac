<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Manual de Condor: Estado de Condor"; ?>
<?php $metadescription="Manual de Condor: Estado de Condor"; ?>
<?php $metakeywords="Manual, Condor, Estado"; ?>

<?php include("header_condor.php"); ?>

<!--Navigation Panel-->
<a  href="node12.php" name="tex2html178" id="tex2html178">
<img width="37" height="24" class="nav-img" alt="next" src="next.png" /></a> 
<a  href="node4.php" name="tex2html174" id="tex2html174">
<img width="26" height="24" class="nav-img" alt="up" src="up.png" /></a> 
<a  href="node10.php" name="tex2html170" id="tex2html170">
<img width="63" height="24" class="nav-img" alt="previous" src="prev.png" /></a> 
<a  href="node1.php" name="tex2html176" id="tex2html176">
<img width="65" height="24" class="img-nav" alt="contents" src="contents.png" /></a>  
<br />
<strong> Siguiente:</strong> <a  href="node12.php" name="tex2html179" id="tex2html179">Limitaciones</a>
<strong> Subir:</strong> <a  href="node4.php" name="tex2html175" id="tex2html175">¿Cómo lo uso?</a>
<strong> Anterior:</strong> <a  href="node10.php" name="tex2html171" id="tex2html171">Borrando trabajos. condor_rm
</a>
 &amp;nbsp
<strong>  <a  href="node1.php" name="tex2html177" id="tex2html177">&#205;ndice General</a></strong> 
<br /><br />
<!--End of Navigation Panel-->

<h1><a name="SECTION00044000000000000000" id="SECTION00044000000000000000">
Estado de Condor. <em>condor_status</em></a>
</h1>

<p>
Este comando nos permitir&#225; conocer el estado de Condor:</p>

<pre>
[adrians@trevina ~]$ condor_status

Name          OpSys       Arch   State      Activity   LoadAv Mem   ActvtyTime

vm1@aciano.ia LINUX       INTEL  Claimed    Busy       1.030   501  0+16:56:02
vm2@aciano.ia LINUX       INTEL  Claimed    Busy       0.990   501  0+00:59:48
agracejo.iac. LINUX       INTEL  Claimed    Busy       1.030   500  0+21:00:39
vm1@agrimonia LINUX       INTEL  Claimed    Busy       1.010  1826  0+00:09:36
vm2@agrimonia LINUX       INTEL  Claimed    Busy       1.000  1826  0+00:09:32
alfalfa.iac.e LINUX       INTEL  Owner      Idle       0.000   248  0+00:32:55
...
tonina.iac.es SOLARIS29   SUN4u  Claimed    Busy       1.000   128  0+21:56:24
toro.iac.es   SOLARIS29   SUN4u  Unclaimed  Idle       0.000   128  0+00:00:04
tuno.iac.es   SOLARIS29   SUN4u  Owner      Idle       0.040   640  0+01:33:15
vibora.iac.es SOLARIS29   SUN4u  Claimed    Busy       1.010   576  3+02:59:06
viola.iac.es  SOLARIS29   SUN4u  Claimed    Busy       1.010   256  0+01:40:35
zarza.iac.es  SOLARIS29   SUN4u  Claimed    Busy       0.660   256  0+00:01:06
zorro.ll.iac. SOLARIS29   SUN4u  Claimed    Busy       1.040   384  1+03:38:25

                     Machines Owner Claimed Unclaimed Matched Preempting

         INTEL/LINUX       75    33      41         1       0          0
     SUN4u/SOLARIS29       87    21      64         2       0          0

               Total      162    54     105         3       0          0
</pre>

<p>
Este comando muestra informaci&#243;n sobre cada una de las m&#225;quinas que forman el ``pool''
de Condor y un resumen del estado actual. En este resumen podemos comprobar, en cifras,
el uso que se le est&#225;n dando a las m&#225;quinas. As&#237;, por ejemplo, podremos comprobar cuantas
m&#225;quinas quedan disponibles para ejecutar trabajos mirando la columna ``Unclaimed''.
</p>
<p>
Para m&#225;s informaci&#243;n puedes visitar la <a name="tex2html13"
  href="http://www.cs.wisc.edu/condor/manual/v7.0/condor_status.html">p&#225;gina del manual</a>
de este comando.
</p>

<br /><hr />

<address>
Adrian Santos Marrero
2004-09-21
</address>

</body>
</html>
