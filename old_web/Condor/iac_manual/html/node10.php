<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Manual de Condor: Borrando trabajos"; ?>
<?php $metadescription="Manual de Condor: Borrando trabajos"; ?>
<?php $metakeywords="Manual, Condor, Trabajos, Borrar"; ?>

<?php include("header_condor.php"); ?>


<!--Navigation Panel-->
<a  href="node11.php" name="tex2html168" id="tex2html168">
<img width="37" height="24" class="nav-img" alt="next" src="next.png" /></a> 
<a  href="node4.php" name="tex2html164" id="tex2html164">
<img width="26" height="24" class="nav-img" alt="up" src="up.png" /></a> 
<a  href="node9.php" name="tex2html158" id="tex2html158">
<img width="63" height="24" class="nav-img" alt="previous" src="prev.png" /></a> 
<a  href="node1.php" name="tex2html166" id="tex2html166">
<img width="65" height="24" class="nav-img" alt="contents" src="contents.png" /></a>  
<br />
<strong> Siguiente:</strong> <a  href="node11.php" name="tex2html169" id="tex2html169">Estado de Condor. condor_status</a>
<strong> Subir:</strong> <a  href="node4.php" name="tex2html165" id="tex2html165">¿Cómo lo uso?</a>
<strong> Anterior:</strong> <a  href="node9.php" name="tex2html159" id="tex2html159">Estado de los trabajos</a>
 &amp;nbsp; 
<strong>  <a  href="node1.php" name="tex2html167" id="tex2html167">&#205;ndice General</a></strong> 
<br /><br />
<!--End of Navigation Panel-->

<h1><a name="SECTION00043000000000000000" id="SECTION00043000000000000000"></a>
<a name="sec::condor_rm" id="sec::condor_rm"></a>
Borrando trabajos. <em>condor_rm</em>
</h1>

<p>
Usaremos <em>condor_rm</em> para borrar un trabajo de la cola de Condor:
</p>
<p>&nbsp;</p>

<pre>
[adrians@trevina ~]$ condor_q


-- Submitter: trevina.iac.es : &lt;161.72.81.178:1085&gt; : trevina.iac.es
 ID      OWNER            SUBMITTED     RUN_TIME ST PRI SIZE CMD
   2.0   adrians         7/13 12:46   0+00:00:01 R  0   0.0  myprog Example.2.0

1 jobs; 0 idle, 1 running, 0 held

[adrians@trevina ~]$ condor_rm 2.0
Job 2.0 marked for removal
</pre>

<p>
Podemos especificar tanto un trabajo como un cluster, en el ejemplo anterior, si hubi&#233;semos
ejecutado <span class="tt">condor_rm 2</span> habr&#237;amos borrado todos los trabajos del cluster 2.</p>

<p>
Notar que no podemos borrar trabajos que no nos pertenezcan.</p>

<p>
Para m&#225;s informaci&#243;n puede visitar la 
<a name="tex2html11"
  href="http://www.cs.wisc.edu/condor/manual/v7.0/condor_rm.html">p&#225;gina del
manual</a>
o la <a name="tex2html12"
  href="http://www.cs.wisc.edu/condor/manual/v7.0/2_6Managing_Job.html">secci&#243;n 2.6.2 del manual de
Condor</a>.
</p>

<br /><hr />

<address>
Adrian Santos Marrero
2004-09-21
</address>

</body>
</html>
